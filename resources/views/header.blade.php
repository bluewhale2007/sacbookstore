  <link rel="shortcut icon" type="image/jpg" href="{{url('/img/logo.png')}}"/>
  <script src="jquery.twbsPagination.min.js"></script>
   <script src="https://kit.fontawesome.com/5b6d778cbc.js" crossorigin="anonymous"></script>	
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <style>
  body {
    font-family: "Poppins";
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

        <a class="brand"  href="{{ url('/') }}">
          <img src="{{url('/img/banner-logo.png')}}" width="300">
        </a>


      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Account<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
              <li><a href="logout">Logout</a></li>
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

        <li class="{{request()->is('dashboard') ? 'active' : ''}}"><a href="dashboard"><i class="icon-list-alt"></i><span>Dashboard</span> </a> </li>
        <li class="{{request()->is('inventory') ? 'active' : ''}}"><a href="inventory"><i class="icon-tags"></i><span>Inventory</span> </a> </li>
        <li class="{{request()->is('transaction') ? 'active' : ''}}"><a href="transaction"><i class="icon-barcode"></i><span>Transactions</span> </a></li>
        <li class="{{request()->is('supplier') ? 'active' : ''}}"><a href="supplier"><i class="icon-truck"></i><span>Supplier</span> </a> </li>
        <li class="{{request()->is('report') ? 'active' : ''}}"><a href="report"><i class="icon-table"></i><span>Reports</span> </a></li>
        <li class="{{request()->is('user-management') ? 'active' : ''}}"><a href="user-management"><i class="icon-group"></i><span>User Management</span> </a> </li>

        <!--<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>-->

      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>