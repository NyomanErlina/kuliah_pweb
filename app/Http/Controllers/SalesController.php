<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Customer;
use App\User;
use App\Product;
use App\SalesDetail;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use PDF;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allSales() 
    {
        /*
        $sales = Sale::all();
        return view('sales.sales', ['sales' => $sales]); */

        /*
        $sales = DB::table('sales')
                ->join('customers', 'customers.customer_id', '=', 'sales.customer_id')
                ->join('users', 'users.user_id', '=', 'sales.user_id')
                ->select('sales.nota_id', 'customers.first_name as customer_name', 'users.first_name as user_name', 'sales.nota_date', 'sales.total_payment')
                ->orderBy('nota_id', 'asc')
                ->get();
        */
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
              $sales = Sale::select((DB::raw('CONCAT(customers.first_name," ",customers.last_name) AS c_fullname')), (DB::raw('CONCAT(users.first_name, " ", users.last_name) AS u_fullname')),'sales.nota_id', 'sales.nota_date', 'sales.total_payment', 'sales.status')
                ->join('customers', 'customers.customer_id', '=', 'sales.customer_id')
                ->join('users', 'users.user_id', '=', 'sales.user_id')
                ->orderBy('nota_id', 'asc')
                ->get();          
                 
            if($sales->status = 1){
                $status = "Aktif"; 
            }       
       return view('sales.sales', ['sales' => $sales, 'status' => $status]);  
        }
       
        
    }

    public function getProduct(Request $req)
    {
        $product = Product::where('product_name', 'like', '%'.$req->key.'%')
                    ->get();
        return response()->json(['product'=>$product]);
         
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
            $customers = Customer::all();
            $users = User::all();
            $products = Product::all();
            //$nota_id = (DB::table('sales')->max('nota_id'))+1;
            $idNota= (DB::table('sales')
                      ->whereMonth('created_at', '=', date('m'))
                      ->whereYear('created_at', '=', date('Y'))
                      ->count())+1;
            $bulan = date('m');
            $tahun = date('y');

            if($idNota < 10){
              $x = str_pad($idNota, 2, "0", STR_PAD_LEFT);
              $nota_id= "S".$bulan.$tahun.$x;
            }
            else{
              $nota_id= "S".$bulan.$tahun.$idNota;
            }


        return view('/sales/cart', ['customers' => $customers, 'users' => $users, 'products' => $products, 'nota_id' => $nota_id]); 
        }
       
       
        
        /*
        $products = DB::table('products')
                ->join('categories', 'categories.category_id', '=', 'products.category_id')
                ->select('products.product_id', 'categories.category_name', 'products.product_name', 'products.product_price', 'products.product_stock', 'products.explanation')
                ->get();
        
        return view('sales.create_sales', ['customers' => $customers, 'users' => $users, 'products' => $products]); */


    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $request->validate
        ([  'nota_date' => 'required',
            'user_id' => 'required',
            'customer_id' => 'required',
        ]);

        $sale = new Sale;
        $sale->nota_id = $request->nota_id;
        $sale->customer_id = $request->customer_id;
        $sale->user_id= $request->user_id;
        $sale->nota_date = $request->nota_date;
        $sale->total_payment = $request->total_payment;

        $sale->save();


        foreach ($request['product_id'] as $key) {
            $salesdet = new SalesDetail;
            $salesdet->nota_id = $request['nota_id'];
            $salesdet->product_id = $key;
            $salesdet->quantity = $request['quantity'][$key];
            $salesdet->selling_price = $request['selling_price'][$key];
            $salesdet->discount = $request['discount'][$key];
            $salesdet->total_price = $request['total_price'][$key];
            $salesdet->save();
        } 

        return redirect('/sales')->with('status', 'Data Sales Berhasil Ditambahkan.');

        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
        $sales = Sale::where('nota_id', $id)->first();
        $products = Product::all();
        $customers = Customer::all();
        $users = User::all();
        $salesdet = SalesDetail::where('nota_id', $id)
                ->join('products', 'products.product_id', '=', 'sales_details.product_id')
                ->select('sales_details.nota_id','sales_details.product_id', 'products.product_name', 'sales_details.quantity','sales_details.selling_price', 'sales_details.discount', 'sales_details.total_price', 'products.product_stock')
                ->get();
        return view('sales.edit_cart', ['sales' => $sales, 'customers' => $customers, 'users' => $users, 'products' => $products, 'salesdet' => $salesdet]);
        }
       
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response


     */
    public function update(Request $request, $id)
    {

        $request->validate
        ([  'nota_date' => 'required',
            'user_id' => 'required',
            'customer_id' => 'required'
        ]);

        Sale::where('nota_id', '=', $id)->update([
            'nota_id' => $request->input('nota_id'),
            'customer_id' => $request->input('customer_id'),
            'user_id' => $request->input('user_id'),
            'nota_date' => $request->input('nota_date'),
            'total_payment' => $request->input('total_payment')
        ]);



       SalesDetail::where('sales_details.nota_id', $id)->delete();
        
        foreach ($request['product_id'] as $key) {
            DB::table('sales_details')->updateOrInsert(
                ['nota_id' => $request->input('nota_id'), 'product_id' => $key],
                ['quantity' => $request['quantity'][$key],
                'selling_price' => $request['selling_price'][$key],
                'discount' => $request['discount'][$key],
                'total_price' => $request['total_price'][$key]
            ]);

        } 
 
          return redirect('/sales')->with('status', 'Data Sale Berhasil di Update.');

    }
        
    /*
        $sale = Sale::find($id);
        $sale->nota_id = $request->nota_id;
        $sale->customer_id = $request->customer_id;
        $sale->user_id= $request->user_id;
        $sale->nota_date = $request->nota_date;
        $sale->total_payment = $request->total_payment;

        $sale->save();


         foreach ($request['product_id'] as $key) {
            $salesdet = SalesDetail::where([['nota_id','=', $id],['product_id','=',$key]])->first();
            $salesdet->nota_id = $request['nota_id'];
            $salesdet->product_id = $key;
            $salesdet->quantity = $request['quantity'][$key];
            $salesdet->selling_price = $request['selling_price'][$key];
            $salesdet->discount = $request['discount'][$key];
            $salesdet->total_price = $request['total_price'][$key];
        
            $salesdet->save();
        
        } 

    */

       


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        
          $sales = Sale::where('sales.nota_id', $id);
          if($sales->delete()) { 
           DB::table('sales')->where('nota_id', $id)->update(['status' => 0]);
          }

          $saldet = SalesDetail::where('sales_details.nota_id', $id)->join('sales', 'sales.nota_id', '=', 'sales_details.nota_id');
          if($saldet->delete()) { 
           DB::table('sales_details')->where('nota_id', $id)->update(['status' => 0]);
          }

        return redirect('/sales')->with('status', 'Data Sale Berhasil Dihapus.');
       
        
    }


    public function trash()
    {
         if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
         //ngambil data yg udah dihapus :
        $sales = Sale::onlyTrashed()
                ->select(DB::raw('CONCAT(customers.first_name," ",customers.last_name) AS c_fullname'), (DB::raw('CONCAT(users.first_name, " ", users.last_name) AS u_fullname')), 'sales.nota_id', 'sales.nota_date', 'sales.total_payment', 'sales.status')
                ->join('customers', 'customers.customer_id', '=', 'sales.customer_id')
                ->join('users', 'users.user_id', '=', 'sales.user_id')
                ->orderBy('nota_id', 'asc')
                ->get();  
        if($sales->status = 1){
                $status = "Non-Aktif";
            }

        return view('/sales/trash_sales', ['sales'=> $sales, 'status' => $status] );
        }
       
    }


      public function restore($id)
    {
        //ngambil data yg udah dihapus :
        $sales = Sale::onlyTrashed()->where('nota_id', $id);
        if($sales->restore()) { 
           DB::table('sales')->where('nota_id', $id)->update(['status' => 1]);
        }
        $salesdet = SalesDetail::onlyTrashed()->where('nota_id', $id);
        if($salesdet->restore()) { 
           DB::table('sales_details')->where('nota_id', $id)->update(['status' => 1]);
        }
        return redirect('/sales')->with('status', 'Data Sale yang Telah Dihapus Berhasil di Restore.');
      
    }

    public function restoreAll()
    {
        //ngambil data yg udah dihapus :
        $sales = Sale::onlyTrashed();
        if($sales->restore()) { 
           DB::table('sales')->update(['status' => 1]);
        }
        $salesdet = SalesDetail::onlyTrashed();
        if($salesdet->restore()) { 
           DB::table('sales_details')->update(['status' => 1]);
        }
        return redirect('/sales')->with('status', 'Semua Data Sales yang Telah Dihapus Berhasil di Restore.');
        
    }

    public function generateInvoice($id)
    {
      //Sale::with(['customer', 'detail', 'detail.product'])->find($id);
        $sales = Sale::select('sales.nota_id', 'sales.nota_date', 'sales.total_payment')
                ->where('sales.nota_id', '=', $id )
                ->get(); 

        $customer = Customer::select((DB::raw('CONCAT(customers.first_name," ",customers.last_name) AS c_fullname')), 'customers.street', 'customers.city' , 'customers.phone', 'customers.email')
                  ->join('sales', 'sales.customer_id', '=', 'customers.customer_id')
                  ->where('sales.nota_id', '=', $id )
                  ->get(); 
  
        $salesdet = SalesDetail::select('products.product_name', 'sales_details.quantity', 'sales_details.selling_price', 'sales_details.discount', 'sales_details.total_price')
                ->join('sales', 'sales_details.nota_id', '=', 'sales.nota_id')
                ->join('products', 'products.product_id', '=', 'sales_details.product_id')
                ->where('sales.nota_id', '=', $id )
                ->get(); 

        $total_discount =  DB::table('sales_details')
                        ->join('sales', 'sales_details.nota_id', '=', 'sales.nota_id' )
                        ->where('sales.nota_id', '=', $id )
                        ->sum('discount');

        $subtotal = DB::table('sales_details')
                  ->join('sales', 'sales_details.nota_id', '=', 'sales.nota_id' )
                  ->where('sales.nota_id', '=', $id )
                  ->sum(DB::raw('quantity * selling_price'));

        $nota_id = $id;

        $pdf = PDF::loadView('sales.print_invoice', compact('sales','customer','salesdet', 'total_discount', 'subtotal', 'nota_id'))->setPaper('a4', 'landscape');
        return $pdf->stream("invoice"."-".$id.".pdf");
    
}

/*
public function details($id)
    {
      $salesdetail = SalesDetail::select('products.product_name', 'sales_details.quantity', 'sales_details.selling_price', 'sales_details.discount', 'sales_details.total_price')
                  ->join('products', 'products.product_id', '=', 'sales_details.product_id')
                  ->where('nota_id', "=", $id)
                  ->get();
          
        return view('sales.sales', ['salesdetail'=> $salesdetail] );
       
        
    }
    */





}
