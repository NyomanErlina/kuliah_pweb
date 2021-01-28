@extends('layout/mainku')

@section('title', 'Data Sales') 

@section('content') 



<!-- Modal 
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        
         <h1 style="font-size: 12px ">#Nota ID :  </h1>
        <table border="1" width="100%" id="tableModal">
           <thead>
               
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Selling Price</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Total Price</th>
                </tr>
              </thead>
              <tbody>
                
            
                
              </tbody>

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

-->

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs " >
      <li class="nav-item nav-hover">
        <a class="active" href="{{ url('/sales') }}  " style="color: black;"><b> Data Sales </b></a>
      </li>
      <li class="nav-item nav-hover">
        <a href="{{ url('/sales/trash_sales') }}" style="color: black;"><b> Dustbin </b></a>
      </li>
 
    </ul>
  </div>

          @if (session('status'))
                <div class="alert alert-success">
                      {{ session('status') }}
                 </div>
            @endif


           <div class="card-header" style="background-color: #EEE8AA">
                <h1 class="judul-data"><b> Data Sales</b></h1> 
            </div>
                  
         
    <div class="card-body" style="background-color: #FFFFE0; width: 100%; height: 100%;">
          
           <a class="btn-input" href="/sales/create" style="margin-right: 60px;" >  <img src="{{ asset('images/icon-plus.png') }}" width="25" height="25"><b> Input Data </b></a>

            <table style="width: 90%;">
              <thead>
                
                <tr>
                  <th style="width:60px">No.</th>
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
                <?php $no = 0; ?>  
                @foreach($sales as $sale)
                <?php $no = $no+1 ?>
                <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $sale->nota_id }}</td>
                      <td>{{ $sale->c_fullname }}</td>
                      <td>{{ $sale->u_fullname }}</td>
                      <td>{{ date('d-m-Y', strtotime($sale->nota_date)) }}</td>
                      <td>Rp{{ number_format($sale->total_payment,2,',','.') }}</td>
                      <td>{{ $status }}</td>
                      <td>


                        
                        <div class=" col-md-6" >
                            <a href="{{ route('sales.print_invoice', $sale->nota_id) }}" style="color: black" > <img src="{{ asset('images/print.png') }}" width="21" height="18" style="padding-left: 2px" > <br> <b style="font-size: 14px;"> Print </b></a>

                        </div>

                        <div class=" col-md-6" >
                            <a href="/sales/delete/{{ $sale->nota_id }}" style="color: black" onclick="return confirm('Anda yakin ingin menghapus data ini?')" > <img src="{{ asset('images/icon-delete.png') }}" width="21" height="21" style="padding-left: 2px" > <br> <b style="font-size: 14px;"> Delete </b></a>

                        </div>
                      <!--
                        <div class=" col-md-6" >
                            <a href="/sales/edit/{{ $sale->nota_id }}" style="color: black"> <img src="{{ asset('images/icon-edit.png') }}" width="20" height="20"> <br><b> Edit </b></a>
                        </div>
                      -->  
                
                    <!--
                        <div class="col-md-4 " >
                            <button href="/sales/getDetails/{{ $sale->nota_id }}" onclick="modal();"> <img src="{{ asset('images/details.png') }}" width="23" height="23"> <br><b style="font-size: 14px;"> Details </b></button>
                          </div> 


                          <div class="form-group col-md-4 " >
                            <a href="/sales/sales_details" style="color: black ;" class="button"> <img src="{{ asset('images/icon-arrow-down.png') }}" width="20" height="20"> <br><b> Detail </b></a>
                          </div> 
                      -->

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


@section('tambahan')

<script type="text/javascript">
/*
function modal()
{
    $("#myModal").modal("show");
}


function getDetail()
{  
    
      var id_detail = document.getElementById('idnota_detail').value;
      document.getElementById('idnota_detail_text').value = id_detail;

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
            type:"POST",
            url:"/sales/getDetails",
            data:{
              "key":id_detail,
              "_token": "{{ csrf_token() }}",//harus ada ini jika menggunakan metode POST
            },
            success : function(results) {
              //console.log(JSON.stringify(results)); //print_r
                //console.log(results.product[0].product_name);

              barang = results;
              
              var table = document.getElementById('tableModal');


              for(var i=0; i<results.detailsales.length; i++)
              {
                var row = table.insertRow(table.rows.length);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);

                cell1.innerHTML = '<td style="text-align:center">'+results.detailsales[i].product_name+'</td>';
                cell2.innerHTML = '<td style="text-align:center">'+results.detailsales[i].quantity+'</td>';
                cell3.innerHTML = '<td style="text-align:center">Rp. '+results.detailsales[i].selling_price+'</td>';
                cell4.innerHTML = '<td style="text-align:center">Rp. '+results.detailsales[i].discount+'</td>';
                cell5.innerHTML = '<td style="text-align:center">Rp. '+results.detailsales[i].total_price+'</td>';

              }

              modal();
             
            },
            error: function(data) {
                console.log(data);
            }
      });
    
}
*/
</script>

@endsection
