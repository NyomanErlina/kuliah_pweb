@extends('layout/mainku')

@section('title', 'Data Sale') 

@section('head')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


                  


@endsection 

@section('content') 
 
<div class="card">

  <div class="card-header" style="background-color: #EEE8AA">
      <h1 class="judul-data"><b> Detail Transaction</b></h1> 
  </div>

    <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
    <form action="/sales/update/{{ $sales->nota_id }}" method="post" id="catForm">
        @csrf
        @method('put')
        <input type="hidden" name="nota_id" value="{{ $sales->nota_id }}">
        <h1 style="font-size: 18px; padding: 20px 0px 0px 48px;"><b> #ID Nota : {{ $sales->nota_id }} </b></h1>
        <div class="row" style="padding-left: 20px;">
          <div class="col-md-6">
             <div class="form-group" style="padding: 25px 40px 25px 25px; font-size: 18px;">
                   <div class="card_area" style="vertical-align: top;">
                      <label for="nota_date"><i class='far fa-calendar-alt' style='font-size:18px'></i> Date </label>  
                      <div class="form-group">
                        <input type="date" id="nota_date" name="nota_date" value="{{ $sales->nota_date }}" readonly>
                      </div>
                    </div>

               
                    <div style="vertical-align: top; width: 30%">
                      <label for="user"><i class='fas fa-user-circle' style='font-size:18px'></i> User</label>
                    </div>
                  
                      <div class="form-group">
                         <input type="hidden" name="user_id" value="{{@session('user_id')}}"> {{@session('first_name')}} {{@session('last_name')}}
                      </div>


                    <div style="vertical-align: top;">
                      <label for="customer"><i class='fas fa-user-alt' style='font-size:18px'></i> Customer</label>
                    </div>
            
                      <div>
                        <select required id="customer_id" name="customer_id" value="{{ $sales->customer_id }}" class="form-control @error('customer_id') is-invalid @enderror" style="width: 21em; height: 2.5em; font-size: 16px;" >
                          <option disabled selected readonly>- Pilih Customer -</option>
                           @foreach ($customers as $customer)
                            <option value="{{ $customer->customer_id }}" {{ $customer->customer_id == $sales->customer_id ? 'selected':'' }}>
                              {{ $customer->first_name }} {{ $customer->last_name }}
                            </option>
                          @endforeach
                        </select>
                        @error('customer_id') 
                          <div class="invalid-feedback form-error" >
                            {{ $message }}
                          </div>
                          @enderror
                      </div>
                 
              </div>
            </div>

        <div class="col-md-6">
           <div class="form-group" style="padding: 25px 40px 25px 25px;">
              <div>
              <label for="product_id" style="font-size: 18px;"><i class="fa fa-product-hunt" style="font-size:18px"></i> Product</label>
               <select id="id_product" class="form-control" style="width: 21em; height: 2.5em; font-size: 16px;">

                <option disabled selected readonly>- Pilih Product -</option>
                  @foreach ($salesdet as $s)
                    <?php 
                      $sdt = $s -> product_id ; 
                    ?>
                  @endforeach
                  @foreach ($products as $product)
                        @if( $product->product_id  ==  $sdt )
                          <option hidden value="{{ $product->product_id }}" id="{{ $product->product_id }}" ></option>
                        @else
                          <option value="{{ $product->product_id }}" id="{{ $product->product_id }}" > {{ $product->product_name }} </option> 
                        @endif

                  @endforeach
                </select>
              </div>
                
              <br>
              <input type="button" class="add-row btn btn-flat btn-warning" value="Add Product">
          
            </div>
        </div>
    </div>


    <br>

      <!--================Cart Area =================-->
     <!-- <section class="cart_area"> -->
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive" style="width: 95%">
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">ID Product</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Total Price</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($salesdet as $saldet)
                  <?php $iddet = $saldet -> product_id ; ?>

                    <tr>
                    <td>
                      <input type="hidden" name="product_id[{{$iddet}}]" 
                      value="{{$iddet}}" readonly id="product_id{{$iddet}}">
                      {{$iddet}}
                    </td>

                    <td>
                      <h6 class="product_name" style="font-size : 15px;">
                        {{$saldet->product_name}}
                    </td>

                    <td style="width: 5%;">
                      <input type="number" style="width: 100%;" class="quantity" oninput="myFunction(<?php echo $iddet; ?>)" name="quantity[{{$iddet}}]" min="1" id="quantity{{$iddet}}" required max="{{$saldet->product_stock}}" value="{{$saldet -> quantity}}" >
                    </td>

                    <td>
                      Rp. <input type="hidden" class="selling_price" name="selling_price[{{$iddet}}]"  min="1" id="price{{$iddet}}" style="font-size : 15px;" required value="{{ $saldet -> selling_price}}" readonly >  
                      {{ $saldet -> selling_price}}
                    </td>

                    <td style="width: 15%;">
                      Rp. <input type="number" min="0" oninput="myFunction(<?php echo $iddet; ?>)" class="discount" name="discount[{{$iddet}}]" id="discount{{$iddet}}" required placeholder="0"  value="{{$saldet->discount}}" style="width: 50%;">
                    </td>

                    <td style="padding-right: 0px; padding-left: 0px">
                      Rp. <input type="hidden" class="total_price"  name="total_price[{{$iddet}}]" min="1" id="total_price{{$iddet}}" required readonly value="{{$saldet->total_price}}">
                      <h6 style="font-size : 15px;" id="totaltext{{$iddet}}"> 
                        {{ $saldet->total_price }}
                    </td>

                    <td>
                      <button id="del" type="button" name="remove" class="btn btn-danger btn_remove" onClick="delrow({{$iddet}})" >X</button>
                    </td>
                  </tr>
                  @endforeach
                 
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
    <!--  </section> -->
      <!--================End Cart Area =================-->
      <br>
         <div class="row" style="padding-left: 25px;">
            <div style="padding: 10px 40px 25px 25px;" >
                <div>
                <h1 style="font-size: 18px ">Sub Total : Rp. <input type="text" id="subtotal" name="subtotal" style="border: 0px;" readonly> </h1>
                </div>

                <br>
      
               <div>
                  <h1 style="font-size: 18px ">Total Discount : Rp. <input type="text" id="total_discount" name="total_discount" style="border: 0px;"  readonly> </h1>
                </div>

                <br>
                
                 <div>
                    <h1 style="font-size: 18px ">Total Payment : Rp. <input type="text" id="total_payment" name="total_payment" value=""  style="border: 0px;" readonly> </h1>
                  </div>

              </div>
         </div>

            <div style="padding-left: 800px;">
              <input type="submit" class="btn btn-flat btn-lg-10 btn-success" value="Update">
            </div>

            <br>
          </form>
     </div>
