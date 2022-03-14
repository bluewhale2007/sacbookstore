<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>User Management</title>

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
              <strong>User Management Module: </strong> This module allows you to review existing users and add new users for guest or division/unit.</div>
        </span>

        <br>

        <div class="span6">
          <h2><i class="icon-plus"></i> Add New User</h2>
          <hr>
          <form id="adduser" action="<?php echo e(route('multi-user')); ?>" method="post">
              <?php if(Session::has('success')): ?>
              <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
              <?php endif; ?>
              <?php if(Session::has('fail')): ?>
              <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
              <?php endif; ?>
             <?php echo csrf_field(); ?>
             
             <div class="form-group">
               <label for="role"> Account Role</label>

               <select name="sub_role" id="">

                 <optgroup label="Guest">
                   <?php $__currentLoopData = $guest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guests): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($guests->sub_role); ?>"><?php echo e($guests->sub_role); ?></option>                     
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                 </optgroup>

             
                 <optgroup label="Division/Units">
                   <?php $__currentLoopData = $division; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divisions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value=""><?php echo e($divisions->sub_role); ?></option>                     
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                 </optgroup> 
               </select>
             </div>
              
             <div class="form-group">
               <label for="name">Full Name</label>
               <input required type="text" class="form-control" placeholder="Enter Fullname" name="name" value="<?php echo e(old('name')); ?>">
                          <span class="text-danger"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
             </div>
  
             <div class="form-group">
                        <label for="email">Email Address</label>
               <input required type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo e(old('email')); ?>">
                          <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
             
             <div class="form-group">
                 <label for="password">Password</label>
                        <input required type="password" class="form-control" placeholder="Enter Password" name="password" value="<?php echo e(old('password')); ?>">
               <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>	
             </div>
  
             <div class="form-group">
  
               <button id="newus" class="btn btn-block btn-primary" type="submit">Register New User</button>
             </div>
        </div>
        <!-- /span6 --> 

        <div class="span6">
          <div class="span searchuser">
            <input type="text" name="search" placeholder="Search User">
          </div>

          <div class="widget widget-table action-table">
            <div class="widget-header"><i class="icon-user"></i>
              <h3>Registered Users</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table id="usertable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Account Name </th>
                    <th> Account Role</th>
                    <th> Account Email</th>
                    <th> Actions</th>
                  </tr>
                </thead>
                <tbody>
 
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                  <tr>
                    <td><?php echo e($user['name']); ?> </td>
                    <td><?php echo e($user['sub_role']); ?></td>
                    <td><?php echo e($user['email']); ?></td>
                    <td><a href="#"><i class="icon-pencil"></i></a><a href="#exampleModal" data-toggle="modal"><i class="icon-trash"></i></a></td>
                  </tr>
                      
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

</html><?php /**PATH /home/devcrewph/public_html/sac/resources/views/user-management.blade.php ENDPATH**/ ?>