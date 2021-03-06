@extends('layout/mainku')

@section('title', 'Data Customer') 

@section('content') 

  <div class="form-input">
    <div class="forminput-head">
              <h1>Form Update Data Customer</h1>
    </div>
      <div class="forminput-block">
          <form method="post" action="/customers/update/{{ $customer->customer_id }}">
            @csrf
            @method('put')

              <div>
                  <b style="padding-left: 18px;">ID Customer : {{ $customer->customer_id }}</b>
              </div>  
              <br>
              <div class="col-md-6">
                  <label><b>*</b>First Name</label>
                  <input type="text" name="first_name" value="{{ $customer->first_name }}" class="@error('first_name') is-invalid @enderror">
                  @error('first_name') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
              </div>
            
              <div class="col-md-6">
                  <label><b>*</b>Last Name</label>
                  <input type="text" name="last_name" value="{{ $customer->last_name }}" class="@error('last_name') is-invalid @enderror">
                  @error('last_name') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
              </div>
      
              <div class="col-md-6">
                  <label><b>*</b>Phone</label>
                  <input type="number" min="0" name="phone" value="{{ $customer->phone }}" class="@error('phone') is-invalid @enderror">
                  @error('phone') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
              </div>

              <div class="col-md-6">
                  <label><b>*</b>Email</label>
                  <input type="email" name="email" value="{{ $customer->email }}" class="@error('email') is-invalid @enderror">
                  @error('email') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              
              <div style="padding-left: 15px; padding-right: 15px;">
                <label><b>*</b>Street</label>
                <input type="text" name="street" value="{{ $customer->street }}" class=" @error('street') is-invalid @enderror">
                  @error('street') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
              </div>
            
                <div class=" col-md-6">
                  <label><b>*</b>City</label>
                  <input type="text" name="city" value="{{ $customer->city }}" class=" @error('city') is-invalid @enderror">
                  @error('city') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="col-md-4" >
                  <label for="inputState"><b>*</b>State</label>
                  <input id="inputState" type="text" name="state" value="{{ $customer->state }}" class=" @error('state') is-invalid @enderror">
                  @error('state') 
                   <div class="invalid-feedback form-error">
                    {{ $message }}
                  </div>
                  @enderror         
                </div>
            
                <div class="col-md-2" >
                  <label for="inputZip"><b>*</b>Zip Code</label>
                  <input type="number" min="0" id="inputZip" name="zip_code" value="{{ $customer->zip_code }}" class=" @error('zip_code') is-invalid @enderror">
                  @error('zip_code') 
                   <div class="invalid-feedback form-error">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <br><br>
                <b style="color: orange; font-size: 15px; padding: 15px 0px 15px 15px;" >*Wajib Diisi !</b>
                <br><br>
  
              <button type="submit" class="submit">Change</button>
          </form>
     </div>
  </div>
    
@endsection