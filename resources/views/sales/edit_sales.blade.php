@extends('layout/mainku')

@section('title', 'Data Sale') 

@section('content') 


<div class="form-input " style=" width: 70%">
    <div class="forminput-head">
              <h1>Form Update Data Sale</h1>
    </div>
      <div class="forminput-block">
          <form method="post" action="/sales/update/{{ $sales->nota_id }}">
            @csrf
            @method('put')

              <div>
                  <b style="padding-left: 18px;">ID Nota : {{ $sales->nota_id }}</b>
              </div>
          
              <br>

              <div class="col-md-6">
                  <label for="inputCustomerID"><b>*</b>Customer Name</label>
                  <select id="inputCustomerID" name="customer_id" value="{{ $sales->customer_id }}" class="@error('customer_id') is-invalid @enderror">
                  @error('customer_id') 
                   <div class="invalid-feedback form-error"  >
                    {{ $message }}
                  </div>
                  @enderror

                  @foreach ($customers as $customer)
                    <option value="{{ $customer->customer_id }}" {{ $customer->customer_id == $sales->customer_id ? 'selected':'' }}>
                      {{ $customer->first_name }}
                    </option>
                  @endforeach
        
                  </select>
              </div>
            


              <div class="col-md-6">
                  <label for="inputUserID"><b>*</b>User Name</label>
                  <select id="inputUserID" name="user_id" value="{{ $sales->user_id }}" class=" @error('user_id') is-invalid @enderror">
                  @error('user_id') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror

                  @foreach ($users as $user)
                    <option value="{{ $user->user_id }}" {{ $user->user_id == $sales->user_id ? 'selected':'' }}>
                      {{ $user->first_name }}
                    </option>
                  @endforeach

                  </select>
              </div>

               
              <div class="col-md-6" >
                  <label><b>*</b>Nota Date</label>
                  <input type="date" name="nota_date" value="{{ $sales->nota_date }}" class="@error('nota_date') is-invalid @enderror" style="height: 50px">
                  @error('nota_date') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                <div class="col-md-6" >
                  <label><b>*</b>Total Payment</label>
                  <input type="number" min="0" name="total_payment" value="{{ $sales->total_payment }}" class=" @error('total_payment') is-invalid @enderror">
                  @error('total_payment') 
                   <div class="invalid-feedback form-error" >
                    {{ $message }}
                  </div>
                  @enderror
                </div>


                 <br><br>
                <b style="color: orange; font-size: 15px; padding: 15px 0px 15px 40em;" >*Wajib Diisi !</b>
                <br><br>


              <button type="submit" class="submit">Change</button>

           
            </form>
      </div>
  </div>

    
@endsection