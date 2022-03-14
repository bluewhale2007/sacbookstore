<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Report</title>

	<link href="<?php echo e(url('/dashboard-css/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/bootstrap-responsive.min.css')); ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/font-awesome.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('/dashboard-css/css/pages/dashboard.css')); ?>" rel="stylesheet">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <span class="span12" style="margin-bottom: 35px;">
            <div class="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Report Module: </strong> This module allows you to view reports.</div>
              <h1>Total Transaction: <?php echo e($transactionCount); ?></h1>
              <h1>Sucessful Transaction: <?php echo e($successfulCount); ?></h1>
              <h1>Pending Transaction: <?php echo e($pendingCount); ?></h1>
              <h1>Declined Transaction: <?php echo e($declinedCount); ?></h1>
        </span>

        <br>

        <div class="span6">
          <canvas id="transaction" width="400" height="400"></canvas>
          <script>
            var ctx = document.getElementById('transaction').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                      datasets: [{
                          label: '# of Transactions',
                          data: [12, 19, 3, 5, 2, 3],
                          backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
          </script>
        </div>


        <div class="span6">
          <canvas id="inventory" width="400" height="400"></canvas>
          <script>
            var ctx = document.getElementById('inventory').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'radar',
                data: {
                      labels: ['Red', 'Blue', 'Yellow'],
                      datasets: [{
                          label: '# of Votes',
                          data: [12, 19, 3],
                          backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)'
                          ],
                          borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)'
                          ],
                          borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
          </script>
        </div>


      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /extra -->
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
</body>
</html><?php /**PATH /home/devcrewph/public_html/sac/resources/views/admin/report.blade.php ENDPATH**/ ?>