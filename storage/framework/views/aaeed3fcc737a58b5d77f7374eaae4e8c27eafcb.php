<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Custom Authentication</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
				
				<h4>Registration</h4>
				<hr>
				<form action="<?php echo e(route('register-user')); ?>" method="post">
				    <?php if(Session::has('success')): ?>
				    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
				    <?php endif; ?>
				    <?php if(Session::has('fail')): ?>
				    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
				    <?php endif; ?>
				 	<?php echo csrf_field(); ?>
				 	<div class="form-group">
				 		<label for="name">Full Name</label>
				 		<input type="text" class="form-control" placeholder="Enter Fullname" name="name" value="<?php echo e(old('name')); ?>">
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
                    	<label for="email">Email</label>
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
				 	    <label for="password">Password</label>
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

				 	<div class="form-group">

				 		<button class="btn btn-block btn-primary" type="submit">Register</button>
				 	</div>
                        <br>
                        <a href="login">Already Register. Login here</a>
				 </form> 
			</div>
		</div>
	</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html><?php /**PATH /home/devcrewph/public_html/sac/resources/views/auth/registration.blade.php ENDPATH**/ ?>