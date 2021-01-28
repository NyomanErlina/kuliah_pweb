@extends('layout/mainku')

@section('title', 'Data Sales Details') 

@section('content') 


<div class="form-input " style=" width: 70%">
    <div class="forminput-head">
              <h1>Form Update Data Detail Sales</h1>
    </div>
      <div class="forminput-block">
          <form method="post" action="/salesdet/update/{{ $salesdetn->nota_id }}">
            @csrf
            @method('put')

               <div class="col-md-6">
                  <label for="inputNotaID"><b>*</b>ID Nota</label>
                  <select id="inputNotaID" name="nota_id" value="{{old('nota_id')}}" class="@error('nota_id') is-invalid @enderror"> 
                  @error('nota_id') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror

                  @foreach ($sales as $sal)
                    <option value="{{ $sal->nota_id }}"
                      >
                      {{ $sal->nota_id }}
                    </option>
                  @endforeach
        
                  </select>
              </div>
            


              <div class="col-md-6">
                  <label for="inputProductID"><b>*</b>Product Name</label>
                  <select id="inputProductID" name="product_id" value="{{old('product_id')}}" class=" @error('product_id') is-invalid @enderror">
                  @error('product_id') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror

                  @foreach ($products as $product)
                    <option value="{{ $product->product_id }}">
                      {{ $product->product_name }}
                    </option>
                  @endforeach
                  </select>
              </div>

               
              <div class="col-md-3" >
                  <label><b>*</b>Quantity</label>
                  <input type="number" min="0" name="quantity" value="{{old('quantity')}}" class="@error('quantity') is-invalid @enderror">
                  @error('quantity') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                 <div class="col-md-3" >
                  <label><b>*</b>Discount</label>
                  <input type="number" min="0" name="discount" value="{{old('discount')}}" class=" @error('discount') is-invalid @enderror">
                  @error('discount') 
                   <div class="invalid-feedback form-error">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-6" >
                  <label><b>*</b>Selling Price</label>
                  <input type="number" min="0" name="selling_price" value="{{old('selling_price')}}" class=" @error('selling_price') is-invalid @enderror">
                  @error('selling_price') 
                   <div class="invalid-feedback form-error">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                

                <div class=" col-md-6" >
                  <label><b>*</b>Total Price</label>
                  <input type="number" min="0" name="total_price" value="{{old('total_price')}}" class=" @error('total_price') is-invalid @enderror">
                  @error('total_price') 
                   <div class="invalid-feedback form-error">
                    {{ $message }}
                  </div>
                  @enderror

                </div>
                
               
              <div class=" col-md-6" style="margin-top: 27px;">
                    <button type="submit" class="submit">Submit</button>
              </div>

               <b style="color: orange; font-size: 15px; margin : 50px 0px 5px 500px;" >*Wajib Diisi !</b>



           
            </form>
      </div>
  </div>

    
@endsection