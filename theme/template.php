<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $title; ?></title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo WEB_ROOT; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo WEB_ROOT; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <!--- Page level plugin CSS-->
  <link href="<?php echo WEB_ROOT; ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo WEB_ROOT; ?>css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
 <?php require_once("nav.php") ; ?> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $title; ?></li>
      </ol>
      <div class="row">
        <div class="col-12">
              <?php   check_message();  ?>   
             <?php require_once $content; ?> 
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Mighty Mite Corporation</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Logout?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Sure najud?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo WEB_ROOT; ?>/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo WEB_ROOT; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo WEB_ROOT; ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo WEB_ROOT; ?>js/sb-admin.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo WEB_ROOT; ?>vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="<?php echo WEB_ROOT; ?>vendor/chart.js/Chart.min.js"></script>
     <!-- Custom scripts for this page-->
    <script src="<?php echo WEB_ROOT; ?>js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>js/sb-admin-charts.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>js/canvasjs.min.js"></script>

<script type="text/javascript">
  $(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
  if(confirm("Sure najud?"))
  {

  }
  else
  {
   return false; 
  }
 });
</script>

  </div>
</body>

</html>