</div>


@endsection


@section('tambahan')

<script type="/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script type="/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="/admin/js/demo/datatables-demo.js"></script>
<script type="text/javascript">

  var product = <?php echo json_encode($products); ?>;
  

$(document).ready(function(myFunction){
    var totals = document.getElementsByClassName("total_price");

    var i;

    var total_p = 0;
    for (i=0; i< totals.length; ++i){
      total_p = total_p + Number(totals[i].value);
    }
    document.getElementById('subtotal').value = total_p;

    var discounts = document.getElementsByClassName("discount");

    var i;
    var total_disc = 0;
    for (i=0; i< discounts.length; ++i ){
      total_disc = total_disc + Number(discounts[i].value);
    }
    document.getElementById('total_discount').value = total_disc;
    document.getElementById('total_payment').value = total_p - total_disc;

 }); 

  function myFunction(id) {
    var quantity = document.getElementById("quantity"+id).value;
    var price = document.getElementById("price"+id).value;
    var subtotal = (quantity*price);
    document.getElementById("discount"+id).setAttribute("max", subtotal);

    var total_price = (quantity*price);
    document.getElementById("total_price"+id).value = total_price;
    document.getElementById("totaltext"+id).innerHTML = total_price;

    var totals = document.getElementsByClassName("total_price");

    var i;
    var total_p = 0;
    for (i=0; i< totals.length; ++i){
      total_p = total_p + Number(totals[i].value);
    }
    document.getElementById('subtotal').value = total_p;

    var discounts = document.getElementsByClassName("discount");

    var i;
    var total_disc = 0;
    for (i=0; i< discounts.length; ++i ){
      total_disc = total_disc + Number(discounts[i].value);
    }
    document.getElementById('total_discount').value = total_disc;

    document.getElementById('total_payment').value = total_p - total_disc;
  };

    function delrow(id){
        $("#id_product option").each(function() {
            if(  ($(this).val() == id) )
                $(this).show();
          
          });
    }

