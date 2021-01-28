@extends('layout/mainku')

@section('title', 'Data Category') 

@section('content') 



 <div class="form-input " style=" width: 55%">
    <div class="forminput-head">
              <h1>Form Update Data Category</h1>
    </div>
      <div class="forminput-block">
          <form method="post" action="/categories/update/{{ $categories->category_id }}">
            @csrf
            @method('put')

              <div>
                 <b style="padding-left: 5px;"> ID Category : {{ $categories->category_id }}</b>
              </div>
          
              <br>
              <div>
                  <label><b>*</b>Category Name</label>
                  <input type="text" name="category_name" value="{{ $categories->category_name }}" class="@error('category_name') is-invalid @enderror">
                  @error('category_name') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              
               
                <b style="color: orange; font-size: 15px; " >*Wajib Diisi !</b>
                <br><br>
              <button type="submit" class="submit">Change</button>
            </form>
      </div>
  </div>

    
@endsection