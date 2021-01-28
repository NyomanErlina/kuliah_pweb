<!DOCTYPE html>
<html>
<head>
  <title>Laporan Penjualan 2020</title>
</head>
<body>
  <style type="text/css">
   
     table{
            text-align: center;
            border:1px solid #333;
            border-collapse:collapse;
            margin: auto;
            width:100%;
            font-size: 14px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            border-collapse:collapse;
        }
        th{
            background-color: #f0f0f0;
            font-size: 16px;
        }

  </style>
  <center>
    <h3 style="text-align: center; font-size: 24px;">Laporan Penjualan Tahun 2020</h3>
   
  </center>
  <br>

 
  <table class='table table-bordered' style="border-color: black;">
              <thead>
                
                <tr>
                  <th style="width:60px">No.</th>
                  <th scope="col">Nota ID</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Nota Date</th>
                  <th scope="col">Total Payment</th>
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
                </tr>

            
                @endforeach
              </tbody>
  </table>
  <br>
  <h3 style="text-align: center; font-size: 22px;">Detail Penjualan</h3>
 <br>
  <table class='table table-bordered'>
              <thead>
                <tr>
                  <th scope="col">Nota ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Selling Price</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Total Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach($salesdetail as $detsal)
                <tr>
                      <td>{{ $detsal->nota_id }}</td>
                      <td>{{ $detsal->product_name }}</td>
                      <td>{{ $detsal->quantity }}</td>
                      <td> Rp{{ number_format($detsal->selling_price,2,',','.') }}</td>
                      <td>Rp{{ number_format($detsal->discount,2,',','.') }}</td>
                      <td>Rp{{ number_format($detsal->total_price,2,',','.') }}</td>
                   
                </tr>

            
                @endforeach
              </tbody>

  </table>
</body>
</html>