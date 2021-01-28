<?php

namespace App\Http\Controllers;

use App\SalesDetail;
use App\Sale;
use App\Product;
use App\Customer;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;


class SalesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allSalesDetails()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
             $salesdetail = SalesDetail::select('sales_details.nota_id', 'products.product_name', 'sales_details.quantity', 'sales_details.selling_price', 'sales_details.discount', 'sales_details.total_price', 'sales_details.status')
                ->join('products', 'products.product_id', '=', 'sales_details.product_id')
                ->orderBy('nota_id', 'asc')
                ->get();
            if($salesdetail->status = 1){
                $status = "Aktif";
            }       

        return view('salesdet.sales_details', ['salesdetail' => $salesdetail, 'status' => $status]); 
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('salesdet.create_sales_details', ['sales' => $sales, 'products' => $products]);
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
        ([  'quantity' => 'required',
            'selling_price' => 'required',
            'discount' => 'required',
            'total_price' => 'required'
        ]);

        $salesdet = new SalesDetail;
        $salesdet->nota_id = $request->nota_id;
        $salesdet->product_id= $request->product_id;
        $salesdet->quantity = $request->quantity;
        $salesdet->selling_price = $request->selling_price;
        $salesdet->discount = $request->discount;
        $salesdet->total_price = $request->total_price;

        $salesdet->save();

        return redirect('/salesdet')->with('status', 'Data Detail Sales Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesDetail  $salesDetail
     * @return \Illuminate\Http\Response
     */
    public function show(SalesDetail $salesDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesDetail  $salesDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesdet = SalesDetail::where('nota_id', $id)->first();
        $sales = Sale::all();
        $products = Product::all();
        return view('salesdet.edit_sales_details', ['salesdet' => $salesdet, 'sales' => $sales,  'products' => $products]);
      
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
        ([  'quantity' => 'required',
            'selling_price' => 'required',
            'discount' => 'required',
            'total_price' => 'required'
        ]);

        $saledet = SalesDetail::find($id);
        $salesdet->nota_id = $request->nota_id;
        $salesdet->product_id= $request->product_id;
        $salesdet->quantity = $request->quantity;
        $salesdet->selling_price = $request->selling_price;
        $salesdet->discount = $request->discount;
        $salesdet->total_price = $request->total_price;

        $salesdet->save();

        return redirect('/salesdet')->with('status', 'Data Detail Sales Berhasil di Update.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $salesdet = SalesDetail::where('nota_id', $id);
        $salesdet->delete(); 
        return redirect('/salesdet')->with('status', 'Data Detail Sales Berhasil Dihapus.');
    }
 

    public function trash()
    {
        //ngambil data yg udah dihapus :
        $salesdet = SalesDetail::onlyTrashed()
                ->join('products', 'products.product_id', '=', 'sales_details.product_id')
                ->select('sales_details.nota_id', 'products.product_name', 'sales_details.quantity', 'sales_details.selling_price', 'sales_details.discount', 'sales_details.total_price', 'sales_details.status')
                ->orderBy('nota_id', 'asc')
                ->get();

        if($salesdet->status = 1){
                $status = "Non-Aktif";
        }

        return view('/salesdet/trash_sales_details', ['salesdet'=> $salesdet, 'status' => $status] );
    }


      public function restore($id)
    {
        //ngambil data yg udah dihapus :
        $salesdet = SalesDetail::onlyTrashed()->where('nota_id', $id);
        $salesdet->restore();
        return redirect('/salesdet')->with('status', 'Data Detail Sales yang Telah Dihapus Berhasil di Restore.');
    }

    public function restoreAll()
    {
        //ngambil data yg udah dihapus :
        $salesdet = SalesDetail::onlyTrashed();
        $salesdet->restore();
        return redirect('/salesdet')->with('status', 'Semua Data Detail Sales yang Telah Dihapus Berhasil di Restore.');
    }



/*
    public function addTocart(Request $request )
    {

        //VALIDASI DATA YANG DIKIRIM
         $request->validate([
            /* 'product_id' => 'required|exists:products, product_id'  */
    /*
        'product_id' => 'required', //PASTIKAN PRODUCT_IDNYA ADA DI DB
        'quantity' => 'required|integer' //PASTIKAN QTY YANG DIKIRIM INTEGER
        ]);

        //AMBIL DATA CART DARI COOKIE, KARENA BENTUKNYA JSON MAKA KITA GUNAKAN JSON_DECODE UNTUK MENGUBAHNYA MENJADI ARRAY
        $carts = json_decode($request->cookie('dw-carts'), true); 
        
         
        //CEK JIKA CARTS TIDAK NULL DAN PRODUCT_ID ADA DIDALAM ARRAY CARTS
        if ($carts && array_key_exists($request->product_id, $carts)) {
            //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
            $carts[$request->product_id]['quantity'] += $request->quantity;
        } else {
            //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
            
            $product = Product::find($request->product_id);
          //$product = Request::get('product_id');

           
            //TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS

            $carts[$request->product_id] = 
            [
                'quantity' => $request->quantity,
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'product_price' => $request->product_price
            ];
        }
 
        //BUAT COOKIE-NYA DENGAN NAME DW-CARTS
        //JANGAN LUPA UNTUK DI-ENCODE KEMBALI, DAN LIMITNYA 2800 MENIT ATAU 48 JAM
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        //STORE KE BROWSER UNTUK DISIMPAN
        return redirect()->back()->cookie($cookie);
    }


    public function listCart()
    {
        $customers = Customer::all();
        $users = User::all();
        $products = DB::table('products')
                ->join('categories', 'categories.category_id', '=', 'products.category_id')
                ->select('products.product_id', 'categories.category_name', 'products.product_name', 'products.product_price', 'products.product_stock', 'products.explanation')
                ->get();

        //MENGAMBIL DATA DARI COOKIE
        $carts = json_decode(request()->cookie('dw-carts'), true);
        //UBAH ARRAY MENJADI COLLECTION, KEMUDIAN GUNAKAN METHOD SUM UNTUK MENGHITUNG SUBTOTAL
        $subtotal = collect($carts)->sum(function($q) {
            return $q['quantity'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
        });
        //LOAD VIEW CART.BLADE.PHP DAN PASSING DATA CARTS DAN SUBTOTAL
        return view('sales.create_sales', ['customers' => $customers, 'users' => $users, 'products' => $products , 'carts' => $carts, 'subtotal' => $subtotal]);
    }


    public function updateCart(Request $request)
    {
        //AMBIL DATA DARI COOKIE
        $carts = json_decode(request()->cookie('dw-carts'), true);
        //KEMUDIAN LOOPING DATA PRODUCT_ID, KARENA NAMENYA ARRAY PADA VIEW SEBELUMNYA
        //MAKA DATA YANG DITERIMA ADALAH ARRAY SEHINGGA BISA DI-LOOPING
        foreach ($request->product_id as $key => $row) {
            //DI CHECK, JIKA QTY DENGAN KEY YANG SAMA DENGAN PRODUCT_ID = 0
            if ($request->quantity[$key] == 0) {
                //MAKA DATA TERSEBUT DIHAPUS DARI ARRAY
                unset($carts[$row]);
            } else {
                //SELAIN ITU MAKA AKAN DIPERBAHARUI
                $carts[$row]['quantity'] = $request->quantity[$key];
            }
        }
        //SET KEMBALI COOKIE-NYA SEPERTI SEBELUMNYA
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        //DAN STORE KE BROWSER.
        return redirect()->back()->cookie($cookie);
    }

*/      


}
