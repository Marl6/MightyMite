<?php  
      if (!isset($_SESSION['EMPID'])){
      redirect(web_root."admin/index.php");
     }

  @$USERID = $_GET['id'];
    if($USERID==''){
  redirect("index.php");
}
  $user = New User();
  $singleuser = $user->single_user($USERID);

?> 
<div class="container">
    <div class="card card-register mx-auto mt-2">
      <div class="card-header">Update Customer Details</div>
      <div class="card-body"> 
 <form  action="controller.php?action=edit" method="POST">

                 <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="EMPID">Customer ID:</label>

                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="EMPID" name="EMPID" placeholder=
                            "Customer ID" type="text"  value="<?php echo $singleuser->EMPID; ?>" readonly>
                      </div>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="name">Name:</label>
                        <input name="empid" type="hidden" value="<?php echo $singleuser->EMPID; ?>">
                         <input class="form-control input-sm" id="name" name="name" placeholder=
                            "Account Name" type="text" value="<?php echo $singleuser->EMPNAME; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="sex">Sex:</label>

                       <select class="form-control input-sm" name="sex" id="sex">

                        <?php 
                          if ($singleuser->EMPSEX == 'MALE') {
                            echo ' <option value="MALE" selected>MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            ';
                          }else{
                             echo ' <option value="MALE" >MALE</option>
                                <option value="FEMALE" selected>FEMALE</option>
                            ';
                          }
                        ?>      
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="username">Email/Username:</label>

                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="username" name="username" placeholder=
                            "Email Address" type="text" value="<?php echo $singleuser->USERNAME; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="number">PHONE NUMBER:</label>

                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="phonenumber" name="phonenumber" placeholder=
                            "Phone Number" type="text"  value="<?php echo $singleuser->PHONE_NUMBER; ?>" required>
                      </div>
                    </div>
                  </div>   
                  
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="EMPID">ADDRESS:</label>
                        <input name="address" type="hidden" value="">
                         <input class="form-control input-sm" id="address" name="address" placeholder=
                            "Address" type="text"  value="<?php echo $singleuser->ADDRESS; ?>" required>
                      </div>
                    </div>
                  </div> 
                
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md">
                        <label for="type">Type:</label>
                        
                          <select class="form-control input-sm" name="type" id="type">
                        
                        <?php 
                          if ($singleuser->EMPPOSITION == 'Administrator') {
                            echo '
                              <option value="Administrator" selected>Administrator</option>
                              <option value="Normal user">Normal user</option>
                              <option value="Sales Staff">Sales Staff</option>
                              <option value="Manager user">Manager user</option>
                              <option value="Boss User">Boss User</option>
                            ';
                          }elseif ($singleuser->EMPPOSITION == 'Normal user') {
                             echo '
                              <option value="Normal user" selected>Normal user</option>
                            ';
                            # code...
                          }elseif ($singleuser->EMPPOSITION == 'Sales Staff') {
                             echo '
                              <option value="Administrator">Administrator</option>
                              <option value="Normal user">Normal user</option>
                              <option value="Sales Staff" selected>Sales Staff</option>
                              <option value="Manager user">Manager user</option>
                              <option value="Boss User">Boss User</option>
                            ';
                            # code...
                          }elseif ($singleuser->EMPPOSITION == 'Manager user') {
                             echo '
                              <option value="Administrator">Administrator</option>
                              <option value="Normal user">Normal user</option>
                              <option value="Sales Staff">Sales Staff</option>
                              <option value="Manager user" selected>Manager user</option>
                              <option value="Boss User">Boss User</option>
                            ';
                            # code...
                          }elseif ($singleuser->EMPPOSITION == 'Boss User') {
                            # code...
                             echo '
                              <option value="Administrator">Administrator</option>
                              <option value="Normal user">Normal user</option>
                              <option value="Sales Staff">Sales Staff</option>
                              <option value="Manager user">Manager user</option>
                              <option value="Boss User" selected>Boss User</option>
                            ';
                       
                          }
                          ?>

                        </select> 
                      </div>
                    </div>
                  </div>

              <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save User</button>

   
          
        </form>
      

      </div>
    </div>
  </div>
 