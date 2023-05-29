<?php
require_once("include/initialize.php");
 if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }
     ?>
<div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Dashboard for <?php echo $_SESSION['EMPPOSITION'];?></h1>
          </div>
          <!-- /.col-lg-12 -->
      
       </div>
  <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">
              	<?php 
                if ($_SESSION['EMPPOSITION'] == 'Administrator') {
              		$Leave = New Leave();
                  $totalReports = Leave::countReports();
                  echo  $totalReports;
                }else if ($_SESSION['EMPPOSITION'] == 'Sales Staff' || $_SESSION['EMPPOSITION'] == 'Normal user') {
                  $Leave = New Leave();
                  $totalReports = Leave::countReportStaffCust();
                  echo  $totalReports;
                }
              	?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT; ?>module/leave/">
              <span class="float-left">Reports</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">
              	<?php 
                if ($_SESSION['EMPPOSITION'] == 'Administrator') {
              		$Order = New Order();
                  $totalOrders = Order::countOrdersApproved();
                  echo  $totalOrders;
                }else if ($_SESSION['EMPPOSITION'] == 'Sales Staff' || $_SESSION['EMPPOSITION'] == 'Normal user') {
                  $Order = New Order();
                  $totalOrders = Order::countOrdersApprovedStaffCust();
                  echo  $totalOrders;
                }
              	?>
             </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT; ?>module/order/">
              <span class="float-left">Sales Report</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">
              	<?php //there are still bugs here, check soon [returns all instances of the empid]
                if ($_SESSION['EMPPOSITION'] == 'Administrator') {
              		$Order = New Order();
                  $totalOrders = Order::countOrdersPending();
                  echo  $totalOrders;
                }else if ($_SESSION['EMPPOSITION'] == 'Sales Staff' || $_SESSION['EMPPOSITION'] == 'Normal user') {
                  $Order = New Order();
                  $totalOrders = Order::countOrdersPendingStaffCust();
                  echo  $totalOrders;
                }
              	?>
             </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT; ?>module/order/">
              <span class="float-left">List of Orders</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">
              	<?php 
              		$Company = New Company();
                  $totalCars = Company::countCars();
                  echo  $totalCars;
              	?>
             </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT; ?>module/company/">
              <span class="float-left">View Cars</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
  
  <!-- /.panel -->

  