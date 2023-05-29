<?php
  if (!isset($_SESSION['EMPID'])) {
    redirect(web_root."/index.php");
  }
?>

<div class="container">
  <div class="card card-register mx-auto mt-2">
    <div class="card-header">Add new Supplier</div>
    <div class="card-body">
      <form action="controller.php?action=add" method="POST">

      <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="supplier_id">Supplier ID:</label>

                        <input name="supplier_id" type="hidden" value="">
                         <input class="form-control input-sm" id="supplier_id" name="supplier_id" placeholder=
                            "Supplier ID is Auto generated value" type="text" required readonly>
                      </div>
                    </div>
                  </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="supplier_name">Supplier Name:</label>
              <input class="form-control input-sm" id="supplier_name" name="supplier_name" placeholder="Supplier Name" type="text" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="supplier_address">Supplier Address:</label>
              <input class="form-control input-sm" id="supplier_address" name="supplier_address" placeholder="Supplier Address" type="text" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="supplier_phone">Supplier Phone Number:</label>
              <input class="form-control input-sm" id="supplier_phone" name="supplier_phone" placeholder="Supplier Phone Number" type="text" required>
            </div>
          </div>
        </div>

        <button class="btn btn-primary btn-block" name="save" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Add Supplier</button>

      </form>
    </div>
  </div>
</div>
