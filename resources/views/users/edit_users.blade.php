@extends('layout/mainku')

@section('title', 'Data User') 

@section('content') 


 <div class="form-input ">
    <div class="forminput-head">
              <h1>Form Update Data User</h1>
    </div>
      <div class="forminput-block">
          <form method="post" action="/users/update/{{ $user->user_id }}">
            @csrf
            @method('put')

              <div>
                  <b style="padding-left: 18px;">ID User : {{ $user->user_id }}</b>
              </div>
          
              <br>
              <div class="col-md-6">
                  <label><b>*</b>First Name</label>
                  <input type="text" name="first_name" value="{{ $user->first_name }}" class="@error('first_name') is-invalid @enderror">
                  @error('first_name') 
                   <div class="invalid-feedback form-error">
                    {{ $message }}
                  </div>
                  @enderror
              </div>

                <div class="col-md-6">
                  <label><b>*</b>Last Name</label>
                  <input type="text" name="last_name" value="{{ $user->last_name }}" class="@error('last_name') is-invalid @enderror">
                  @error('last_name') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              



              <div class="col-md-6">
                  <label><b>*</b>Email</label>
                  <input type="email" name="email" value="{{ $user->email }}" class="@error('email') is-invalid @enderror">
                  @error('email') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              

      
                <div class="col-md-6">
                  <label><b>*</b>Phone</label>
                  <input type="number" min="0" name="phone" value="{{ $user->phone }}" class="@error('phone') is-invalid @enderror">
                  @error('phone') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror

                </div>
                

              <div class="col-md-6">
                 <label><b>*</b>Password</label>
                <input type="password" name="password" value="{{ $user->password}}" class=" @error('password') is-invalid @enderror">
                  @error('password') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror

              </div>
             
                <div class="col-md-6">
                  <label><b>*</b>Job Status</label>
                  <input type="text" name="job_status" value="{{ $user->job_status }}" class=" @error('job_status') is-invalid @enderror">
                  @error('job_status') 
                   <div class="invalid-feedback form-error" >
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