<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use App\Sale;
use App\Customer;
use App\Product;
use App\SalesDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use PDF;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allUsers()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
              $user = User::all();
               if($user->status = 1){
                    $status = "Aktif";
                }
              return view('users.users', ['users' => $user, 'status' => $status]);
        }
       
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
            $id= (DB::table('users')
                      ->count())+1;

            if($id < 10){
              $x = str_pad($id, 2, "0", STR_PAD_LEFT);
              $user_id= "USER".$x;
            }
            else{
              $user_id= "USER".$id;
            }

             return view('users.create_users', ['user_id' => $user_id]);
        }
        
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
        ([  'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'phone' => 'required|max:12',
            'email' => 'required|max:50',
            'password' => 'required|size:8',
            'job_status' => 'required|max:15'
        ]);

        $user = new User;
        $user->user_id= $request->user_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->job_status = $request->job_status;
        
        $user->save();

        return redirect('/users')->with('status', 'Data User Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
              $user = User::where('user_id', $id)->first();
              return view('users.edit_users', ['user' => $user]);
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
        ([  'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'phone' => 'required|max:12',
            'email' => 'required|max:50',
            'password' => 'required|size:8',
            'job_status' => 'required|max:15'
        ]);


        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->job_status = $request->job_status;
        $user->save();

        return redirect('/users')->with('status', 'Data User Berhasil di Update.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user = User::where('user_id', $id);
         if($user->delete()) { 
           DB::table('users')->where('user_id', $id)->update(['status' => 0]);
        }
        return redirect('/users')->with('status', 'Data User Berhasil Dihapus.');
    }


    public function trash()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
             //ngambil data yg udah dihapus :
        $users = User::onlyTrashed()->get();
         if($users->status = 1){
                $status = "Non-Aktif";
            }
        return view('/users/trash_users', ['users'=> $users, 'status' => $status] );
        }
        
    }

      public function restore($id)
    {
        //ngambil data yg udah dihapus :
        $users = User::onlyTrashed()->where('user_id', $id);
        if($users->restore()) { 
           DB::table('users')->where('user_id', $id)->update(['status' => 1]);
        }
        return redirect('/users')->with('status', 'Data User yang Telah Dihapus Berhasil di Restore.');
    }

    public function restoreAll()
    {
        //ngambil data yg udah dihapus :
        $users = User::onlyTrashed();
         if($users->restore()) { 
           DB::table('users')->update(['status' => 1]);
        }
        return redirect('/users')->with('status', 'Semua Data User yang Telah Dihapus Berhasil di Restore.');
    }



