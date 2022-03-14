<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>

	<link href="<?php echo e(url('/dashboard-css/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/bootstrap-responsive.min.css')); ?>" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
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
              <strong>Admin Dashboard: </strong> The dashboard allows the admin to review and assess the overall status of the different modules of the system.</div>
        </span>
        <br>
        <div class="span12" style="margin-bottom: 20px;">
          Server Time: <?php echo e(date('Y-m-d H:i:s')); ?>

          <br>
        </div>
        <div class="span6">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Inventory Module Updates</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Item Name </th>
                    <th> Item Type </th>
                    <th> Date Added</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> The Subtle Art of not Giving a F*ck </td>
                    <td> Books </td>
                    <td> November 12, 2020 </td>
                  </tr>
                  <tr>
                    <td> Teachers table </td>
                    <td> Equipments </td>
                    <td> June 5, 2020 </td>
                  </tr>
                  <tr>
                    <td> A4 white bond paper </td>
                    <td> Materials </td>
                    <td> September 8, 2020 </td>
                  </tr>
                  <tr>
                    <td> The Art of War </td>
                    <td> Books </td>
                    <td> October 25, 2021 </td>
                  </tr>
                  <tr>
                    <td> Kamasutra Childrens Edition </td>
                    <td> Books </td>
                    <td> February 13, 2021 </td>
                  </tr>
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        <div class="span6">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Transaction Module Updates</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table id="trans-t" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Subject </th>
                    <th> Status </th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> Book Request </td>
                    <td> Pending </td>
                    <td class="td-actions"><button type="submit" class="btn btn-primary">View</button></td>
                  </tr>
                  <tr>
                    <td> Equipment Request </td>
                    <td> Pending </td>
                    <td class="td-actions"><button type="submit" class="btn btn-primary">View</button></td>
                  </tr>
                  <tr>
                    <td> Book Request </td>
                    <td> Pending </td>
                    <td class="td-actions"><button type="submit" class="btn btn-primary">View</button></td>
                  </tr>
                  <tr>
                    <td> Material Request </td>
                    <td> Approved </td>
                    <td class="td-actions"><button type="submit" class="btn btn-primary">View</button></td>
                  </tr>
                  <tr>
                    <td> Book Request </td>
                    <td> Approved </td>
                    <td class="td-actions"><button type="submit" class="btn btn-primary">View</button></td>
                  </tr>
                
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

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html><?php /**PATH /home/devcrewph/public_html/sac/resources/views/dashboard.blade.php ENDPATH**/ ?>