@extends('layout/mainku')

@section('title', 'Data Customers') 

@section('content') 

<style type="text/css">
  td, tr, th{
            padding-left:5px;
            padding-right:5px;
        }
</style>


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/customers') }} " style="color: black;"><b> Data Customers </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a href="{{ url('/customers/trash_customers') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

          @if (session('status'))
                <div class="alert alert-success">
                      {{ session('status') }}
                 </div>
            @endif

   <div class="card-header" style="background-color: #EEE8AA">
       <h1 class="judul-data"><b> Data Customers </b></h1> 
  </div>         
         
    <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
           <a class="btn-input" href="/customers/create"  >  <img src="{{ asset('images/icon-plus.png') }}" width="25" height="25"><b> Input Data </b></a>
       
            <table style="width: 100%; font-size: 14px;">
              <thead>
                <tr>
                  <th scope="col">Customer ID</th>
                  <th scope="col" >First Name</th>
                  <th scope="col" >Last Name</th>
                  <th scope="col" >Phone</th>
                  <th scope="col" >Email</th>
                  <th scope="col" >Street</th>
                  <th scope="col" >City</th>
                  <th scope="col" >State</th>
                  <th scope="col" >Zip Code</th>
                  <th scope="col" >Status</th>
                  <th scope="col" >Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach($customers as $customer)
                <tr>
                  <td>{{ $customer->customer_id }}</td>
                  <td>{{ $customer->first_name }}</td>
                  <td>{{ $customer->last_name }}</td>
                  <td>0{{ $customer->phone }}</td>
                  <td>{{ $customer->email }}</td>
                  <td>{{ $customer->street }}</td>
                  <td>{{ $customer->city }}</td>
                  <td>{{ $customer->state }}</td>
                  <td>{{ $customer->zip_code }}</td>
                  <td>{{ $status }}</td>
                  <td>
                    <div class="row">
                    <div class="col-md-3">
                         <a  href="/customers/delete/{{ $customer->customer_id }}" style="color: black" onclick="return confirm('Anda yakin ingin menghapus data ini?')" > <img src="{{ asset('images/icon-delete.png') }}" style=" width: 19px ; height: 19px; padding-left: 1px; "> <br> <b style="font-size: 13px;"> Del </b></a>

                    </div>
                    <div class="col-md-3">
                        <a href="/customers/edit/{{ $customer->customer_id }}" style="color: black"> <img src="{{ asset('images/icon-edit.png') }}" style="width: 19px ; height: 19px; padding-left: 2px;"> <br><b style="font-size: 13px;"> Edit </b></a>
                    </div>
                    </div>
                   
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <br><br><br>
        </div>
</div>

<br><br><br>
@endsection