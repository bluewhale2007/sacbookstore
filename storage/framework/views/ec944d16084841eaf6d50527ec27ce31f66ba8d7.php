<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Transaction and Inventory System of St. Anthony's College</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('/login-css/css/login-style.css')); ?>">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4" style="margin:0 auto;">
				<center><img id="logo" src="<?php echo e(url('/img/logo.png')); ?>" width="150"></center>

				<div id="loginm">
				<h4>Hello, Finance Officer</h4>
				<h6>login with your email and password to access your account.</h6>
				</div>

				<form action="<?php echo e(route('login-finance')); ?>" method="post">
				    <?php if(Session::has('success')): ?>
				    <div class="alert alert-success"><center><?php echo e(Session::get('success')); ?></center></div>
				    <?php endif; ?>
				    <?php if(Session::has('fail')): ?>
				    <div class="alert alert-danger"><center><?php echo e(Session::get('fail')); ?></center></div>
				    <?php endif; ?>				    
				    <?php echo csrf_field(); ?>
				 	

				 	<div id="inputbox">
					 	<div class="form-group">
					 		<input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo e(old('email')); ?>">
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
		                    <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?php echo e(old('password')); ?>">
					 		<span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>	
					 	</div>
				 	</div>

				 	<div id="loginb" class="form-group">
				 		<center><button class="btn btn-block btn-primary" type="submit">Login</button></center>
				 	</div>
				 </form> 


				 <div id="copyright"><p>Copyright © 2021. All rights reserved.</p></div>

			</div>
		</div>
	</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html><?php /**PATH /home/devcrewph/public_html/sac/resources/views/auth/finance-login.blade.php ENDPATH**/ ?>