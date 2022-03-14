<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Transaction</title>

	<link href="{{url('/dashboard-css/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('/dashboard-css/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
	<link href="{{url('/dashboard-css/css/font-awesome.css')}}" rel="stylesheet">
	<link href="{{url('/dashboard-css/css/style.css')}}" rel="stylesheet">
	<link href="{{url('/dashboard-css/css/pages/dashboard.css')}}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5b6d778cbc.js" crossorigin="anonymous"></script>	

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
  </style>

@include('header')

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <span class="span12" style="margin-bottom: 35px;">
            <div class="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Transaction Module: </strong> The dashboard allows the Admin to view approved transactions.
            </div>
        </span>
        <br>
        <div class="span12">

          <table id="guestTable" class="stripe" style="text-align:center;">
              <thead>
                  <tr>
                    <th> Order ID</th>
                    <th> Department </th>
                    <th> Stocks Ordered </th>
                    <th> Date </th>
                    <th> Status </th>
                    <th> Action</th>
                    <!-- <th class="td-actions"></th> -->
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
                      <ol style="list-style-type:none">
                        @foreach($order as $orders)
                          @if($transactions->order_id == $orders->order_id)
                              <li>{{ $orders->name }} (&#8369;{{ $orders->price }} x {{ $orders->quantity}}) = &#8369;{{ $orders->amount}}</li>
                              <li style="display:none">{{ $total += $orders->amount }}</li>
                          @endif
                            
                        @endforeach
                      </ol>                      
                      <p style="text-align:center;font-weight:bold;">Total: &#8369;{{ $total }}</p>

                    </td>
                    <td>{{ $transactions->created_at ?? ''}}</td>
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
                    <td class="td-actions">
                      @if($transactions->status == 'ACCEPTED')
                          <a  href={{"admin-success/" .$transactions['id']}}><i class="fas fa-check action-icon check"></i></a>       
                          <a  href={{"admin-decline/" .$transactions['id']}}><i class="fas fa-times action-icon times"></i></a>

       
                          @else
                          <a style="display:none;" href={{"admin-success/" .$transactions['id']}}><i class="fas fa-check action-icon check"></i></a>       
                          <a style="display:none;" href={{"admin-decline/" .$transactions['id']}}><i class="fas fa-times action-icon times"></i></a>

                      @endif
                    </td>               
                       
                  </tr>
                  @endif
                  @endforeach
                
                </tbody>
                <caption class="well">Division Transaction Updates</caption>
          </table>  
        </div>
        <div class="span12" style="margin-top:50px;">
        <table id="divisionTable" class="stripe" style="text-align:center;">
              <thead>
                  <tr>
                    <th> Order ID</th>
                    <th> Name</th>
                    <th> Department </th>
                    <th> Stocks Ordered </th>
                    <th> Date </th>
                    <th> Status </th>
                    <th> Action</th>
                  </tr>
              </thead>
                              <tbody>
                  @foreach($transaction as $transactions)
                  @if($transactions->department == 'GUEST' )
                  <tr data-entry-id="{{ $transactions->id}}">
                    <td>{{ $transactions->order_id ?? ''}}</td>
                    <td>{{ $transactions->name ?? ''}}</td>
                    <td>{{ $transactions->department ?? ''}}</td>
                    <td>
                    <div style="display: none">
                      {{ $total = 0 }}
                    </div>
                      <ol style="list-style-type:none">
                        @foreach($order as $orders)
                          @if($transactions->order_id == $orders->order_id)
                              <li>{{ $orders->name }} (&#8369;{{ $orders->price }} x {{ $orders->quantity}}) = &#8369;{{ $orders->amount}}</li>
                              <li style="display:none">{{ $total += $orders->amount }}</li>
                          @endif
                            
                        @endforeach
                      </ol>                      
                      <p style="text-align:center;font-weight:bold;">Total: &#8369;{{ $total }}</p>

                    </td>
                    <td>{{ $transactions->created_at ?? ''}}</td>
                    <td>
                    @if($transactions->status == 'PENDING')
                        <p style="background-color:orange; color:#FFF; border-radius:10px; padding:5px; text-align:center;">{{$transactions->status ?? ''}}</p>
                        @elseif($transactions->status == 'SUCCESSFUL')
                        <p style="background-color:green; color:#FFF; border-radius:10px; padding:5px; text-align:center;">{{$transactions->status ?? ''}}</p>
                        @else
                        <p style="background-color:red; color:#FFF; border-radius:10px; padding:5px; text-align:center;">{{$transactions->status ?? ''}}</p>
                    @endif
                    </td>
                     <td class="td-actions">
                      @if($transactions->status == 'PENDING')
                          <a  href={{"admin-success/" .$transactions['id']}}><i class="fas fa-check action-icon check"></i></a>       
                          <a  href={{"admin-decline/" .$transactions['id']}}><i class="fas fa-times action-icon times"></i></a>

                          @else
                          <a style="display:none;" href={{"admin-success/" .$transactions['id']}}><i class="fas fa-check action-icon check"></i></a>       
                          <a style="display:none;" href={{"admin-decline/" .$transactions['id']}}><i class="fas fa-times action-icon times"></i></a>

                      @endif
                    </td>
            
                  </tr>
                  @endif
                  @endforeach
                  <caption class="well">Guest Transaction Updates</caption>
                </tbody>
          </table>      
        </div>
            <!-- /widget-content --> 
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</html>