<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Transaction and Inventory System of St. Anthony's College</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/5b6d778cbc.js" crossorigin="anonymous"></script>
     <link rel="shortcut icon" type="image/jpg" href="<?php echo e(url('/img/logo.png')); ?>"/>	
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/login-css/css/login-style.css')); ?>">

    <style>
          
            /* Create three equal columns that floats next to each other */
            .column {
            float: left;
            width: 25%;
            padding: 80px 0;
             
            }

            /* Clear floats after the columns */
            .row:after {
            content: "";
            display: table;
            clear: both;
            }

            .roles{
                text-align:center;
                text-transform:uppercase;
                font-weight:bold;
            }


            .role-icon{
                font-size:80px;
                color:#212529;
            }

            .role-background:hover {
                background-color:#841f1a;
                transition: .5s;
                cursor:pointer;
            }

            .role-background:hover .roles {
                color:#fff;
                transition: .5s;
                cursor:pointer;
            }

            .role-background:hover .role-icon{
                color:#fff;
                transition: .5s;
                cursor:pointer;
            }


    </style>

</head>
<body>
	<div class="container">
		<div class="row">
			<div  style="margin:0 auto;">
				<center><img id="logo" src="<?php echo e(url('/img/logo.png')); ?>" width="150"></center>


    <div class="row">
         <?php if(Session::has('fail')): ?>
		  <div class="alert alert-danger"><center><?php echo e(Session::get('fail')); ?></center></div>
		 <?php endif; ?>
         <div class="column role-background">
              <center><a href="/admin-login"><h2 class="role-icon"><i class="fas fa-user-lock role-icon"></i></h2></a></center>
              <p class="roles">Admin</p>
         </div>


         <div class="column role-background">
         <center><a href="/finance-login"><h2 class="role-icon"><i class="fas fa-file-invoice role-icon"></i></h2></a></center>
                <p class="roles">Finance</p>
        </div>

          <div class="column role-background">
          <center><a href="/login"><h2 class="role-icon"><i class="fas fa-users role-icon"></i></h2></a></center>
                <p class="roles">Department</p>
        </div>

        <div class="column role-background">
          <center><a href="/guest"><h2 class="role-icon"><i class="fas fa-user role-icon"></i></h2></a></center>
                <p class="roles">Guest</p>
        </div>
    </div>
                


				 <div id="copyright"><p>Copyright © 2021. All rights reserved.</p></div>

			</div>
		</div>
	</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html><?php /**PATH /home/devcrewph/public_html/sac/resources/views/index.blade.php ENDPATH**/ ?>