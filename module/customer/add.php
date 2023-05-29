<?php 
  if (!isset($_SESSION['EMPID'])){
    redirect(web_root."admin/index.php");
   }


 ?> 
  <div class="container">
    <div class="card card-register mx-auto mt-2">
      <div class="card-header">Add new Customer</div>
      <div class="card-body">   
 <form action="controller.php?action=add" method="POST">

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="EMPID">Customer ID:</label>

                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="EMPID" name="EMPID" placeholder=
                            "Customer ID is Auto generated value" type="text" required readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="name">Name:</label>

                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="name" name="name" placeholder=
                            "Account Name" type="text" required>
                      </div>
                    </div>
                  </div>
                     <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="sex">Sex:</label>

                       <select class="form-control input-sm" name="sex" id="sex">
                          <option value="MALE">MALE</option>
                          <option value="FEMALE">FEMALE</option>
                         
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
                            "Email or Username" type="text" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="phonenumber">Phone Number:</label>

                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="phonenumber" name="phonenumber" placeholder=
                            "Phone Number" type="text" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="address">Address:</label>

                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="address" name="address" placeholder=
                            "Address" type="text" required>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label  for="pass">Password:</label>

                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" id="pass" name="pass" placeholder=
                            "Account Password" type="Password" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md">
                      <label for="type">Type:</label>

                       <select class="form-control input-sm" name="type" id="type">
                          <option value="Normal user">Normal user</option>
                          <option value="Sales Staff">Sales Staff</option>
                        </select> 
                      </div>
                    </div>
                  </div>

            
            <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save User</button>



          
        </form>
                   
      </div>
    </div>
  </div>
 