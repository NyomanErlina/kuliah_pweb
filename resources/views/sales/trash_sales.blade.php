@extends('layout/mainku')

@section('title', 'Data Sales') 

@section('content') 

<!--
<u2>
  <li2><a href="{{ url('/sales') }} "> <b>Data Sales </b></a></li2>
  <li2><a class="active" href="{{ url('/sales/trash_sales') }}"> <b> Dustbin </b></a></li2>

</u2>

<br><br><br>
-->


          

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a href="{{ url('/sales') }} " style="color: black;"><b> Data Sales </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/sales/trash_sales') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

 
        <div class="card-header" style="background-color: #EEE8AA">
          <h1 class="judul-data">Data Sales yang Telah Dihapus </h1>
        </div>

          <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
             <a class="btn-input" href="/sales/restore_all" style="margin-right: 60px;"  > <b> Restore All</b></a>

            <table style="width: 90%;">
              <thead>
              
                <tr>
                  <th scope="col">Nota ID</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Nota Date</th>
                  <th scope="col">Total Payment</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sales as $sale)
                <tr>
                  <td>{{ $sale->nota_id }}</td>
                  <td>{{ $sale->c_fullname }}</td>
                  <td>{{ $sale->u_fullname }}</td>
                  <td>{{ $sale->nota_date }}</td>
                  <td>{{ $sale->total_payment }}</td>
                  <td>{{ $status }}</td>
                  <td>
                  
                      <div>
                           <a href="/sales/restore/{{ $sale->nota_id }}" style="color: black"  > <img src="{{ asset('images/icon-edit.png') }}" width="20" height="20"> <br> <b> Restore </b></a>

                      </div>
    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <br><br><br>
          </div>
      </div>
      
  <br><br><br><br><br> 
    
@endsection