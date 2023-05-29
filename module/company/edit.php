<?php  
      if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }

  @$cID = $_GET['id'];
   $Company = New  Company();
  $c = $Company->single_Company($cID);

?> 
<div class="container">
    <div class="card card-register mx-auto mt-2">
      <div class="card-header">Update Car Details</div>
      <div class="card-body"> 
 
      <form  action="controller.php?action=edit" method="POST">

            <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="Product_ID">Product ID:</label>
                          <input class="form-control input-sm" id="Product_ID" name="Product_ID" placeholder=
                              "Product ID" type="text" value="<?php echo $c->Product_ID; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="name">Product Name:</label>
                          <input class="form-control input-sm" id="name" name="name" placeholder=
                              "Product Name" type="text" value="<?php echo $c->Product_Name; ?>" required>
                      </div>
                      <div class="col-md">
                        <label for="description">Product Description:</label>
                          <input class="form-control input-sm" id="description" name="description" placeholder=
                              "Product Description" type="text" value="<?php echo $c->Product_Description; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="price">Price:</label>
                          <input class="form-control input-sm" id="price" name="price" placeholder=
                              "Product Price" type="text" value="<?php echo $c->Price; ?>" required>
                      </div>
                      <div class="col-md">
                        <label for="Manufacturer">Manufacturer:</label>
                          <input class="form-control input-sm" id="Manufacturer" name="Manufacturer" placeholder=
                              "Manufacturer" type="text" value="<?php echo $c->Manufacturer; ?>" readonly>
                      </div>
                    </div>
                  </div>
                
                  <div class="form-group">
  <div class="form-row">
    <div class="col-md">
      <label for="image">Product Image:</label>
      <small class="form-text text-muted">Current image: <?php echo $c->PRODUCT_IMG; ?></small>
      <input class="form-control input-sm" id="image" name="image" placeholder="Product Image" type="file" accept="image/jpeg" >
    </div>
  </div>
</div>

                    
            <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Update Car Details</button>

   
          
        </form>
      

      </div>
    </div>
  </div>
 