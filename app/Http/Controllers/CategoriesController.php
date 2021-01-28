<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;



class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function allCategory()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
            $category = Category::all();
            if($category->status = 1 ){
                $status = "Aktif";
               
            }
            
            return view('categories.categories', ['categories' => $category, 'status' => $status]);
            
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
            $category = Category::all();
            $id= (DB::table('categories')
                      ->count())+1;

            if($id < 10){
              $x = str_pad($id, 2, "0", STR_PAD_LEFT);
              $category_id= "CAT".$x;
            }
            else{
              $category_id= "CAT".$id;
            }

            return view('categories.create_categories', ['category_id' => $category_id]);
          
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
        ([  'category_name' => 'required|max:50']);

        $category = new Category;
        $category->category_id = $request->category_id;
        $category->category_name = $request->category_name;

        $category->save();

        return redirect('/categories')->with('status', 'Data Kategori Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
            $categories = Category::where('category_id', $id)->first();
        return view('categories.edit_categories', ['categories' => $categories]);
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
         $request->validate
        ([  'category_name' => 'required|max:50']);


        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        return redirect('/categories')->with('status', 'Data Category Berhasil di Update.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('category_id', $id); 
        if($category->delete()) { 
           DB::table('categories')->where('category_id', $id)->update(['status' => 0]);
        }
       
        return redirect('/categories')->with('status', 'Data Category Berhasil Dihapus.');
    }


    public function trash()
    {
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Anda harus login terlebih dahulu.');
        }
        else{
           //ngambil data yg udah dihapus :
            $categories = Category::onlyTrashed()->get();
            if($categories->status = 1){
                $status = "Non-Aktif";
            }

        return view('/categories/trash_categories', ['categories'=> $categories, 'status' => $status] );
        }
        
    }

      public function restore($id)
    {
        
        //ngambil data yg udah dihapus :
        $categories = Category::onlyTrashed()->where('category_id', $id);
        if($categories->restore()) { 
           DB::table('categories')->where('category_id', $id)->update(['status' => 1]);
        }

        return redirect('/categories')->with('status', 'Data Category yang Telah Dihapus Berhasil di Restore.');
    }

    public function restoreAll()
    {
        //ngambil data yg udah dihapus :
        $categories = Category::onlyTrashed();
        if($categories->restore()) { 
           DB::table('categories')->update(['status' => 1]);
        }
       
        return redirect('/categories')->with('status', 'Semua Data Category yang Telah Dihapus Berhasil di Restore.');
    }
}
