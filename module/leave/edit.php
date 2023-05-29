<?php  
      if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }
$dft = $_GET['id'];
$Leave = new Leave();
$SL = $Leave->single_leave($dft);

?> 

 <div class="container">
  <div class="card card-register mx-auto mt-2">
    <div class="card-header">Edit Report</div>
      <div class="card-body"> 
        <form action="controller.php?action=edit" method="POST">

            <div class="form-group">
              <div class="form-row">
                 <div class="col-md">
                      <label for="EMPID">Customer ID:</label>

                        <input name="LEAVEID" type="hidden" value="<?php echo $SL->LEAVEID; ?>">
                         <input class="form-control input-sm" id="EMPID" name="EMPID" placeholder=
                            "Customer ID" type="text" value="<?php echo $SL->EMPID; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <?PHP // `LEAVEID`, `EMPID`, `DATESTART`, `DATEEND`, `NODAYS`, `SHIFTTIME`, `TYPEOFLEAVE`, `REASON`, `LEAVESTATUS`, `ADMINREMARKS`, `DATEPOSTED` 
               $user = New User();
              $singleuser = $user->single_emp($SL->EMPID);
               ?>
               
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="name">Name:</label>
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
                        <label for="NODAYS">Date report submitted :</label>
                        <input class="form-control input-sm" id="df" name="DATESTART"  type="Date" value="<?php echo $SL->DATESTART; ?>" readonly>     
                      </div>
                      <div class="col-md">
                        <label for="NODAYS">Problem :</label>
                        <input class="form-control input-sm" id="PROBLEM" name="PROBLEM"  type="text" value="<?php echo $SL->PROBLEM; ?>" readonly>     
                      </div>
                    </div>
                  </div>   
                  
                  <div class="form-group">
                      <div class="col-row">
                        <label for="NODAYS">Description :</label>
                        <input class="form-control input-sm" id="DESCRIPTION" name="DESCRIPTION"  type="text" value="<?php echo $SL->DESCRIPTION; ?>" readonly>     
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="ADMINREMARKS">Remarks :</label>
                          <textarea class="form-control input-sm" name="ADMINREMARKS" id="ADMINREMARKS" ><?php echo $SL->ADMINREMARKS; ?></textarea>  
                       
                      </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                       <label for="LEAVESTATUS">Report Status:</label>
                         <select class="form-control input-sm" name="LEAVESTATUS" id="LEAVESTATUS" required>
                           
                          <?php 
                              if ($SL->LEAVESTATUS == 'PENDING') {
                               echo '  <option value="PENDING" selected>PENDING</option>
                                       <option value="APPROVED">APPROVED</option>
                                       <option value="REJECTED">REJECTED</option>';
                              }elseif ($SL->LEAVESTATUS == 'APPROVED') {
                              echo '  <option value="PENDING" >PENDING</option>
                                       <option value="APPROVED" selected>APPROVED</option>
                                       <option value="REJECTED">REJECTED</option>';
                              }elseif ($SL->LEAVESTATUS == 'REJECTED') {
                               echo '  <option value="PENDING" >PENDING</option>
                                       <option value="APPROVED">APPROVED</option>
                                       <option value="REJECTED" selected>REJECTED</option>';
                              }
                          ?>                                                    
                        </select> 
                      </div>
                    </div>
                  </div>
          
             
            <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save Report</button>

              
        </form>
             </div>
    </div>
  </div>
 