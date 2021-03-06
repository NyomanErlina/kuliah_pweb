@extends('layout/mainku')

@section('title', 'Data Categories') 

@section('content') 

<!--
<u2>
  <li2><a class="active" href="{{ url('/categories') }} "><b> Data Categories </b></a></li2>
  <li2><a href="{{ url('/categories/trash_categories') }}"><b> Dustbin </b> </a></li2>

</u2>

<br><br><br>

-->
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/categories') }} " style="color: black;"><b> Data Categories  </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a href="{{ url('/categories/trash_categories') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

          @if (session('status'))
                <div class="alert alert-success">
                      {{ session('status') }}
                 </div>
            @endif

           <div class="card-header" style="background-color: #EEE8AA">
                <h1 class="judul-data"><b> Data Categories </b></h1> 
            </div>

        <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%; ">
          
           <a class="btn-input" href="/categories/create" style="margin-right: 170px;"  >  <img src="{{ asset('images/icon-plus.png') }}" width="25" height="25"><b> Input Data </b></a>

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

                      <div class="col-md-6">
                        <a href="/categories/delete/{{ $category->category_id }}" style="color: black" onclick="return confirm('Anda yakin ingin menghapus data ini?')" > <img src="{{ asset('images/icon-delete.png') }}" width="20" height="20" style="padding-left: 2px" > <br> <b> Delete </b></a>

                      </div>
 

                    
                       <div class="col-md-6" >
                        <a href="/categories/edit/{{ $category->category_id}}" style="color: black"> <img src="{{ asset('images/icon-edit.png') }}" width="20" height="20"> <br><b> Edit </b></a>
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