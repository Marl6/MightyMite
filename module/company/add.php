<?php 
  if (!isset($_SESSION['EMPID'])){
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
              <label for="name">Product Name:</label>
              <input name="deptid" type="hidden" value="">
              <input class="form-control input-sm" id="name" name="name" placeholder="Product Name" type="text" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="image">Product Image:</label>
              <input class="form-control input-sm" id="image" name="image" type="file" accept="image/jpeg" required>
            </div>
          </div>
        </div>


        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="description">Product Description:</label>
              <textarea class="form-control input-sm" id="description" name="description" placeholder="Product Description" required></textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="price">Price:</label>
              <input class="form-control input-sm" id="price" name="price" placeholder="Price" type="number" min="0" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md">
              <label for="manufacturer">Manufacturer:</label>
              <input class="form-control input-sm" id="manufacturer" name="manufacturer" placeholder="Mighty Mite" type="text" readonly>
            </div>
          </div>
        </div>
        
        <button class="btn btn-primary btn-block" name="save" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Save Product</button>
      
      </form>                   
    </div>
  </div>
</div>