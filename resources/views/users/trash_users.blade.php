@extends('layout/mainku')

@section('title', 'Data Users') 

@section('content') 




<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a href="{{ url('/users') }} " style="color: black;"><b> Data Users </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/users/trash_users') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

 
        <div class="card-header" style="background-color: #EEE8AA">
          <h1 class="judul-data">Data Users yang Telah Dihapus </h1>
        </div>

          <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
             <a class="btn-input" href="/users/restore_all" style="margin-right: 60px;" > <b> Restore All</b></a>     


            <table style="width: 90%;">
              <thead>
               
                <tr>
                  <th scope="col">User ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Password</th>
                  <th scope="col">Job Status</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->user_id }}</td>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $user->password }}</td>
                  <td>{{ $user->job_status}}</td>
                  <td>{{ $status }}</td>
                  <td>
                
                    
                  <div>
                       <a href="/users/restore/{{ $user->user_id }}" style="color: black"  > <img src="{{ asset('images/icon-edit.png') }}" width="20" height="20"> <br> <b> Restore </b></a>

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