@extends('layout/mainku')

@section('title', 'Data Sales Details') 

@section('content') 


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/salesdet') }} " style="color: black;"><b> Data Sales Details</b></a>
      </li>
      <li class="nav-item nav-hover">
        <a href="{{ url('/salesdet/trash_sales_details') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

          @if (session('status'))
                <div class="alert alert-success">
                      {{ session('status') }}
                 </div>
            @endif


           <div class="card-header" style="background-color: #EEE8AA">
                <h1 class="judul-data"><b> Data Sales Details</b></h1> 
            </div>
                  
         
    <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
          
      <br><br>      

            <table style="width: 90%;">
              <thead>
               
                <tr>
                  <th scope="col">Nota ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Selling Price</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Status</th>
               
                </tr>
              </thead>
              <tbody>
                @foreach($salesdetail as $detsal)
                <tr>
                      <td>{{ $detsal->nota_id }}</td>
                      <td>{{ $detsal->product_name }}</td>
                      <td>{{ $detsal->quantity }}</td>
                      <td> Rp{{ number_format($detsal->selling_price,2,',','.') }}</td>
                      <td>Rp{{ number_format($detsal->discount,2,',','.') }}</td>
                      <td>Rp{{ number_format($detsal->total_price,2,',','.') }}</td>
                      <td>{{ $status }}</td>
                   
                </tr>

            
                @endforeach
              </tbody>
            </table>
            <br><br><br>
      </div>
</div>
      
<br><br><br>

    
@endsection