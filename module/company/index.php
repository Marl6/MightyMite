<?php
require_once("../../include/initialize.php");
 if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Car Show Room"; 
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

	case 'orderist' :
		$content    = 'orderlist.php';		
		break;

	case 'buy' :
		$content    = 'addorder.php';		
		break;

	case 'cusbuy'	:
		$content	= 'cusbuy.php';
		break;
		
	case 'addtocart' :
		$content	= 'addtocart.php';
		break;

	default :
		$content    = 'list.php';		
}
require_once ("../../theme/template.php");
?>
  
