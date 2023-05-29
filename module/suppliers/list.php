<?php
    if (!isset($_SESSION['EMPID'])){
        redirect(web_root."/index.php");
    }

?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-university"></i> List of Suppliers
        <a href="index.php?view=add" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i> Add a Supplier
        </a>
    </div>

    <div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Supplier ID</th>
          <th>Supplier Name</th>
          <th>Supplier Address</th>
          <th>Supplier PhoneNumber</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Product_ID, Product_Name, PRODUCT_IMG, Product_Description, Price, Manufacturer
          $mydb->setQuery("SELECT * FROM `tblsupplier`");
          $cur = $mydb->loadResultList();

          // Loop through each product and display its details
          foreach ($cur as $result) {
            echo '<tr>';
            echo '<td>' . $result->Supplier_ID . '</td>';
            echo '<td>' . $result->Supplier_Name . '</td>';
            echo '<td>' . $result->Supplier_Address . '</td>';
            echo '<td>' . $result->Supplier_PhoneNumber . '</td>';
            echo '<td align="center"> 
                    <a title="Delete" href="controller.php?action=delete&id='.$result->Supplier_ID.'" class="btn btn-danger btn-sm delete"><span class="fa fa-trash-o fw-fa"></span></a>		 
                    <a title="Edit" href="index.php?view=edit&id='.$result->Supplier_ID.'" class="btn btn-primary btn-sm"><span class="fa fa-edit fw-fa"></span></a>    
                  </td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>