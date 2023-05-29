<?php
require_once("include/initialize.php");
?>  <?php
// login confirmation
if(isset($_SESSION['EMPID'])){
  redirect(WEB_ROOT."index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Customer Registration Page</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<?php 

if(isset($_POST['save'])){
  $user = new User();
  $EMPNAME		= $_POST['name'];
  $USERNAME 	    = $_POST['username'];
  $EMPPOSITION	= $_POST['type'];
  $PASSWRD 		= $_POST['password'];
  $ACCSTATUS 		= 'YES';
  $PHONE_NUMBER	= $_POST['phonenumber'];
  $ADDRESS		= $_POST['address'];
  $EMPSEX 		= $_POST['sex'];
  $DEPARTMENT 	= $_POST['department'];
  $EMPID 		= $_POST['EMPID'];

  $user->EMPNAME     = $EMPNAME;
  $user->EMPPOSITION = $EMPPOSITION;
  $user->ADDRESS	   = $ADDRESS;
  $user->USERNAME    = $USERNAME;
  $user->PASSWRD     = sha1($PASSWRD);
  $user->ACCSTATUS   = $ACCSTATUS;
  $user->EMPSEX      = $EMPSEX;
  $user->PHONE_NUMBER = $PHONE_NUMBER;
  $user->DEPARTMENT  = $DEPARTMENT;
  $user->EMPID   	   = $EMPID;
  
   $istrue = $user->create(); 
   if ($istrue == 1){
     message("New User [". $EMPNAME ."] has been created successfully!", "success");
     redirect('index.php');
     
   }

}

?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-2">
      <div class="card-header">Add New Customer</div>
      <div class="card-body">
        <?php check_message(); ?>
        <form action="" method="POST">

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
                <input class="form-control" id="name" name="name" type="text" placeholder="Full Name" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md">
                <label for="sex">Sex:</label>
                <select class="form-control" id="sex" name="sex" required>
                  <option value="Male">MALE</option>
                  <option value="Female">FEMALE</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md">
                <label for="username">Email / Username:</label>
                <input class="form-control" id="username" name="username" type="text" placeholder="Username" required>
              </div>
            </div>
          </div>

              <div class="form-group">
                <div class="form-row">
                    <div class="col-md">
                  <label for="password">Password:</label>

                    <input name="deptid" type="hidden" value="">
                     <input class="form-control input-sm" id="password" name="password" placeholder=
                        "Password" type="Password" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md">
                  <label for="phonenumber">Phone Number:</label>

                   <input class="form-control input-sm" id="phonenumber" name="phonenumber" placeholder=
                        "Contact Number" type="text" required>
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
                      <label for="type">Type:</label>

                       <select class="form-control input-sm" name="type" id="type">
                          <option value="Normal user">Normal user</option>
                        </select> 
                      </div>
                    </div>
                  </div>
            
                <button class="btn btn-primary btn-block" name="save" type="submit" ><span class="glyphicon glyphicon-floppy-save"></span> Save User</button>
           
          </form>
   
  </div>
</div>
  </div>  