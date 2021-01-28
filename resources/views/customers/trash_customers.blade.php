@extends('layout/mainku')

@section('title', 'Data Customers') 

@section('content') 


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a href="{{ url('/customers') }} " style="color: black;"><b> Data Customers </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/customers/trash_customers') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

 
        <div class="card-header" style="background-color: #EEE8AA">
          <h1 class="judul-data">Data Customers yang Telah Dihapus </h1>
        </div>

          <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
             <a class="btn-input" href="/customers/restore_all"  > <b> Restore All</b></a>

            <table style="width: 95%;">
              <thead>
                <tr>
                  <th scope="col">Customer ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Street</th>
                  <th scope="col">City</th>
                  <th scope="col">State</th>
                  <th scope="col">Zip Code</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($customers as $cus)
                <tr>
                  <td>{{ $cus->customer_id }}</td>
                  <td>{{ $cus->first_name }}</td>
                  <td>{{ $cus->last_name }}</td>
                  <td>{{ $cus->phone }}</td>
                  <td>{{ $cus->email }}</td>
                  <td>{{ $cus->street }}</td>
                  <td>{{ $cus->city }}</td>
                  <td>{{ $cus->state }}</td>
                  <td>{{ $cus->zip_code }}</td>
                  <td>{{ $status }}</td>
                  <td>                   
                  <div>
                       <a href="/customers/restore/{{ $cus->customer_id }}" style="color: black"  > <img src="{{ asset('images/icon-edit.png') }}" width="20" height="20"> <br> <b> Restore </b></a>

                  </div>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <br> <br> <br>
    </div>

</div>
  
<br><br><br><br><br>

      
  
    
@endsection