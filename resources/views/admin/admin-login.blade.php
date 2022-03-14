<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Transaction and Inventory System of St. Anthony's College</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{url('/login-css/css/login-style.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4" style="margin:0 auto;">
				<center><img id="logo" src="{{url('/img/logo.png')}}" width="150"></center>

				<div id="loginm">
				<h4>ADMIN</h4>
				<h6>login with your email and password to access your account.</h6>
				</div>

				<form action="{{route('login-user')}}" method="post">
				    @if(Session::has('success'))
				    <div class="alert alert-success"><center>{{Session::get('success')}}</center></div>
				    @endif
				    @if(Session::has('fail'))
				    <div class="alert alert-danger"><center>{{Session::get('fail')}}</center></div>
				    @endif				    
				    @csrf
				 	

				 	<div id="inputbox">
					 	<div class="form-group">
					 		<input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{old('email')}}">
	                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
	                	</div>
					 	
					 	<div class="form-group">
		                    <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{old('password')}}">
					 		<span class="text-danger">@error('password') {{$message}} @enderror</span>	
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
</html>