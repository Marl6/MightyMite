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
	
	case 'delete' :
	doDelete();
	break;
	
	case 'addorder' :
    doAddOrder();
    break;

	case 'photos' :
	doupdateimage();
	break;

 
	}
   
	function doInsert(){
	
	if (isset($_POST['save']) ) {
	
		$Company = new Company();
		$Product_Name		 = $_POST['name'];
		$PRODUCT_IMG		 = $_POST['image'];
		$Product_Description = $_POST['description'];
		$Price				 = $_POST['price'];
		$Manufacturer		 = 'Mighty Mite';
	

			$Company->Product_Name		  = $Product_Name;
			$Company->PRODUCT_IMG		  = $PRODUCT_IMG;
			$Company->Product_Description = $Product_Description;
			$Company->Price				  = $Price;
			$Company->Manufacturer		  = $Manufacturer;
				
				 $istrue = $Company->create(); 
				 if ($istrue == 1){
				 	message("New Product [". $Product_Name ."] has been added to the showroom!", "success");
				 	redirect('index.php');
				 	
				 }

		}

	}

function doEdit(){
	if(isset($_POST['save'])){
		$Company = new Company();
		$Product_ID          = $_POST['Product_ID'];
		$Product_Name        = $_POST['name'];
		$Product_Description = $_POST['description'];
		$Price               = $_POST['price'];
		$PRODUCT_IMG         = $_POST['image'];

		$Company->Product_ID           = $Product_ID;
		$Company->Product_Name         = $Product_Name;
		$Company->Product_Description  = $Product_Description;
		$Company->Price                = $Price;
		$Company->PRODUCT_IMG          = $PRODUCT_IMG;
		$Company->update($Product_ID);

		message("[". $Product_Name ."] has been updated!", "success");
		redirect("index.php");
	}
}

function doDelete(){
		
			$id = $_GET['id'];

			$Company = new Company();
			$Company->delete($id);

			message("Product has been deleted!", "success");
			redirect("index.php");
		
	}

	function doAddOrder() {
		if (isset($_POST['save'])) {
			$Customer_ID = $_POST['Customer_id'];
			$SalStaff_ID = $_POST['SalStaf_ID'];
			$Product_ID = $_POST['Product_ID'];
			$Price = $_POST['price'];
			$Quantity = $_POST['Quantity'];
			$Unit_ID = rand(100000, 999999);
			$Order_Date = date("Y-m-d");
			$Order_Status = 'PENDING';
			$Total_Amount = $Price * $Quantity ;
			$Tire = $_POST['Tire'];
			$Seat = $_POST['Seat'];
			$Frame = $_POST['Frame'];
	
			$Order = new Order();
			$Order->Customer_ID = $Customer_ID;
			$Order->SalStaff_ID = $SalStaff_ID;
			$Order->Product_ID = $Product_ID;
			$Order->Unit_ID = $Unit_ID;
			$Order->Quantity = $Quantity;
			$Order->Order_Date = $Order_Date;
			$Order->Order_Status = $Order_Status;
			$Order->Total_Amount = $Total_Amount;
	
			$istrue = $Order->create();
			if ($istrue == 1) {
				$Production_Date = date("Y-m-d");
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
	


	
 
?>