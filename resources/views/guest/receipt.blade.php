<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Receipt Slip</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/5b6d778cbc.js" crossorigin="anonymous"></script> -->
    <link rel="shortcut icon" type="image/jpg" href="{{url('/img/logo.png')}}"/>	
    <link rel="stylesheet" type="text/css" href="{{url('/login-css/css/login-style.css')}}">
  <style>
   #slip-table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#slip-table  td, #slip-table  th {
  border: 1px solid #ddd;
  padding: 8px;
}

#slip-table  tr:nth-child(even){background-color: #f2f2f2;}

#slip-table  tr:hover {background-color: #ddd;}

#slip-table  th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #841F1A;
  color: white;
}

/* Create two equal columns that floats next to each other */
.custom-column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 150px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.custom-row:after {
  content: "";
  display: table;
  clear: both;
}

.custom-row{
  width:100%;
  margin-top:30px;
  margin-bottom:30px;
  padding:25px;
  border:1px solid #000;
}
</style>


</head>
<body style="background:none;">
    
    <div class="main">
        <div class="main-inner">
        <div class="container">
            <div class="row">
                    <div class="col-6 mx-auto ">
                        <center><img id="logo" src="{{url('/img/logo.png')}}" width="150"></center>
                        <p style="text-align:center; padding-bottom:20px; font-weight:bold; font-size:30px; text-transform:uppercase">Requisition Slip</p>
                        <p>Date Ordered: <b>{{ date('Y-m-d H:i:s') }}</b></p>
                        <p>Order #: <b>{{$order_id ?? ''}}</b></p>
                        <p>Name: <b>{{$username ?? ''}}</b></p>


                        <table id="slip-table">
                            @foreach($transaction as $transactions)
                            @if($transactions->order_id == $order_id ?? '')
                            <tr>
                                 <th>Quantity</th>
                                <th>Item/Requested</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                            </tr>
                                <div style="display: none">
                                     {{ $total = 0 }}
                                </div>
                                 @foreach($order as $orders)
                                 @if($transactions->order_id == $orders->order_id)
                                <tr>

                                    <td>{{ $orders->quantity }}</td>
                                    <td>{{ $orders->name }}</td>
                                    <td>{{ $orders->price }}</td>
                                    <td>{{ $orders->amount }}</td>
                                    <td style="display:none">{{ $total += $orders->amount }}</td>
                                </tr>
                                @endif                   
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><p style="margin:0;font-weight:bold;">Total: {{ $total }}</p></td>
                                </tr>
                                 
                            @endif
                            @endforeach
                        </table>
                       
                        
                        

                        <div class="custom-row">
                            <div class="custom-column">
                                <h6 class="pt-2"><b>Requested By:</b> Lorem Ipsum</h6>
                                <h6 class="pt-2"><b>Noted By:</b> Lorem Ipsum</h6>
                            </div>
                            <div class="custom-column">
                                <h6 class="pt-2"><b>Received by: </b>Lorem Ipsum</h6>
                                <center><h6 class="pt-5"><b>Signature/Date</h6></center>
                                <hr style="width:100%; border:1px solid #000; opacity:1; margin-top:5
                                0px;">
                            </div>
                            <center><a href="/download-pdf/{{$username ?? ''}}/{{$order_id ?? ''}}">Download Receipt</a></center>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>