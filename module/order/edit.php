<?php  
      if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }
$dft = $_GET['id'];
$Order = new Order();
$SL = $Order->single_leave($dft);

?> 

 <div class="container">
  <div class="card card-register mx-auto mt-2">
    <div class="card-header">Update Order Status</div>
    <div class="card-body"> 

 <form action="controller.php?action=edit" method="POST">
            <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="Customer_id">Customer ID:</label>
                      <input name="Order_ID" type="hidden" value="<?php echo $SL->Order_ID; ?>">
                         <input class="form-control input-sm" id="Customer_id" name="Customer_id" placeholder=
                            "Customer ID" type="text" value="<?php echo $SL->Customer_ID; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <?PHP

            ?>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                            <label label for="SalStaf_ID">Sales Staff ID:</label>
                            <input class="form-control input-sm" id="SalStaf_ID" name="SalStaf_ID" placeholder="Enter Sales Staff ID" type="text" value="<?php echo $SL->SalStaff_ID; ?>"  readonly>
                        </div>
                    </div>
                </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="Product_ID">Product ID:</label>
                          <input class="form-control input-sm" id="Product_ID" name="Product_ID" placeholder=
                            "Product ID" type="text" value="<?php echo $SL->Product_ID; ?>" readonly>  
                       
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                            <label for="Order_Date">Date Order Placed:</label>
                            <input class="form-control input-sm" id="Order_Date" name="Order_Date"  type="Date" value="<?php echo $SL->Order_Date; ?>" readonly>     
                         </div>
                      <div class="col-md">
                          <label for="Unit_ID">Unit ID:</label>
                          <input class="form-control input-sm" id="Order_Date" name="Order_Date" value="<?php echo $SL->Unit_ID; ?>" readonly>   
                      </div>
                    </div>
                  </div>               
                   <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                       <label for="status">Order Status:</label>
                         <select class="form-control input-sm" name="status" id="status" required>
                           
                          <?php 
                              if ($SL->Order_Status == 'PENDING') {
                               echo '  <option value="PENDING" selected>PENDING</option>
                                       <option value="APPROVED">APPROVED</option>
                                       <option value="REJECTED">REJECTED</option>';
                              }elseif ($SL->Order_Status == 'APPROVED') {
                              echo '  <option value="PENDING" >PENDING</option>
                                       <option value="APPROVED" selected>APPROVED</option>
                                       <option value="REJECTED">REJECTED</option>';
                              }elseif ($SL->Order_Status == 'REJECTED') {
                               echo '  <option value="PENDING" >PENDING</option>
                                       <option value="APPROVED">APPROVED</option>
                                       <option value="REJECTED" selected>REJECTED</option>';
                              }
                          ?>                                                    
                        </select> 
                      </div>
                    </div>
                  </div>
          
             
            <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Update Order</button>

              
        </form>
             </div>
    </div>
  </div>
 