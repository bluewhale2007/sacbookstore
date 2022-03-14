<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2021 Copyright © 2021. All rights reserved. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 

<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo e(url('/dashboard-css/js/jquery-1.7.2.min.js')); ?>"></script> 
<script src="<?php echo e(url('/dashboard-css/js/excanvas.min.js')); ?>"></script> 
<script src="<?php echo e(url('/dashboard-css/js/chart.min.js')); ?>" type="text/javascript"></script> 
<script src="<?php echo e(url('/dashboard-css/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard-css/js/bt.js')); ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo e(url('/dashboard-css/js/full-calendar/fullcalendar.min.js')); ?>"></script>
 
<script src="<?php echo e(url('/dashboard-css/js/base.js')); ?>"></script> 


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



<script type="text/javascript">
  $(document).ready(function (){

    $('#usertable').DataTable({
      'pageLength' : 5,
      "lengthMenu": [ 1, 2, 3, 4, 5 ]
    });

    $('#divisionTable').DataTable({
      'pageLength' : 5,
      "lengthMenu": [ 1, 2, 3, 4, 5 ]
    });

    $('#guestTable').DataTable({
      'pageLength' : 5,
      "lengthMenu": [ 1, 2, 3, 4, 5 ]
    });

    $('#table_id').DataTable({
      "bLengthChange": false,
      "paging":   false,
      "info":     false,
      "searching": false
    });

    $('#inventory_table').DataTable({
      "bLengthChange": false,
      "paging":   false,
      "info":     false,
      "searching": false
    });

    $('#invent_table').DataTable({
      'pageLength' : 5,
      "lengthMenu": [ 5, 10, 20 ]
    });

  });
</script>
<?php /**PATH /home/devcrewph/public_html/sac/resources/views/footer.blade.php ENDPATH**/ ?>