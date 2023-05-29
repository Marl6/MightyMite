<?php
    if (!isset($_SESSION['EMPID'])){
        redirect(web_root."/index.php");
    }
?>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Model Name</th>
          <th>Image</th>
          <th>Description</th>
          <th>Price</th>
          <th>Manufacturer</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $mydb->setQuery("SELECT * FROM `product`");
          $cur = $mydb->loadResultList();
          foreach ($cur as $result) {
            echo '<tr>';
            echo '<td>' . $result->Product_ID . '</td>';
            echo '<td>' . $result->Product_Name . '</td>';
          if ($result->PRODUCT_IMG != null) {
            echo '<td><img src="data:image/jpeg;base64,'.base64_encode($result->PRODUCT_IMG).'" width="100" height="100"/></td>';
          } else {
            echo '<td>No image available</td>';
          }
            echo '<td>' . $result->Product_Description . '</td>';
            echo '<td>' . $result->Price . '</td>';
            echo '<td>' . $result->Manufacturer . '</td>';
            echo '<td align="center"> 
                    <a title="Order" href="index.php?view=buy&id='.$result->Product_ID.'" class="btn btn-primary btn-sm"><span class="fa fa-edit fw-fa"></span></a>    
                    <a title="AddtoCart" href="index.php?view=addtocart&id='.$result->Product_ID.'" class="btn btn-info btn-sm"><span class="fa fa-edit fw-fa" name="add2cart" type="submit"></span></a>   
                    </td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<div class="d-flex align-items-center justify-content-center vh-100">
  <div class="container">
    <div class="form-group text-center">
      <a href="#" class="btn btn-primary">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        Cart
      </a>
    </div>
  </div>
</div>