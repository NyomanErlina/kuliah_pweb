<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('home');
});

 Route::get('/customer', function () {
    return view('customer');
});

*/


//--------percobaan praktikum minggu 1

/*

Route::get('hi', function(){
	return "Hi, lagi belajar laravel ni yeeee...";
});

Route::get('myView', function(){
	return view('webtest');
});

Route::get('ID/{id}', function($id){
	echo 'ID anda : '.$id;
});

Route::get('viewcontroll', 'MyfirstController@index');

Route::get('tampilnama', 'MyfirstController@nama');

Route::get('matkul', 'MyfirstController@matkul');

Route::get('getname/{nama}', 'MyfirstController@getNameFromUrl');

Route::get('formulir', 'MyfirstController@formulir');

Route::post('formulir/proses', 'MyfirstController@proses');

Route::get('homee', 'MyfirstController@homee');
Route::get('tentang', 'MyfirstController@tentang');

*/


//---------template
/*
Route::get('dashboard', function(){
	  if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
            return view('menu/dashboard');
        }

});
*/

/*
Route::get('table master', function(){
		if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
            return view('menu/table_master');
        }
	
});

Route::get('table transaction', function(){
		if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
            return view('menu/table_transaction');
        }
	
});
*/

//----------users

Route::get('/users', 'UsersController@allUsers');

Route::get('/users/create', 'UsersController@create');

Route::post('/users', 'UsersController@store');

Route::get('/users/delete/{id}', 'UsersController@destroy');

Route::get('/users/trash_users', 'UsersController@trash');

Route::get('/users/restore/{id}', 'UsersController@restore');

Route::get('/users/restore_all', 'UsersController@restoreAll');

Route::get('/users/edit/{id}', 'UsersController@edit');

Route::put('/users/update/{id}', 'UsersController@update');


//login
Route::get('/login', 'UsersController@login');

Route::post('/loginPost', 'UsersController@loginPost');

Route::get('/logout', 'UsersController@logout');


//dashboard
Route::get('/dashboard', 'UsersController@index');

Route::get('/dashboard/cetak_pdf', 'UsersController@cetak_pdf');





//-------customers

Route::get('/customers/create', 'CustomersController@create');

Route::post('/customers', 'CustomersController@store');

Route::get('/customers', 'CustomersController@allCustomer');

Route::get('/customers/edit/{id}', 'CustomersController@edit');

Route::put('/customers/update/{id}', 'CustomersController@update');

Route::get('/customers/delete/{id}', 'CustomersController@destroy');

Route::get('/customers/trash_customers', 'CustomersController@trash');

Route::get('/customers/restore/{id}', 'CustomersController@restore');

Route::get('/customers/restore_all', 'CustomersController@restoreAll');




//----------categories

Route::get('/categories', 'CategoriesController@allCategory');

Route::get('/categories/create', 'CategoriesController@create');

Route::post('/categories', 'CategoriesController@store');

Route::get('/categories/delete/{id}', 'CategoriesController@destroy');

Route::get('/categories/trash_categories', 'CategoriesController@trash');

Route::get('/categories/restore/{id}', 'CategoriesController@restore');

Route::get('/categories/restore_all', 'CategoriesController@restoreAll');

Route::get('/categories/edit/{id}', 'CategoriesController@edit');

Route::put('/categories/update/{id}', 'CategoriesController@update');



//----------products

Route::get('/products', 'ProductsController@allProducts');

Route::get('/products/create', 'ProductsController@create');

Route::post('/products', 'ProductsController@store');

Route::get('/products/delete/{id}', 'ProductsController@destroy');

Route::get('/products/trash_products', 'ProductsController@trash');

Route::get('/products/restore/{id}', 'ProductsController@restore');

Route::get('/products/restore_all', 'ProductsController@restoreAll');

Route::get('/products/edit/{id}', 'ProductsController@edit');

Route::put('/products/update/{id}', 'ProductsController@update');




//----------sales

Route::get('/sales', 'SalesController@allSales');

Route::get('/sales/create', 'SalesController@create');

Route::post('/sales/getProduct', 'SalesController@getProduct');

Route::post('/sales', 'SalesController@store');

Route::get('/sales/delete/{id}', 'SalesController@destroy');

Route::get('/sales/trash_sales', 'SalesController@trash');

Route::get('/sales/restore/{id}', 'SalesController@restore');

Route::get('/sales/restore_all', 'SalesController@restoreAll');

Route::get('/sales/edit/{id}', 'SalesController@edit');

Route::put('/sales/update/{id}', 'SalesController@update');

Route::get('/{id}/print', 'SalesController@generateInvoice')->name('sales.print_invoice');

//Route::post('/sales/getDetails/{id}', 'SalesController@details');




//----------sales detail

Route::get('/salesdet', 'SalesDetailsController@allSalesDetails');

Route::get('/salesdet/create', 'SalesDetailsController@create');

Route::post ('/salesdet/create', 'SalesDetailsController@create');

Route::post('/salesdet', 'SalesDetailsController@store');

Route::get('/salesdet/delete/{id}', 'SalesDetailsController@destroy');

Route::get('/salesdet/trash_sales_details', 'SalesDetailsController@trash');

Route::get('/salesdet/restore/{id}', 'SalesDetailsController@restore');

Route::get('/salesdet/restore_all', 'SalesDetailsController@restoreAll');

Route::get('/salesdet/edit/{id}', 'SalesDetailsController@edit');

Route::put('/salesdet/update/{id}', 'SalesDetailsController@update');







