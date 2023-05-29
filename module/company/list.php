<?php
    if (!isset($_SESSION['EMPID'])){
        redirect(web_root."/index.php");
    }

?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-university"></i> List of Cars
        <a href="index.php?view=add" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i> New Car
        </a>
    </div>

    <div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Image</th>
          <th>Description</th>
          <th>Price</th>
          <th>Manufacturer</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Product_ID, Product_Name, PRODUCT_IMG, Product_Description, Price, Manufacturer
          $mydb->setQuery("SELECT * FROM `product`");
          $cur = $mydb->loadResultList();

          // Loop through each product and display its details
          foreach ($cur as $result) {
            echo '<tr>';
            echo '<td>' . $result->Product_ID . '</td>';
            echo '<td>' . $result->Product_Name . '</td>';
           // Check that the image data is not null before displaying it
          if ($result->PRODUCT_IMG != null) {
            echo '<td><img src="data:image/jpeg;base64,'.base64_encode($result->PRODUCT_IMG).'" width="100" height="100"/></td>';
          } else {
            echo '<td>No image available</td>';
          }
            echo '<td>' . $result->Product_Description . '</td>';
            echo '<td>' . $result->Price . '</td>';
            echo '<td>' . $result->Manufacturer . '</td>';
            echo '<td align="center"> 
                    <a title="Delete" href="controller.php?action=delete&id='.$result->Product_ID.'" class="btn btn-danger btn-sm delete"><span class="fa fa-trash-o fw-fa"></span></a>		 
                    <a title="Edit" href="index.php?view=edit&id='.$result->Product_ID.'" class="btn btn-primary btn-sm"><span class="fa fa-edit fw-fa"></span></a>    
                  </td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>