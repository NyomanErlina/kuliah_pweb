<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class C_ajax extends Controller
{
    function index()
    {
        return view('index');
    }

    function getProduct(Request $req)
    {
        /*$product = Product::where('product_name', 'like', '%'.$req->key.'%')
                    ->get();
        return response()->json(['product'=>$product]);
        */

        echo 'hallo';
    }
}