//dashboard


    public function index(){
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
            $total_product = DB::table('sales_details')->sum('quantity');
            $total_penjualan = DB::table('sales')->sum('total_payment');
            $jml_customer = DB::table('customers')->count('customer_id');

           
            $product_jan = DB::table('sales_details')
                        ->join('sales', 'sales_details.nota_id', '=', 'sales.nota_id' )
                        ->where(DB::raw('MONTH(sales.nota_date)'), 01)
                        ->sum('quantity');
            $product_feb = DB::table('sales_details')
                        ->join('sales', 'sales_details.nota_id', '=', 'sales.nota_id' )
                        ->where(DB::raw('MONTH(sales.nota_date)'), 02)
                        ->sum('quantity');
            $product_mar = DB::table('sales_details')
                        ->join('sales', 'sales_details.nota_id', '=', 'sales.nota_id' )
                        ->where(DB::raw('MONTH(sales.nota_date)'), 03)
                        ->sum('quantity');
            $product_apr = DB::table('sales_details')
                        ->join('sales', 'sales_details.nota_id', '=', 'sales.nota_id' )
                        ->where(DB::raw('MONTH(sales.nota_date)'), 04)
                        ->sum('quantity');
            $product_may = DB::table('sales_details')
                        ->join('sales', 'sales_details.nota_id', '=', 'sales.nota_id' )
                        ->where(DB::raw('MONTH(sales.nota_date)'), 05)
                        ->sum('quantity');
            
            $makanan = DB::table('sales_details')
                        ->join('products', 'sales_details.product_id', '=', 'products.product_id' )
                        ->join('categories', 'products.category_id', '=', 'categories.category_id' )
                        ->where('category_name', 'makanan')
                        ->sum('quantity');

            $minuman = DB::table('sales_details')
                        ->join('products', 'sales_details.product_id', '=', 'products.product_id' )
                        ->join('categories', 'products.category_id', '=', 'categories.category_id' )
                        ->where('category_name', 'minuman')
                        ->sum('quantity');

            $pakaian_wnt = DB::table('sales_details')
                        ->join('products', 'sales_details.product_id', '=', 'products.product_id' )
                        ->join('categories', 'products.category_id', '=', 'categories.category_id' )
                        ->where('category_name', 'pakaian wanita')
                        ->sum('quantity');

            $pakaian_pria = DB::table('sales_details')
                        ->join('products', 'sales_details.product_id', '=', 'products.product_id' )
                        ->join('categories', 'products.category_id', '=', 'categories.category_id' )
                        ->where('category_name', 'pakaian pria')
                        ->sum('quantity');

            $total_jan = DB::table('sales')
                        ->where(DB::raw('MONTH(nota_date)'), 01)
                        ->sum('total_payment');

            $total_feb = DB::table('sales')
                        ->where(DB::raw('MONTH(nota_date)'), 02)
                        ->sum('total_payment');

            $total_mar = DB::table('sales')
                        ->where(DB::raw('MONTH(nota_date)'), 03)
                        ->sum('total_payment');

            $total_apr = DB::table('sales')
                        ->where(DB::raw('MONTH(nota_date)'), 04)
                        ->sum('total_payment');

            $total_may = DB::table('sales')
                        ->where(DB::raw('MONTH(nota_date)'), 05)
                        ->sum('total_payment');

                       

            return view('/menu/dashboard')->with(compact('total_product', 'total_penjualan', 'jml_customer', 'product_jan', 'product_feb', 'product_mar', 'product_apr', 'product_may', 'makanan', 'minuman', 'pakaian_wnt', 'pakaian_pria', 'total_jan', 'total_feb', 'total_mar', 'total_apr', 'total_may'));
        }
    }


      public function cetak_pdf()
    {
        $sales = Sale::select((DB::raw('CONCAT(customers.first_name," ",customers.last_name) AS c_fullname')), (DB::raw('CONCAT(users.first_name, " ", users.last_name) AS u_fullname')),'sales.nota_id', 'sales.nota_date', 'sales.total_payment')
                ->join('customers', 'customers.customer_id', '=', 'sales.customer_id')
                ->join('users', 'users.user_id', '=', 'sales.user_id')
                ->orderBy('nota_id', 'asc')
                ->get();
       
        $salesdetail = SalesDetail::select('sales_details.nota_id', 'products.product_name', 'sales_details.quantity', 'sales_details.selling_price', 'sales_details.discount', 'sales_details.total_price')
                ->join('products', 'products.product_id', '=', 'sales_details.product_id')
                ->orderBy('nota_id', 'asc')
                ->get();
 
        $pdf = PDF::loadview('sales.laporan_pdf',['sales'=>$sales, 'salesdetail'=>$salesdetail]);
        return $pdf->stream("laporan-penjualan-2020.pdf");
    }


//login

    public function login(){
        return view('/users/login');
    }

    public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = User::where('email',$email)->first();
        if (empty($email) || empty($password) || empty($email) && empty($password)) {
                return redirect('/login')->with('alert','Email dan Password Wajib Diisi.');     
        }
        elseif($data){ //apakah email tersebut ada atau tidak
            if($data->password == $password){
                Session::put('user_id',$data->user_id);
                Session::put('first_name',$data->first_name);
                Session::put('last_name',$data->last_name);
                Session::put('email',$data->email);
                Session::put('job_status',$data->job_status);
                Session::put('login',TRUE);
                return redirect('/dashboard');
            }
            else{
                return redirect('/login')->with('alert','Password yang Anda Masukkan Salah.');
            }
        }
        else{
            return redirect('/login')->with('alert','Email yang Anda Masukkan Salah.');
        }
        
    }



    public function logout(){
        Session::flush();
        return redirect('/login')->with('alert','Anda sudah logout');
    }


}