$(document).ready(function(){

    function indexProduct(id){
        for(var i=0; i< product.length; i++){
          if (product[i]["product_id"]==id) {
            return i;

          }
        }
    }

    $(".add-row").click(function(){
      var y = document.getElementById("id_product");
      var x = y.options[y.selectedIndex].value;
      var index = indexProduct(x);

      console.log(index);


      var id = product[index]["product_id"];
      var name = product[index]["product_name"];
      console.log(name);

      var price = product[index]["product_price"];
      var stock = product[index]["product_stock"];
     
      var markup = "<tr>\
      <td>\
          <input type='hidden' name='product_id["+id+"]' value='"+id+"' readonly id='product_id"+id+"'>"+id+"\
      </td>\
      <td>\
          <h6 class='product_name' style='font-size : 15px;'>"+name+"\
      </td>\
      <td style='width: 5%;'>\
          <input type='number' style='width: 100%;' class='quantity' oninput='myFunction("+id+")' name='quantity["+id+"]' min='1' id='quantity"+id+"' required max='"+stock+"' value='1'>\
      </td>\
      <td>\
          Rp. <input type='hidden' class='selling_price' name='selling_price["+id+"]' min='1' id='price"+id+"' style='font-size : 15px;' required value='"+price+"' readonly>"+price+"\
      </td>\
      <td style='width: 20%;''>\
          Rp. <input type='number' min='0' oninput='myFunction("+id+")' class='discount' name='discount["+id+"]' id='discount"+id+"' required placeholder='0' style='width: 50%;'>\
      </td>\
      <td>\
          Rp. <input type='hidden' class='total_price' name='total_price["+id+"]' min='1' id='total_price"+id+"' required readonly value='0'><h6 style='font-size : 15px;' id='totaltext"+id+"'>\
      </td>\
      <td>\
          <button type='button' name='remove' class='btn btn-danger btn_remove' onClick='delrow("+id+")' >X</button> \
      </td>\
      </tr>";
       
       $("#id_product option:selected").hide();
       document.getElementById('id_product').value = "" ;
      $("table tbody").append(markup);
      myFunction(id);
     
    });


    $("#myTable").on('click', '.btn_remove', function () {
      $(this).closest('tr').remove();

      var totals = document.getElementsByClassName("total_price");

      var i;
      var total_p = 0;

      for (i=0; i<totals.length; ++i){
        total_p = total_p +Number(totals[i].value);
      }

      document.getElementById('subtotal').value = total_p;

      var discounts = document.getElementsByClassName("discount");

      var i;
      var total_disc = 0; 
      for (i=0; i< discounts.length; ++i ){
        total_disc = total_disc + Number(discounts[i].value);
      }
      document.getElementById('total_discount').value = total_disc;

      document.getElementById('total_payment').value = total_p - total_disc;
    });

});

  </script>

<script type="/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script type="/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="/admin/js/demo/datatables-demo.js"></script>

@endsection

 