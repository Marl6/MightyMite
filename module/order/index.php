<?php
require_once("../../include/initialize.php");
 if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="List of Orders"; 
 $header=$view; 
switch ($view) {
	case 'list' :
		$content    = 'list.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;
	case 'approved' :
		$content    = 'listofapp.php';		
		break;
	case 'rejected' :
		$content    = 'listofrejorders.php';		
		break;
	case 'allist' :
		$content    = 'listofall.php';		
		break;
	case 'listofpend' :
		$content    = 'listofpend.php';		
		break;
	case 'listofallrej' :
		$content    = 'listofallrej.php';		
		break;	
	case 'sale' :
		$content	= 'sales.php';
		break;

	default :
		$content    = 'list.php';		
}
require_once ("../../theme/template.php");
?>
  
