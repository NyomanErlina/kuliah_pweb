<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {
         if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
             $products = Product::select('products.product_id', 'categories.category_name', 'products.product_name', 'products.product_price', 'products.product_stock', 'products.explanation', 'products.status')
                ->join('categories', 'categories.category_id', '=', 'products.category_id')
                ->orderBy('product_id', 'asc')
                ->get();
            if($products->status = 1){
                $status = "Aktif";
            }
        return view('products.products', ['products' => $products, 'status' => $status]); 
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
            $categories = Category::all();
            $id= (DB::table('products')
                      ->count())+1;

            if($id < 10){
              $x = str_pad($id, 2, "0", STR_PAD_LEFT);
              $product_id= "PRO".$x;
            }
            else{
              $product_id= "PRO".$id;
            }

            return view('products.create_products', ['categories' => $categories, 'product_id' => $product_id]);
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
        ([  'product_name' => 'required|max:50',
            'product_price' => 'required',
            'product_stock' => 'required',
        ]);

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->product_id = $request->product_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_stock = $request->product_stock;
        $product->explanation = $request->explanation;

        $product->save();

        return redirect('/products')->with('status', 'Data Product Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
        $products = Product::where('product_id', $id)->first();
        $categories = Category::all();
        return view('products.edit_products', ['products' => $products ,'categories' => $categories]);
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
        ([  'product_name' => 'required|max:50',
            'product_price' => 'required',
            'product_stock' => 'required',
        ]);

        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_stock = $request->product_stock;
        $product->explanation = $request->explanation;

        $product->save();

        return redirect('/products')->with('status', 'Data Product Berhasil di Update.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('product_id', $id); 
        if($product->delete()) { 
           DB::table('products')->where('product_id', $id)->update(['status' => 0]);
        }

        return redirect('/products')->with('status', 'Data Product Berhasil Dihapus.');
    }



    public function trash()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
         //ngambil data yg udah dihapus :
        $products = Product::onlyTrashed()
                ->select('products.product_id', 'categories.category_name', 'products.product_name', 'products.product_price', 'products.product_stock', 'products.explanation', 'products.status')
                ->join('categories', 'categories.category_id', '=', 'products.category_id')
                ->get();
        if($products->status = 1){
            $status = "Non-Aktif";
        }
   
        return view('/products/trash_products', ['products'=> $products, 'status' => $status] );
        }
       
    }


      public function restore($id)
    {
        //ngambil data yg udah dihapus :
        $products = Product::onlyTrashed()->where('product_id', $id);
        if($products->restore()) { 
           DB::table('products')->where('product_id', $id)->update(['status' => 1]);
        }
        return redirect('/products')->with('status', 'Data Product yang Telah Dihapus Berhasil di Restore.');
    }

    public function restoreAll()
    {
        //ngambil data yg udah dihapus :
        $products = Product::onlyTrashed();
         if($products->restore()) { 
           DB::table('products')->update(['status' => 1]);
        }
        return redirect('/products')->with('status', 'Semua Data Product yang Telah Dihapus Berhasil di Restore.');
    }
}
