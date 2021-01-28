@extends('layout/mainku')

@section('title', 'Data Sale') 

@section('content') 


<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item">
        <a  href="{{ url('/customers/create') }} " style="color: black;"><b> Customers </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a href="{{ url('/users/create ') }}" style="color: black;"><b> Users </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a href="{{ url('/categories/create') }}" style="color: black;"><b> Categories </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a href="{{ url('/products/create') }}" style="color: black;"><b> Products </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/sales/create') }}" style="color: black;"><b> Sales </b></a>
      </li>
    </ul>
  </div>



  <div class="card-header" style="background-color: #EEE8AA">
      <h1 class="judul-data"><b> Detail Transaction</b></h1> 
  </div>

<div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">

<div class="row">
  <div class="col-md-6">
     <div class="form-group" style="padding: 25px 40px 25px 25px;">
           <div class="card_area" style="vertical-align: top;">
              <label for="date">Date</label>  
              <div class="form-group">
                <input type="date" id="date" value="<?=date('d-m-Y')?>" class="form-control">
              </div>
            </div>

       
            <div style="vertical-align: top; width: 30%">
              <label for="user">User</label>
            </div>
          
              <div class="form-group">
                 <select id="user" class="form-control"  value="{{old('user_id')}}">
                   @foreach ($users as $user)
                    <option value="{{ $user->user_id }}"
                      >
                      {{ $user->first_name }} {{ $user->last_name }}
                    </option>
                  @endforeach
                </select>
              </div>


            <div style="vertical-align: top;">
              <label for="customer">Customer</label>
            </div>
    
              <div>
                <select id="customer" class="form-control"  value="{{old('customer_id')}}">
                   @foreach ($customers as $customer)
                    <option value="{{ $customer->customer_id }}"
                      >
                      {{ $customer->first_name }} {{ $customer->last_name }}
                    </option>
                  @endforeach
                </select>
              </div>
         
      </div>
    </div>

  <div class="col-md-6">
     <div class="form-group" style="padding: 25px 40px 25px 25px;">
      <form action="{{ route('front.cart') }}" method="POST">
            @csrf
        <div>
          <label for="product_id">Product</label>
           <select name="product_id" id="product_id" class="form-control" required width="100%">
              <option value="">- Pilih Product -</option>
                @foreach ($products as $product)
                  <option  value="{{ $product->product_id }}"> {{ $product->product_id }} - {{ $product->product_name }} </option> 
                <!-- <option {{{ (Request::get('product_id')==  $product->product_id )? 'selected':'' }}} value="{{ $product->product_id }}"> {{ $product->product_id }} - {{ $product->product_name }}  </option> -->
                @endforeach
            </select>
          </div>
            
            <br>
            
       
          
            <div>
              <label for="qty">Quantity</label>
            </div>

            <div class="form-group">
              <input type="text" name="quantity" id="qty" maxlength="12" value="1" title="Quantity:" class="input-text qty">
              
              <!-- BUAT INPUTAN HIDDEN YANG BERISI ID PRODUK -->
              <input type="hidden" name="product_id" value=" {{ $product->product_id }}  " class="form-control">
              
               <button onclick="var result = document.getElementById('qty'); 
                              var qty = result.value; 
                              if( !isNaN( qty ) &amp;&amp; qty > 0 ) 
                                result.value--;
                                return false;"

              class="reduced items-count" type="button" style="width: 20px; height: 20px">
                <i class="lnr lnr-chevron-down"></i>
              </button>

              <button onclick="var result = document.getElementById('qty'); 
                              var qty = result.value; 
                              if( !isNaN( qty )) 
                                result.value++;
                                return false;"
              class="increase items-count" type="button"  style="width: 20px; height: 20px">
                <i class="lnr lnr-chevron-up" ></i>
              </button>
            </div>


            <div class="card_area">
              <!-- UBAH JADI BUTTON -->
             <button id="cancel" class="btn btn-flat btn-warning">Add</button> 
            </div>
          </form>

        </div>
    </div>
  </div>

      


