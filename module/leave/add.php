<?php 
  if (!isset($_SESSION['EMPID'])){
    redirect(web_root."/index.php");
   }

  $user = New User();
  $singleuser = $user->single_user($_SESSION['EMPID']);


 ?> 

 <div class="container">
  <div class="card card-register mx-auto mt-2">
    <div class="card-header">Submit a new Report</div>
    <div class="card-body"> 

 <form action="controller.php?action=add" method="POST">
            <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="EMPID">Customer ID:</label>
                        <input name="deptid" type="hidden" value="<?php echo $singleuser->EMPID; ?>">
                         <input class="form-control input-sm" id="EMPID" name="EMPID" placeholder=
                            "Customer ID" type="text" value="<?php echo $singleuser->EMPID; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="name">Name:</label>
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="name" name="name" placeholder=
                            "Account Name" type="text" value="<?php echo $singleuser->EMPNAME; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="sex">Sex:</label>
                          <input class="form-control input-sm" id="sex" name="sex" placeholder=
                            "Account Name" type="text" value="<?php echo $singleuser->EMPSEX; ?>" readonly>     
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                           <label for="df">Date</label>
                           <input class="form-control input-sm" id="df" name="DATESTART"  type="Date" required>                
                    </div>
                  </div>
                   
                  <div class="form-group">
                            <div class="form-row">
                              <div class="col-md">
                                <label for="product-id">Product_ID:</label>
                                  <select class="form-control input-sm" id="product-id" name="product-id" required>
                                    <option value="">Select a product you Ordered</option>
                                      <?php
                                      global $mydb;
                                      $mydb->setQuery("SELECT Product_ID FROM `tblorder` WHERE `Customer_ID` = '$singleuser->EMPID'");
                                      $cur = $mydb->loadResultList();

                                      foreach ($cur as $prov) {
                                        $output .= '<option value="'.$prov->Product_ID.'">'.$prov->Product_ID.'</option>';
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
                                <label for="problem">Problem:</label>
                                  <select class="form-control input-sm" id="problem" name="problem" required>
                                    <option value="">Select a Problem</option>
                                      <?php

                                      global $mydb;
                                      $mydb->setQuery("SELECT * FROM `tblproblem`");
                                      $cur = $mydb->loadResultList();
                                      $output = '';
                                      foreach ($cur as $prov) {
                                        $output .= '<option value="'.$prov->Label.'">'.$prov->Label.'</option>';
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
                        <label for="desc">Description:</label>
                         <input class="form-control input-sm" id="desc" name="desc" placeholder=
                            "Detailed info of the Problem" type="text" required>
                      </div>
                    </div>
                  </div>

                </div>
         
            <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Submit Report</button>            
        </form>
      </div>
    </div>
  </div>
 