<?php  
      if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }

  @$cID = $_GET['id'];
   $Rawmaterials = New  Rawmaterials();
  $c = $Rawmaterials->rawmats($cID);

?> 
<div class="container">
    <div class="card card-register mx-auto mt-2">
      <div class="card-header">Update Materials Details</div>
      <div class="card-body"> 
 
      <form  action="controller.php?action=edit" method="POST">

            <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="material_id">Material ID:</label>
                          <input class="form-control input-sm" id="material_id" name="material_id" placeholder=
                              "Material ID" type="text" value="<?php echo $c->Material_ID; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="material_name">Name</label>
                          <input class="form-control input-sm" id="material_name" name="material_name" placeholder=
                              "Material Name" type="text" value="<?php echo $c->Name; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="supplier_id">Supplier ID:</label>
                          <input class="form-control input-sm" id="supplier_id" name="supplier_id" placeholder=
                              "Supplier ID" type="text" value="<?php echo $c->Supplier_ID; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="Quantity">Quantity:</label>
                          <input class="form-control input-sm" id="Quantity" name="Quantity" placeholder=
                              "Quantity" type="text" value="<?php echo $c->Quantity; ?>" required>
                      </div>
                    </div>
                  </div>
                    
            <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save</button>
       
        </form>
      
      </div>
    </div>
  </div>
 