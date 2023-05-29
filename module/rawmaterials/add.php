<?php
  if (!isset($_SESSION['EMPID'])) {
    redirect(web_root."/index.php");
  }
?>

<div class="container">
  <div class="card card-register mx-auto mt-2">
    <div class="card-header">Add new Product</div>
    <div class="card-body">
      <form action="controller.php?action=add" method="POST">

        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="material_id">Material ID</label>
              <input name="material_id" type="hidden" value="">
                         <input class="form-control input-sm" id="material_id" name="material_id" placeholder=
                            "Material ID is Auto generated value" type="text" required readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="material_name">Material Name:</label>
              <input class="form-control input-sm" id="material_name" name="material_name" placeholder="Material Name" type="text" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
           <div class="col-md">
            <label for="supplier_id">Supplier:</label>
              <select class="form-control input-sm" id="supplier_id" name="supplier_id" required>
                <option value="">Select Supplier</option>
                <?php

                  global $mydb;
                  $mydb->setQuery("SELECT * FROM `tblsupplier`");
                  $cur = $mydb->loadResultList();

                  foreach ($cur as $prov) {
                    $output .= '<option value="'.$prov->Supplier_ID.'">'.$prov->Supplier_Name.'</option>';
                  }
                  echo $output;
                  ?>
            </select>
        </div>
    </div>
</div>


        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="quantity">Quantity:</label>
              <input class="form-control input-sm" id="quantity" name="quantity" placeholder="Quantity" type="number" min="0" required>
            </div>
          </div>
        </div>

        <button class="btn btn-primary btn-block" name="save" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Save Product</button>

      </form>
    </div>
  </div>
</div>