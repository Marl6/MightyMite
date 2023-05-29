<?php
require_once ("../../include/initialize.php");
	  if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	}
   
   //`LEAVEID`, `EMPID`, `DATESTART`, `PRODUCT_ID`,`REASON`, `LEAVESTATUS`, `ADMINREMARKS`, `DATEPOSTED`
	function doInsert(){
		
		if (isset($_POST['save'])){
			$EMPID 	= $_POST['EMPID'];
			$DATESTART 	= $_POST['DATESTART'];
			$PRODUCT_ID 	= $_POST['product-id'];
			$PROBLEM 	  = $_POST['problem'];
			$DESCRIPTION 	  = $_POST['desc'];
			$LEAVESTATUS  ='PENDING';
			$ADMINREMARKS = 'N/A';
			$DATEPOSTED   = date("Y-m-d");


			$Leave = new Leave();
			$Leave->EMPID    	 = $EMPID;
			$Leave->DATESTART    = $DATESTART;
			$Leave->PRODUCT_ID   = $PRODUCT_ID;
			$Leave->PROBLEM      = $PROBLEM;
			$Leave->DESCRIPTION  = $DESCRIPTION;
			$Leave->LEAVESTATUS  = $LEAVESTATUS;
			$Leave->ADMINREMARKS = $ADMINREMARKS;
			$Leave->DATEPOSTED   = $DATEPOSTED;


		$istrue = 	$Leave->create();
		if ($istrue == 1) {
			message("Report have been created successfully! Please standby as we will be calling in a sec", "success");
			redirect('index.php');
		}



		}


	}

	function doEdit(){
		if (isset($_POST['save'])){
			$LEAVEID  	  = $_POST['LEAVEID'];
			$LEAVESTATUS  = $_POST['LEAVESTATUS'];
			$ADMINREMARKS = $_POST['ADMINREMARKS'];
			$DATEPOSTED   = date("Y-m-d");
			$EMPID 		= $_POST['EMPID'];
			    $Leave = new Leave();
				$Leave->LEAVESTATUS  = $LEAVESTATUS;
				$Leave->ADMINREMARKS = $ADMINREMARKS;
				$Leave->DATEPOSTED   = $DATEPOSTED;

				if ($LEAVESTATUS == 'REJECTED' || $LEAVESTATUS == 'PENDING') {
						
					$Leave->update($LEAVEID);
					message("Report application is  ". $LEAVESTATUS , "error");
					redirect('index.php');
				}else{

					$Leave->update($LEAVEID);
					message("Report application been resolved successfully!", "success");
					redirect('index.php');
				}
					

				
			}
		}

 
?>