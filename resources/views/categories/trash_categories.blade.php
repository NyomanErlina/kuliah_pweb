@extends('layout/mainku')

@section('title', 'Data Categories') 

@section('content') 


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a href="{{ url('/categories') }} " style="color: black;"><b> Data Categories </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/categories/trash_categories') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

 
        <div class="card-header" style="background-color: #EEE8AA">
          <h1 class="judul-data">Data Categories yang Telah Dihapus </h1>
        </div>

          <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
             <a class="btn-input" href="/categories/restore_all" style="margin-right: 170px;"   > <b> Restore All</b></a>

              <br><br><br>

            <table style="width: 70%;">
              <thead>
              
                <tr>
                  <th scope="col">Category ID</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>

                  <td>{{ $category->category_id }}</td>
                  <td>{{ $category->category_name }}</td>
                  <td>{{ $status }}</td>
                  <td>
                    
                  <div>
                       <a href="/categories/restore/{{ $category->category_id}}" style="color: black"  > <img src="{{ asset('images/icon-edit.png') }}" width="20" height="20"> <br> <b> Restore </b></a>

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