<?php 
  if (!isset($_SESSION['EMPID'])){
    redirect(web_root."/index.php");
  }

  $user = new User();
  $singleuser = $user->single_user($_SESSION['EMPID']);

  $Company = New  Company();
  $c = $Company->single_Company($cID);
 ?>

<div class="container">
  <div class="card card-register mx-auto mt-2">
    <div class="card-header">Create an Order</div>
    <div class="card-body"> 

      <form action="controller.php?action=add" method="POST">
        <div class="form-group">
          <label for="Customer_id">Customer ID:</label>
          <input class="form-control input-sm" id="Customer_id" name="Customer_id" placeholder="Enter Customer ID" type="text" required>
        </div>
        <div class="form-group">
          <label for="SalStaf_ID">Sales Staff ID:</label>
          <input class="form-control input-sm" id="SalStaf_ID" name="SalStaf_ID" placeholder="Enter Sales Staff ID" type="text" value="<?php echo $singleuser->EMPID; ?>"  readonly>
        </div>
        <div class="form-group">
          <label for="Product_ID">Product ID:</label>
          <input class="form-control input-sm" id="Product_ID" name="Product_ID" placeholder="Enter Product ID" type="text" required>
        </div>
        <div class="form-group">
          <label for="Order_Date">Order Date:</label>
          <input class="form-control input-sm" id="Order_Date" name="Order_Date" type="date" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>
        <button class="btn btn-primary btn-block" name="save" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Place Order</button>
      </form>
    </div>
  </div>
</div>