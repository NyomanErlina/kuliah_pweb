<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice-{{$nota_id}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:14px;
            margin:auto;
        }
        .container{
            margin: auto;
            margin-top:10px;
            padding:1px;
            position: absolute;
            width:100%;
            height:100%;
            background-color:#fff;
        }
        caption{
            text-align: center;
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            text-align: center;
            border:1px solid #333;
            border-collapse:collapse;
            margin: auto;
            width:80%;
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
        h4, p{
            margin:0px;
        }
        h4{
            font-size: 16px;
        }
    </style>

</head>
<body>
    <div class="container">
        <table>
            <caption>
                INVOICE
            </caption>
            @foreach ($sales as $s)
            <thead style="text-align: left;">
                <tr>
                    <th colspan="3">Nota #{{ $s->nota_id }}</th>
                    <th colspan="2">{{date('d F Y', strtotime($s->nota_date)) }}</th>
                </tr>
                <tr>
                    <td colspan="2" style="margin: auto; position: absolute;">
                        <h4 style="padding-bottom: 5px;">Seller </h4>
                        <p>
                        Name     : N.EL.D STORE<br>
                        Address  : Jl Airlangga 99, Surabaya<br>
                        Phone    : 085098632567<br>
                        </p>
                    </td>
                    <td colspan="3" style="margin: auto; position: absolute;">
                        <h4 style="padding-bottom: 5px;">Customer </h4>
                        @foreach ($customer as $c)
                        <p>
                        Name    : {{ $c->c_fullname }}<br>
                        Address : {{ $c->street }}, {{ $c->city }}<br>
                        Phone   : 0{{ $c->phone }} <br>
                        Email   : {{ $c->email }}
                        </p>
                        @endforeach
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="width: 80%;">Product Name</th>
                    <th style="width: 30%;">Quantity</th>
                    <th style="width: 50%;">Selling Price</th>
                    <th style="width: 50%; ">Discount</th>
                    <th style="width: 50%;">Total Price</th>
                </tr>
                @foreach ($salesdet as $row)
                <tr>
                    <td>{{ $row->product_name }}</td>
                    <td>{{ $row->quantity }} </td>
                    <td>Rp{{ number_format($row->selling_price,2,',','.') }}</td>
                    <td>Rp{{ number_format($row->discount,2,',','.') }}</td>
                    <td>Rp{{ number_format($row->total_price,2,',','.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4">Subtotal</th>
                    <td>Rp{{ number_format($subtotal,2,',','.') }}</td>
                </tr>
                <tr>
                    <th colspan="4">Total Discount</th>
                    <td>Rp{{ number_format($total_discount,2,',','.') }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Payment</th>
                    <td>Rp{{ number_format($s->total_payment,2,',','.') }} </td>
                </tr>
            </tfoot>
            @endforeach
        </table>
    </div>
</body>



</html>


