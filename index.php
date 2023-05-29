<?php 
require_once("include/initialize.php");
	 if (!isset($_SESSION['EMPID'])){
      redirect(WEB_ROOT."login.php");
     } 
$title="Home Panel"; 
$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
		
		if ($_SESSION['EMPPOSITION']=='Administrator') {
				# code... 

			$content='home.php';
		}	
		break;	
	default :
		if ($_SESSION['EMPPOSITION']=='Customer') {
				# code...
			redirect('orders/');
			$title="Customer Panel"; 
		}	
		if ($_SESSION['EMPPOSITION']=='Administrator') {
				# code... 

			$content='home.php';

		}
	    // $title="Home";	
		// $content ='home.php';		
}
require_once("theme/template.php");
?>