<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;


class CustomersController extends Controller
{

/*
     public function __construct()
    {
        $this->middleware('auth');
    }

*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allCustomer()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
            $customers = Customer::all();   
            if($customers->status = 1){
                $status = "Aktif";
            }
            return view('customers.customers', ['customers' => $customers, 'status' => $status]);
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
             $id= (DB::table('customers')
                      ->count())+1;

            if($id < 10){
              $x = str_pad($id, 2, "0", STR_PAD_LEFT);
              $customer_id= "CUS".$x;
            }
            else{
              $customer_id= "CUS".$id;
            }

            return view('customers.create_customers', ['customer_id' => $customer_id]);
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
            'street' => 'required|max:100',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'zip_code' => 'required|size:5',
        ]);

        $customer = new Customer;
        $customer->customer_id = $request->customer_id;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->street = $request->street;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->zip_code = $request->zip_code;

        $customer->save();

        return redirect('/customers')->with('status', 'Data Customer Berhasil Ditambahkan.');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::where('customer_id', $id)->first();
        return view('customers.customers', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
           $customer = Customer::where('customer_id', $id)->first();
        return view('customers.edit_customers', ['customer' => $customer]);
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
         $this->validate($request, [  
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'phone' => 'required|max:12',
            'email' => 'required|max:50',
            'street' => 'required|max:100',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'zip_code' => 'required|size:5'
        ]);


        $customer = Customer::find($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->street = $request->street;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->zip_code = $request->zip_code;
        $customer->save();

        return redirect('/customers')->with('status', 'Data Customer Berhasil di Update.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $customer = Customer::where('customer_id', $id); 
        if($customer->delete()) { 
           DB::table('customers')->where('customer_id', $id)->update(['status' => 0]);
        }
        return redirect('/customers')->with('status', 'Data Customer Berhasil Dihapus.');
    }


    public function trash()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
          //ngambil data yg udah dihapus :
        $customers = Customer::onlyTrashed()->get();
        if($customers->status = 1){
                $status = "Non-Aktif";
            }

        return view('/customers/trash_customers', ['customers'=> $customers, 'status' => $status] );
        }
        
    }

      public function restore($id)
    {
        //ngambil data yg udah dihapus :
        $customers = Customer::onlyTrashed()->where('customer_id', $id);
        if($customers->restore()) { 
           DB::table('customers')->where('customer_id', $id)->update(['status' => 1]);
        }
        
        
        return redirect('/customers')->with('status', 'Data Customer yang Telah Dihapus Berhasil di Restore.');
    }

    public function restoreAll()
    {
        //ngambil data yg udah dihapus :
        $customers = Customer::onlyTrashed();
        if($customers->restore()) { 
           DB::table('customers')->update(['status' => 1]);
        }
        return redirect('/customers')->with('status', 'Semua Data Customer yang Telah Dihapus Berhasil di Restore.');
    }
}