<br>


  <!--================Cart Area =================-->
  <section class="cart_area">
    <div class="container">
      <div class="cart_inner">
        
        <!-- DISABLE BAGIAN INI JIKA INGIN MELIHAT HASILNYA TERLEBIH DAHULU -->
        <!-- KARENA MODULENYA AKAN DIKERJAKAN PADA SUB BAB SELANJUTNYA -->
        <!-- HANYA SAJA DEMI KEMUDAHAN PENULISAN MAKA SAYA MASUKKAN PADA BAGIAN INI -->
      <form action="{{ route('front.update_cart') }}" method="post">
         @csrf
        <!-- DISABLE BAGIAN INI JIKA INGIN MELIHAT HASILNYA TERLEBIH DAHULU -->
                  
        <div class="table-responsive" style="width: 95%">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Selling Price</th>
                <th scope="col">Discount</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              <!-- LOOPING DATA DARI VARIABLE CARTS -->
             @forelse ($carts as $row)
              <tr>
                <td>
                  <div class="media">
                    <div class="media-body">
                        <p>{{ $row['product_name'] }}</p>
                    </div>
                  </div>
                </td>

                <td>
                  <div class="product_count">
                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
                        <input type="text" name="quantity[]" id="qty{{ $row['product_id'] }}" maxlength="12" value="{{ $row['quantity'] }}" title="Quantity:" class="input-text qty">
                         <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" class="form-control">
                    <!-- PERHATIKAN BAGIAN INI, NAMENYA KITA GUNAKAN ARRAY AGAR BISA MENYIMPAN LEBIH DARI 1 DATA -->
                    
                      <button onclick="var result = document.getElementById('qty{{ $row['product_id'] }}'); 
                                      var qty = result.value; 
                                      if( !isNaN( qty ) &amp;&amp; qty > 0 ) 
                                        result.value--;
                                        return false;"
                     class="reduced items-count" type="button" style="width: 20px; height: 20px">
                      <i class="lnr lnr-chevron-down"></i>
                    </button>
                    
                    <button onclick="var result = document.getElementById('qty{{ $row['product_id'] }}'); 
                                      var qty = result.value;
                                      if( !isNaN( qty )) 
                                        result.value++;
                                        return false;"
                     class="increase items-count" type="button" style="width: 20px; height: 20px">
                      <i class="lnr lnr-chevron-up"></i>
                    </button>

                  </div>
                </td>


                <td>
                    Rp {{ number_format($row['product_price']) }}
                </td>

                <td>
                  <input type="number" name="discount" min="0">
                </td>

                <td>
                      Rp {{ number_format($row['product_price'] * $row['quantity']) }}
                </td>

                <td>
                    <div class="col-md-6" >
                            <a  href="/sales/create" style="color: black" onclick="return confirm('Anda yakin ingin menghapus data ini?')" > <img src="{{ asset('images/icon-delete.png') }}" width="20" height="20" style="padding-left: 2px" > <br> <b> Delete </b></a>

                        </div>
                </td>

              </tr>

                @empty
                <tr>
                  <td colspan="4">Tidak ada produk yang dipilih</td>
                </tr>
            @endforelse

            </form>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!--================End Cart Area =================-->

   <div class="row">
      <div style="padding: 10px 40px 25px 25px;" >
          <div class="form-group col-md-3">
            <div>
              <label for="sub_total">Sub Total</label>
            </div>
               <input type="text" value="Rp {{ number_format($subtotal) }}" readonly=""> 
            </div>
  
           <div class="form-group col-md-3">
            <div>
              <label for="discount">Discount</label>
            </div>
                <input id="discount" type="number" min="0" value="0" class="form-control">
            </div>
            
             <div class="form-group col-md-3">
            <div>
              <label for="total_harga2">Total Payment</label>
            </div>
                 <input type="text" value="Rp {{ number_format($subtotal) }}" readonly="">
              </div>

      </div>
   
  
 </div>
        <div style="padding-left: 800px;">
          <button id="cancel" class="btn btn-flat btn-lg-10 btn-warning">
            <i class="fa fa-refresh"></i> Cancel
          </button> 
        <span></span>
          <button id="process" class="btn btn-flat btn-lg-10 btn-success">
            <i class="fa fa-paper-plane-o"></i> Process Transaction
          </button> 
        </div>

        <br>



      
   

 </div>

</div>

<script type="text/javascript">
  

</script>



@endsection



