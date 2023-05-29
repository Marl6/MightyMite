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
	
		$Rawmaterials = new Rawmaterials();
		$material_id		 = $_POST['material_id'];
		$material_name		 = $_POST['material_name'];
		$supplier_id 		 = $_POST['supplier_id'];
		$quantity				 = $_POST['quantity'];

			$Rawmaterials->Material_ID		  = $material_id;
			$Rawmaterials->Name   	  = $material_name;
			$Rawmaterials->Supplier_ID 		  = $supplier_id;
			$Rawmaterials->Quantity			  = $quantity;
				
				 $istrue = $Rawmaterials->create(); 
				 if ($istrue == 1){
				 	message("New Material [". $material_name ."] has been added to the stockroom!", "success");
				 	redirect('index.php');
				 	
				 }

		}

	}

function doEdit(){
	if(isset($_POST['save'])){
		$Material_ID          = $_POST['material_id'];
		$Name        		  = $_POST['material_name'];
		$Supplier_ID 		  = $_POST['supplier_id'];
		$Quantity             = $_POST['Quantity'];

		$Rawmaterials = new Rawmaterials();
		$Rawmaterials->Material_ID           = $Material_ID;
		$Rawmaterials->Name        			 = $Name;
		$Rawmaterials->Supplier_ID  		 = $Supplier_ID;
		$Rawmaterials->Quantity              = $Quantity;
		$Rawmaterials->update($Material_ID);

		message("[". $Name ."] has been updated!", "success");
		redirect("index.php");
	}
}

function doDelete(){
		
			$id = $_GET['id'];

			$Rawmaterials = new Rawmaterials();
			$Rawmaterials->delete($id);

			message("Material has been deleted!", "success");
			redirect("index.php");
		
	}

?>