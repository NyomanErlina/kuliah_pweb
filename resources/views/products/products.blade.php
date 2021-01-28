@extends('layout/mainku')

@section('title', 'Data Products') 

@section('content') 


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/products') }} " style="color: black;"><b> Data Products  </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a href="{{ url('/products/trash_products') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

          @if (session('status'))
                <div class="alert alert-success">
                      {{ session('status') }}
                 </div>
            @endif


           <div class="card-header" style="background-color: #EEE8AA">
                <h1 class="judul-data"><b> Data Products</b></h1> 
            </div>
                  
         
    <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
           @if(session('job_status') == 'Administrator' || session('job_status') == 'Product Manager')
              <a class="btn-input" href="/products/create" style="margin-right: 60px;" >  <img src="{{ asset('images/icon-plus.png') }}" width="25" height="25"><b> Input Data </b></a>
              @else
              <br><br>
            @endif

          
            <table style="width: 90%;">
              <thead>
               
                <tr>
                  <th scope="col">Product ID</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Product Stock</th>
                  <th scope="col">Explanation</th>
                  <th scope="col">Status</th>
                  @if(session('job_status') == 'Administrator' || session('job_status') == 'Product Manager')
                  <th scope="col">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                 @foreach($products as $product)
                <tr>
                  <td>{{ $product->product_id }}</td>
                  <td>{{ $product->category_name }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>Rp{{ number_format($product->product_price,2,',','.') }}</td>
                  <td>{{ $product->product_stock }}</td>
                  <td>{{ $product->explanation }}</td>
                  <td>{{ $status }}</td>

                  @if(session('job_status') == 'Administrator' || session('job_status') == 'Product Manager')
                  <td>
                      
                        <div class=" col-md-6" >
                            <a  href="/products/delete/{{ $product->product_id }}" style="color: black" onclick="return confirm('Anda yakin ingin menghapus data ini?')" > <img src="{{ asset('images/icon-delete.png') }}" width="20" height="20" style="padding-left: 2px" > <br> <b> Delete </b></a>

                        </div>
 
                        <div class=" col-md-6" >
                            <a href="/products/edit/{{ $product->product_id }}" style="color: black"> <img src="{{ asset('images/icon-edit.png') }}" width="20" height="20"> <br><b> Edit </b></a>
                        </div>
                   
                  </td>
                  @endif

                </tr>
                @endforeach
              </tbody>
            </table>
            <br><br><br>
      </div>
</div>
<br><br><br>
@endsection

