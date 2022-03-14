<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Management</title>

  <link href="{{url('/dashboard-css/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('/dashboard-css/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
  <link href="{{url('/dashboard-css/css/font-awesome.css')}}" rel="stylesheet">
  <link href="{{url('/dashboard-css/css/style.css')}}" rel="stylesheet">
  <link href="{{url('/dashboard-css/css/pages/dashboard.css')}}" rel="stylesheet">

@include('header')

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
          <form id="adduser" action="{{route('multi-user')}}" method="post">
              @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
              @endif
              @if(Session::has('fail'))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif
             @csrf
             
             <div class="form-group">
               <label for="role"> Account Role</label>

               <select name="sub_role" id="">

                 <optgroup label="Guest">
                   @foreach ($guest as $guests)
                       <option value="{{$guests->sub_role}}">{{$guests->sub_role}}</option>                     
                   @endforeach  
                 </optgroup>

             
                 <optgroup label="Division/Units">
                   @foreach ($division as $divisions)
                       <option value="{{$divisions->sub_role}}">{{$divisions->sub_role}}</option>                     
                   @endforeach   
                 </optgroup> 
               </select>
             </div>
              
             <div class="form-group">
               <label for="name">Full Name</label>
               <input required type="text" class="form-control" placeholder="Enter Fullname" name="name" value="{{old('name')}}">
                          <span class="text-danger">@error('name') {{$message}} @enderror</span> 
             </div>
  
             <div class="form-group">
                        <label for="email">Email Address</label>
               <input required type="text" class="form-control" placeholder="Enter Email" name="email" value="{{old('email')}}">
                          <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
             
             <div class="form-group">
                 <label for="password">Password</label>
                        <input required type="password" class="form-control" placeholder="Enter Password" name="password" value="{{old('password')}}">
               <span class="text-danger">@error('password') {{$message}} @enderror</span> 
             </div>
  
             <div class="form-group">
  
               <button id="newus" class="btn btn-block btn-primary" type="submit">Register New User</button>
             </div>
        </div>
        <!-- /span6 --> 

        <div class="span6">
          <h2><i class="icon-search"></i> Registered Users</h2>
          <hr>
          <table id="usertable" class="stripe">
              <thead>
                  <tr>
                    <th> Account Name </th>
                    <th> Account Role</th>
                    <th> Account Email</th>
                    <th> Actions</th>
                  </tr>
              </thead>
              <tbody>
                   @foreach ($users as $user)
                       
                  <tr>
                    <td>{{$user['name']}} </td>
                    <td>{{$user['sub_role']}}</td>
                    <td>{{$user['email']}}</td>
                    <td><a href="#"><i href="#Edit" data-toggle="modal" class="icon-pencil"></i></a><a href="#Delete" data-toggle="modal"><i class="icon-trash"></i></a></td>
                  </tr>
                      
                   @endforeach
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
@include('footer')
</body>
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