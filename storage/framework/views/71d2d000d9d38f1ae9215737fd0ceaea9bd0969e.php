<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Inventory</title>

	<link href="<?php echo e(url('/dashboard-css/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/bootstrap-responsive.min.css')); ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/font-awesome.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/pages/dashboard.css')); ?>" rel="stylesheet">

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <span class="span12" style="margin-bottom: 35px;">
            <div class="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Inventory Module: </strong> This module allows you to add/view stocks.</div>
        </span>

        <br>

        <div class="span6">
          <h2><i class="icon-plus"></i> Add New Stock</h2>
          <hr>
          <form id="adduser" action="<?php echo e(route('add-stock')); ?>" method="post">
              <?php if(Session::has('success')): ?>
              <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
              <?php endif; ?>
              <?php if(Session::has('fail')): ?>
              <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
              <?php endif; ?>
             <?php echo csrf_field(); ?>
                       
              
             <div class="form-group">
               <label for="stock_name">Stock Name</label>
               <input required type="text" class="form-control" placeholder="Enter Stock" name="stock_name" value="<?php echo e(old('stock_name')); ?>">
                          <span class="text-danger"><?php $__errorArgs = ['stock_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
             </div>
  
             <div class="form-group">
               <label for="format">Stock Format</label>

               <select name="stock_format" id="">

                    <option value="pcs">pcs</option>
                    <option value="unit">unit</option>
                    <option value="ml">ml</option>
                    <option value="pages">pages</option>

               </select>
             </div>

             <div class="form-group">
               <label for="format">Stock Type</label>

               <select name="stock_type" id="">

                    <option value="Books">Books</option>
                    <option value="Papers">Papers</option>
                    <option value="Materials">Materials</option>
                    <option value="Tools">Tools</option>

               </select>
             </div>   
  
             <div class="form-group">
                        <label for="stock_description">Stock Description</label>
               <input required type="text" class="form-control" placeholder="Enter Description" name="stock_description" value="<?php echo e(old('stock_description')); ?>">
                          <span class="text-danger"><?php $__errorArgs = ['stock_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
             
             <div class="form-group">
                 <label for="stock_count">Stock Count</label>
                        <input required type="text" class="form-control" placeholder="Enter Quantity" name="stock_count" value="<?php echo e(old('stock_count')); ?>">
               <span class="text-danger"><?php $__errorArgs = ['stock_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>	
             </div>

             <div class="form-group">
                 <label for="stock_cost">Stock Cost</label>
                        <input required type="text" class="form-control" placeholder="Enter Cost" name="stock_cost" value="<?php echo e(old('stock_cost')); ?>">
               <span class="text-danger"><?php $__errorArgs = ['stock_cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>	
             </div>


  
             <div class="form-group">
  
               <button id="newus" class="btn btn-block btn-primary" type="submit">Add Stock</button>
             </div>
        </div> 
        <!-- /span6 -->

        <div class="span6">
          <h2><i class="icon-file"></i> Stocks</h2>
          <hr>
          <table id="invent_table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Stock Name </th>
                    <th> Type</th>
                    <th> Description </th>
                    <th> Format</th>
                    <th> Quantity</th>
                    <th> Price</th>
                    <th> Amount</th>
                  </tr>
                </thead>
                <tbody>
 
                  <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                  <tr>
                    <td><?php echo e($stock['stock_name']); ?> </td>
                    <td><?php echo e($stock['stock_type']); ?></td>
                    <td><?php echo e($stock['stock_description']); ?></td>
                    <td><?php echo e($stock['stock_format']); ?></td>
                    <td><?php echo e($stock['stock_count']); ?></td>
                    <td><?php echo e($stock['stock_cost']); ?></td>
                    <td><?php echo e($stock['stock_amount']); ?></td>
                  </tr>
                      
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tbody>
            </table>
        </div>
        <!-- /end span6 -->

      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /extra -->
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

</html><?php /**PATH /home/devcrewph/public_html/sac/resources/views/admin/inventory.blade.php ENDPATH**/ ?>