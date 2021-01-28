@extends('layout/mainku')

@section('title', 'Data Product') 

@section('content') 



 <div class="form-input " style="width: 70%">
    <div class="forminput-head">
              <h1>Form Update Data Product</h1>
    </div>
      <div class="forminput-block">
          <form method="post" action="/products/update/{{ $products->product_id }}">
            @csrf
             @method('put')

              <div>
                  <b style="padding-left: 18px;">ID Product : {{ $products->product_id }}</b>
              </div>
          
              <br>

              <div class="col-md-6">
                  <label for="inputCategoryID"><b>*</b>Category Name</label>
                  <select id="inputCategoryID" name="category_id" value="{{ $products->category_id }}" class=" @error('category_id') is-invalid @enderror">
                  @error('category_id') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror

                  @foreach ($categories as $category)
                    <option value="{{ $category->category_id }}" 
                      @if ($category->category_id == $products->category_id)
                        selected
                      @endif
                      >
                      {{ $category->category_name }}
                    </option>
                  @endforeach
                  </select>
              </div>

              <div class="col-md-6">
                <label> <b>*</b>Product Name</label>
                  <input type="text" name="product_name" value="{{ $products->product_name }}" class="@error('product_name') is-invalid @enderror">
                  @error('product_name') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              
              
              <div class=" col-md-6" >
                  <label><b>*</b>Product Price</label>
                  <input type="number" min="0" name="product_price" value="{{ $products->product_price }}" class=" @error('product_price') is-invalid @enderror">
                  @error('product_price') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
              </div>

             

              <div class="col-md-6" >
                  <label><b>*</b>Product Stock</label>
                  <input type="number" min="0" name="product_stock" value="{{ $products->product_stock }}" class="@error('product_stock') is-invalid @enderror">
                  @error('product_stock') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror

              </div>
               
              <div style="margin-left: 15px; margin-right: 15px;">
                 <label>Explanation</label>
                  <textarea name="explanation" value="{{ $products->explanation }}" class=" @error('explanation') is-invalid @enderror"></textarea>
                  @error('explanation') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror

              </div>

              
                <b style="color: orange; font-size: 15px;" >*Wajib Diisi !</b>
                <br><br>
              
          
              <button type="submit" class="submit">Change</button>
            </form>
      </div>
  </div>

    
@endsection