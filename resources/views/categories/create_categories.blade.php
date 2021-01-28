@extends('layout/mainku')

@section('title', 'Data Category') 

@section('content') 



<div class="card">
  
 <div class="form-input " style=" width: 55%">
    <div class="forminput-head">
              <h1>Form Input Data Category</h1>
    </div>
      <div class="forminput-block">
          <form method="post" action="/categories">
            @csrf
            <input type="hidden" name="category_id" value="{{$category_id}}">
              <div>
                  <label><b>*</b>Category Name</label>
                  <input type="text" name="category_name" value="{{old('category_name')}}" class="@error('category_name') is-invalid @enderror">
                  @error('category_name') 
                   <div class="invalid-feedback form-error">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              
                <b style="color: orange; font-size: 15px; padding: 15px 0px 15px 15px;" >*Wajib Diisi !</b>
                <br><br>
              <button type="submit" class="submit">Submit</button>
            </form>
      </div>
  </div>
</div>

    
@endsection