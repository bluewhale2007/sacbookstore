<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Division</title>

	<link href="<?php echo e(url('/dashboard-css/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/bootstrap-responsive.min.css')); ?>" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/font-awesome.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/pages/dashboard.css')); ?>" rel="stylesheet">

  <link rel="icon" type="image/jpg" href="<?php echo e(url('/img/logo.png')); ?>"/>
  <script src="jquery.twbsPagination.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  <script src="https://kit.fontawesome.com/5b6d778cbc.js" crossorigin="anonymous"></script>	
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  
  <style>
  body {
    font-family: "Poppins";
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

        <a class="brand" href="<?php echo e(url('/')); ?>">
          <img src="<?php echo e(url('/img/banner-logo.png')); ?>" width="300">
        </a>


      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Account<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
              <li><a href="/logout-division">Logout</a></li>
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

        <li class="<?php echo e(request()->is('division') ? 'active' : ''); ?>"><a href="transaction"><i class="icon-barcode"></i><span>Dashboard</span> </a></li>
  
       
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
        <span style="margin-bottom: 35px;">
            <div class="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Division Dashboard: </strong> The dashboard allows the department to request and view stocks.</div>
        </span>
        <br>
      </div>
      <!-- /row --> 

          <div class="row">
            <div class="col">
            <h2><i class="icon-plus"></i> Requisition Slip</h2>
            <hr>
            <span>Department: <?php echo Session::get('DivisionLoginRole');?></span>
            <input type="hidden" name="gtotal" id="hidedata" value='0'>
            <h3 style="text-align:right">Grand Total: <span id="grand_total">0.00</span></h3>
            <br>
              <form action="<?php echo e(route('stock-request')); ?>" method="post">
                <?php if(Session::has('success')): ?>
                  <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>
                <?php if(Session::has('fail')): ?>
                <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?>
              <?php echo csrf_field(); ?>
                  <table class="table" id="slip-table">
                  <thead>
                    <tr>
                      <th>Item name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
  
                  <tr>
                  <td>
                    
                    <select name="request_stock_name[]" id="stock_id" class="req ct">
                              <option value="">-- Choose Stock --</option>
                            <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stocks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($stocks->stock_name); ?>" data-price="<?php echo e($stocks->stock_cost); ?>">
                                <?php echo e($stocks->stock_name); ?>

                              </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </select>
                    </td>

                    <td> <input type="number" class="form-control qty" id="qty-1"  name="request_quantity[]" value="0" placeholder="Qty" required> </td>
                    <td> <input type="number" class="form-control unt" id="price" name="request_stock_price[]"  placeholder="0" readonly> </td>
                    <td><input type="text" class="form-control total" id="total"  placeholder="0" readonly></td>
                    <td>
                      <span class="btn btn-block btn-success" id="addInput">+</span>
                      <span class="btn btn-block btn-danger" id="minusInput">-</span>
                    </td>
                  </tr>
              
                  </tbody>
                </table>

                <hr>

                <!-- Button trigger modal -->
                <button id="newus" type="button"  class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Request Stock
                </button>

                <!-- Modal -->
                <div class="modal fade text-center" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">

                      <div class="modal-body" style="padding: 50px 100px; text-align:center;">
                        <h3>Please confirm your request</h3>
                        <br>
                        <button id="newus" style="background-color:#4BB543; width:200px; margin-bottom:10px;" class="btn btn-block btn-primary" type="submit">Order Now</button>
                        <button id="newus" type="button"  class="btn btn-block btn-danger text-center" data-dismiss="modal" style="width:200px">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>  
                <input type="hidden" id="inputcount" name="inputcount" value="1">
                </form> 
            
            </div>
          </div>  <!-- /row --> 

          <div class="row" style="margin-top:50px;">
            <div class="col">
            <h2><i class="fas fa-file-alt"></i>  Transaction Updates</h2>
        <hr>
           
            <table id="divisionTable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Order ID</th>
                    <th> Role </th>
                    <th> Stocks Ordered </th>
                    <th> Date</th>
                    <th> Status </th>

                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($transactions->department == Session::get('DivisionLoginRole')): ?>
                  <tr data-entry-id="<?php echo e($transactions->id); ?>">
                    <td><?php echo e($transactions->order_id ?? ''); ?></td>
                    <td><?php echo e($transactions->department ?? ''); ?></td>
                    <td>
                    <div style="display: none">
                      <?php echo e($total = 0); ?>

                    </div>
                      <ol>
                        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($transactions->order_id == $orders->order_id): ?>
                              <li><?php echo e($orders->name); ?> (&#8369;<?php echo e($orders->price); ?> x <?php echo e($orders->quantity); ?>) = &#8369;<?php echo e($orders->amount); ?></li>
                              <li style="display:none"><?php echo e($total += $orders->amount); ?></li>
                          <?php endif; ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ol>                      
                      <p style="text-align:center;font-weight:bold;">Total: &#8369;<?php echo e($total); ?></p>

                    </td>

                      <td><?php echo e($transactions->created_at ?? ''); ?></td>
                      
                    <td>
                    <?php if($transactions->status == 'PENDING'): ?>
                        <p style="background-color:orange; color:#FFF; border-radius:10px; padding:5px; text-align:center;"><?php echo e($transactions->status ?? ''); ?></p>
                        <?php elseif($transactions->status == 'ACCEPTED'): ?>
                        <p style="background-color:green; color:#FFF; border-radius:10px; padding:5px; text-align:center;"><?php echo e($transactions->status ?? ''); ?></p>
                         <?php elseif($transactions->status == 'SUCCESSFUL'): ?>
                        <p style="background-color:green; color:#FFF; border-radius:10px; padding:5px; text-align:center;"><?php echo e($transactions->status ?? ''); ?></p>
                        <?php else: ?>
                        <p style="background-color:red; color:#FFF; border-radius:10px; padding:5px; text-align:center;"><?php echo e($transactions->status ?? ''); ?></p>
                    <?php endif; ?>
                    </td>

                  </tr>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tbody>
              </table>
            </div>
          </div>

    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /extra -->

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">

 
// $('.req').on('change', function(){
//     var price = $(this).children('option:selected').data('price');
//     $(this).parent().next().children(".unt").val(price);
// });

$('body').on('change','.req',function(){
   $(this).parent().parent().find('#price').val($(this).find(':selected').data('price'));
   $(this).parent().parent().find('.qty').val('0');
   $(this).parent().parent().find('#total').val('0'); 

        var sum = 0;

        $('.total').each(function(){
            sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
        });

        $("#grand_total").html(sum);

 });
</script>

<script type="text/javascript">

      $('body').on('change', '.qty', function(){

        var price = parseFloat($(this).parent().parent().find('#price').val()) || 0;
        var qty = parseFloat($(this).parent().parent().find('.qty').val()) || 0;
        $(this).parent().parent().find('#total').val(price * qty); 

        var sum = 0;

        $('.total').each(function(){
            sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
        });

        $("#grand_total").html(sum);
        
      });




</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#addInput").click(add);
  $("#minusInput").click(remove);


  function add(){
    var checkinput = parseInt($('#inputcount').val()) + 1;
    // var input = '<div id="inputform-'+checkinput+'" class="form-row"><hr><div class="col-md-1 mb-1"><input type="text" class="form-control qty" id="qty-'+checkinput+'" name="request_quantity[]" value="<?php echo e(old('request_quantity')); ?>" placeholder="Qty" required></div><div class="col-md-1 mb-1"><input type="text" class="form-control req" id="req-'+checkinput+'" name="request_stock_name[]" value="<?php echo e(old('request_stock_name')); ?>" placeholder="Requestor" required></div><div class="col-md-1 mb-1"><input type="text" class="form-control unt" id="unt-'+checkinput+'" name="request_stock_price[]" value="<?php echo e(old('request_stock_price')); ?>" placeholder="Unit Price" required></div></div>';
    var input = '<div id="inputform-'+checkinput+'" class="form-row"><hr><div class="col-md-1 mb-1"><input type="number" class="form-control qty" id="qty-'+checkinput+'" name="request_quantity[]" value="1" placeholder="Qty" required></div> <div class="col-md-1 mb-1" ><select name="request_stock_name[]" id="stock_id" class="req chk"> <option value="">-- Choose Stock --</option> <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stocks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($stocks->stock_name); ?>" data-price="<?php echo e($stocks->stock_cost); ?>"><?php echo e($stocks->stock_name); ?> Price: <?php echo e($stocks->stock_cost); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select></div><div class="col-md-1 mb-1"><input type="text" class="form-control unt" id="price" name="request_stock_price[]" value="<?php echo e(old('request_stock_price')); ?>" placeholder="0" readonly></div></div></div>';
    var input2 = '<tr id="inputform-'+checkinput+'"><td> <select name="request_stock_name[]" id="stock_id'+checkinput+'" class="req ct'+checkinput+'"><option value="">-- Choose Stock --</option> <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stocks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($stocks->stock_name); ?>" data-price="<?php echo e($stocks->stock_cost); ?>"> <?php echo e($stocks->stock_name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td> <input type="number" class="form-control qty" id="qty-1" name="request_quantity[]" value="0" placeholder="Qty" required></td><td> <input type="number" class="form-control unt" id="price" name="request_stock_price[]" value="<?php echo e(old('request_stock_price')); ?>" placeholder="0" readonly></td><td ><input type="text" class="form-control total" id="total" placeholder="0" readonly></td></tr>';
    $('#slip-table').append(input2);
    $('#inputcount').val(checkinput);
  }

  function remove(){
    var checkinputlast = $('#inputcount').val();


    if (checkinputlast > 1) {
      $('#inputform-' + checkinputlast).remove();
      $('#inputcount').val(checkinputlast - 1);
    }


    var sum = 0;

        $('.total').each(function(){
            sum += parseFloat($(this).val());  // Or this.innerHTML, this.innerText
        });

        $("#grand_total").html(sum);

  }

});
</script>

<script type="text/javascript">
        var route = "<?php echo e(url('autocomplete-search')); ?>";

        $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(route, { query: query }, function (data) {
                return process(data);
            });
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
</html><?php /**PATH /home/devcrewph/public_html/sac/resources/views/division/index.blade.php ENDPATH**/ ?>