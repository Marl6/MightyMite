<?php 
  if (!isset($_SESSION['EMPID'])){
    redirect(web_root."/index.php");
  }

  $user = new User();
  $singleuser = $user->single_user($_SESSION['EMPID']);

  @$cID = $_GET['id'];
  $Company = New  Company();
  $c = $Company->single_Company($cID);

  $isSalesStaff = ($singleuser->EMPPOSITION == 'Sales Staff');
  $customerId = ($isSalesStaff) ? '' : $singleuser->EMPID;
 ?>

<div class="container">
  <div class="card card-register mx-auto mt-2">
    <div class="card-header">Create an Order</div>
    <div class="card-body"> 

      <form action="controller.php?action=addorder" method="POST">
        <div class="form-group">
          <label for="Customer_id">Customer ID:</label>
          <input class="form-control input-sm" id="Customer_id" name="Customer_id" placeholder="Enter Customer ID" type="text" value="<?php echo $customerId; ?>" <?php echo ($isSalesStaff) ? '' : 'readonly'; ?> required>
        </div>

        <?php if ($isSalesStaff): ?>
          <div class="form-group">
            <label for="SalStaf_ID">Sales Staff ID:</label>
            <input class="form-control input-sm" id="SalStaf_ID" name="SalStaf_ID" placeholder="Enter Sales Staff ID" type="text" value="<?php echo $singleuser->EMPID; ?>" readonly>
          </div>
        <?php else: ?>
          <input type="hidden" name="SalStaf_ID" value="">
        <?php endif; ?>

        <div class="form-group">
          <label for="Product_ID">Product ID:</label>
          <input class="form-control input-sm" id="Product_ID" name="Product_ID" placeholder="Enter Product ID" type="text" value="<?php echo $c->Product_ID; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input class="form-control input-sm" id="price" name="price" value="<?php echo $c->Price; ?>" type="text" readonly>
        </div>
        <div class="form-group">
          <label for="Quantity">Quantity:</label>
          <input class="form-control input-sm" id="Quantity" name="Quantity" value="" type="number" required>
        </div>
        <div class="form-group">
          <label for="Order_Date">Order Date:</label>
          <input class="form-control input-sm" id="Order_Date" name="Order_Date" type="date" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>
        <label for="Tire">Materials Needed:</label>
        <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="Tire">Tire:</label>
                          <input class="form-control input-sm" id="Tire" name="Tire" placeholder=
                              "Tire" type="text" value="4" readonly>
                      </div>
                      <div class="col-md">
                        <label for="Seat">Seat:</label>
                          <input class="form-control input-sm" id="Seat" name="Seat" placeholder=
                              "Seat" type="text" value="2" readonly>
                      </div>
                    </div>
                    <label for="Tire"></label>
                    <div class="form-row">
                      <div class="col-md">
                        <label for="Frame">Frame:</label>
                          <input class="form-control input-sm" id="Frame" name="Frame" placeholder=
                              "Frame" type="text" value="1" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

        <button class="btn btn-primary btn-block" name="save" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Place Order</button>
      </form>
    </div>
  </div>
</div>
