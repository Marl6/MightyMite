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

	}
   
	function doInsert(){
	
	if (isset($_POST['save']) ) {
	
		$Supplier = new Supplier();
		$Supplier_Name		 = $_POST['supplier_name'];
		$Supplier_Address		 = $_POST['supplier_address'];
		$Supplier_PhoneNumber = $_POST['supplier_phone'];

			$Supplier->Supplier_Name		  = $Supplier_Name;
			$Supplier->Supplier_Address		  = $Supplier_Address;
			$Supplier->Supplier_PhoneNumber = $Supplier_PhoneNumber;
				
				 $istrue = $Supplier->create(); 
				 if ($istrue == 1){
				 	message("New Supplier [". $Supplier_Name ."] has been added to the supplier list!", "success");
				 	redirect('index.php');
				 	
				 }
			}
		}

function doEdit(){
	if(isset($_POST['save'])){

		$Supplier_ID          = $_POST['supplier_id'];
		$Supplier_Name		 = $_POST['supplier_name'];
		$Supplier_Address		 = $_POST['supplier_address'];
		$Supplier_PhoneNumber = $_POST['supplier_phone'];
		
		$Supplier = new Supplier();
		$Supplier->Supplier_ID           = $Supplier_ID;
		$Supplier->Supplier_Name         = $Supplier_Name;
		$Supplier->Supplier_Address  	 = $Supplier_Address;
		$Supplier->Supplier_PhoneNumber  = $Supplier_PhoneNumber;

		$Supplier->update($Supplier_ID);

		message("[". $Supplier_Name ."] has been updated!", "success");
		redirect("index.php");
	}
}

function doDelete(){
		
			$id = $_GET['id'];

			$Supplier = new Supplier();
			$Supplier->delete($id);

			message("Supplier information has been deleted!", "success");
			redirect("index.php");
		
	}

?>