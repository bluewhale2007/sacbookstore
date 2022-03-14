<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Finance</title>

	<link href="{{url('/dashboard-css/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('/dashboard-css/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
	<link href="{{url('/dashboard-css/css/font-awesome.css')}}" rel="stylesheet">
	<link href="{{url('/dashboard-css/css/style.css')}}" rel="stylesheet">
	<link href="{{url('/dashboard-css/css/pages/dashboard.css')}}" rel="stylesheet">

  <link rel="shortcut icon" type="image/jpg" href="{{url('/img/logo.png')}}"/>
  <script src="jquery.twbsPagination.min.js"></script>
  <script src="https://kit.fontawesome.com/5b6d778cbc.js" crossorigin="anonymous"></script>	
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
  body {
    font-family: "Poppins";
  }

  .action-icon{
    font-size: 25px;
    margin-right: 5px;
    margin-left: 5px;
  }
  i.fas.fa-check.action-icon.check{
    color:green;
  }

  i.fas.fa-times.action-icon.times{
    color:red;
  }

    p, h1,h2,h3,h4,h5,h6 {
    font-family: 'Poppins';
}
  </style>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">

      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> </a>

        <a class="brand" href="dashboard">
          <img src="{{url('/img/banner-logo.png')}}" width="300">
        </a>


      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Account<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
              <li><a href="logout-finance">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->

<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">

        <li class="{{request()->is('finance') ? 'active' : ''}}"><a href="finance"><i class="icon-barcode"></i><span>Dashboard</span> </a></li>
        <!-- <li class="{{request()->is('inventory') ? 'active' : ''}}"><a href="inventory"><i class="icon-tags"></i><span>Inventory</span> </a> </li> -->
       
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>



<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <span class="span12" style="margin-bottom: 35px;">
            <div class="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Fiannce Dashboard: </strong> The dashboard allows the Finance to view/approve transactions.
            </div>
        </span>
        <br>

        <div class="span12">
        <h2><i class="fas fa-file-alt"></i>  Department Transactions</h2>
        <hr>

        <table id="divisionTable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Order ID</th>
                    <th> Department </th>
                    <th> Stocks Ordered </th>
                    <th> Status </th>
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach($transaction as $transactions)
                  @if($transactions->department != 'GUEST')
                  <tr data-entry-id="{{ $transactions->id}}">
                    <td>{{ $transactions->order_id ?? ''}}</td>
                    <td>{{ $transactions->department ?? ''}}</td>
                    <td>
                    <div style="display: none">
                      {{ $total = 0 }}
                    </div>
                      <ol>
                        @foreach($order as $orders)
                          @if($transactions->order_id == $orders->order_id)
                              <li>{{ $orders->name }} (&#8369;{{ $orders->price }} x {{ $orders->quantity}}) = &#8369;{{ $orders->amount}}</li>
                              <li style="display:none">{{ $total += $orders->amount }}</li>
                          @endif
                            
                        @endforeach
                      </ol>                      
                      <p style="text-align:center;font-weight:bold;">Total: &#8369;{{ $total }}</p>

                    </td>

                    <td>
                    @if($transactions->status == 'PENDING')
                        <p style="background-color:orange; color:#FFF; border-radius:10px; padding:5px; text-align:center;">{{$transactions->status ?? ''}}</p>
                        @elseif($transactions->status == 'ACCEPTED')
                        <p style="background-color:green; color:#FFF; border-radius:10px; padding:5px; text-align:center;">{{$transactions->status ?? ''}}</p>
                          @elseif($transactions->status == 'SUCCESSFUL')
                        <p style="background-color:green; color:#FFF; border-radius:10px; padding:5px; text-align:center;">{{$transactions->status ?? ''}}</p>
                        @else
                        <p style="background-color:red; color:#FFF; border-radius:10px; padding:5px; text-align:center;">{{$transactions->status ?? ''}}</p>
                    @endif
                    </td>
                    <td class="td-actions" style="text-align:center;">
                      @if($transactions->status == 'PENDING')
                          <a  href={{"accept/" .$transactions['id']}}><i class="fas fa-check action-icon check"></i></a>       
                          <a  href={{"decline/" .$transactions['id']}}><i class="fas fa-times action-icon times"></i></a>

                          @else
                          <a style="display:none;" href={{"accept/" .$transactions['id']}}><i class="fas fa-check action-icon check"></i></a>       
                          <a style="display:none;" href={{"decline/" .$transactions['id']}}><i class="fas fa-times action-icon times"></i></a>

                      @endif
                    </td>
            
                  </tr>
                  @endif
                  @endforeach
                
                </tbody>
              </table>
                 

        </div>

        
        </div>

        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /extra -->

@include('footer')

<script type="text/javascript">
$(document).ready(function(){
  $("#addInput").click(add);
  $("#minusInput").click(remove);


  function add(){
    var checkinput = parseInt($('#inputcount').val()) + 1;
    var input = '<div id="inputform-'+checkinput+'" class="form-row"><hr><div class="col-md-1 mb-1"><input type="text" class="form-control qty" id="qty-'+checkinput+'" name="request_quantity[]" value="{{old('request_quantity')}}" placeholder="Qty" required></div><div class="col-md-1 mb-1"><input type="text" class="form-control req" id="req-'+checkinput+'" name="request_stock_name[]" value="{{old('request_stock_name')}}" placeholder="Requestor" required></div><div class="col-md-1 mb-1"><input type="text" class="form-control unt" id="unt-'+checkinput+'" name="request_stock_price[]" value="{{old('request_stock_price')}}" placeholder="Unit Price" required></div></div>';
    $('#additional').append(input);
    $('#inputcount').val(checkinput);
  }

  function remove(){
    var checkinputlast = $('#inputcount').val();


    if (checkinputlast > 1) {
      $('#inputform-' + checkinputlast).remove();
      $('#inputcount').val(checkinputlast - 1);
    }

  }



});
</script>

<style type="text/css">
  #addInput, #minusInput{
    font-size: 14px;
    border-radius: 0px;
    box-shadow: none;
    
  }

  #addInput{
    margin-left:10px;
    background-color: #4BB543;
  }

  #minusInput{ 
    background-color: #c70000;
  }

  #addInput:hover{
    cursor: pointer;
    background-color: #4BB543;
    box-shadow: none;
    background-position: 0;
  }

  #minusInput:hover{
    cursor: pointer;
    background-color: #c70000;
    box-shadow: none;
    background-position: 0;
  }




  .form-row .qty{
    width: 70px;
    float: left;
    margin-left: 5px; 
    border: none;
    border-radius: 0px;
    box-shadow: none;
    border-bottom: 1px solid black;
  }
  .form-row .req{
    width: 250px;
    float: left;
    margin-left: 5px;
    border: none;
    border-radius: 0px;
    box-shadow: none;
    border-bottom: 1px solid black;
  }
  .form-row .unt{
    width: 70px;
    float: left;
    margin-left: 5px;
    border: none;
    border-radius: 0px;
    box-shadow: none;
    border-bottom: 1px solid black;
  }
  .form-row .amt{
    width: 70px;
    float: left;
    margin-left: 5px;
  }
  #additional, .form-row{
    clear: left;
  }
</style>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>