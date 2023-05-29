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

	function doInsert(){
		
		if (isset($_POST['save'])){
			$Customer_ID 	= $_POST['Customer_id'];
			$SalStaff_ID 	= $_POST['SalStaf_ID'];
			$Product_ID 	= $_POST['Product_ID'];
			$Unit_ID = rand(100000, 999999);
			$Order_Date 	= date("Y-m-d");
			$Order_Status  	= 'PENDING';
			$Total_Amount = 'price';



			$Order = new Order();
			$Order->Customer_ID    = $Customer_ID;
			$Order->SalStaff_ID   = $SalStaff_ID;
			$Order->Product_ID    = $Product_ID;
			$Order->Unit_ID    = $Unit_ID;
			$Order->Order_Date   = $Order_Date;
			$Order->Order_Status   = $Order_Status;
			$Order->Total_Amount     = $Total_Amount;

		$istrue = 	$Order->create();
		if ($istrue == 1) {
			$Production_Date 	= date("Y-m-d");
			$Inventory = new Inventory();
			$Inventory->Product_ID = $Product_ID;
			$Inventory->Unit_ID = $Unit_ID;
			$Inventory->Production_Date = $Production_Date;
			$Inventory->create();

			message("Order has been placed successfully!", "success");
			redirect('index.php');
	}
	
		}


	}

	function doEdit(){
		if (isset($_POST['save'])){
			$Order_ID     = $_POST['Order_ID'];
			$Customer_ID  = $_POST['Customer_id'];
			$SalStaf_ID   = $_POST['SalStaf_ID'];
			$Product_ID   = $_POST['Product_ID'];
			$Order_Date   = $_POST['Order_Date'];
			
			// Check if Unit_ID index is set before accessing its value
			$Unit_ID = isset($_POST['Unit_ID']) ? $_POST['Unit_ID'] : '';
			$Order_Status  = $_POST['status'];
	
			$Order = new Order();
			$Order->Order_ID     = $Order_ID;
			$Order->Customer_ID  = $Customer_ID;
			$Order->SalStaff_ID  = $SalStaf_ID;
			$Order->Product_ID   = $Product_ID;
			$Order->Order_Date   = $Order_Date;
			$Order->Unit_ID      = $Unit_ID;
			$Order->Order_Status = $Order_Status;
	
			if ($Order_Status == 'REJECTED' || $Order_Status == 'PENDING') {			
				$Order->update($Order_ID);
				message("Your order is  ". $Order_Status , "error");
				redirect('index.php');
			} else {
				$Order->update($Order_ID);
				message("Your order has been approved!", "success");
				redirect('index.php');
			}
		}
	}
	

?>