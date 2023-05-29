<?php
	 if (!isset($_SESSION['EMPID'])){
      redirect(web_root."admin/index.php");
     }

?>
<div class="card mb-3">

        <div class="card-header">
          <i class="fa fa-table"></i> List of Orders   <a href="index.php?view=add" class="btn btn-primary  ">  <i class="fa fa-plus-circle fw-fa"></i> New</a></div>

         
        <div class="card-body">
          <div class="table-responsive">
	 		<form action="controller.php?action=delete" Method="POST">  
			   		
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

				  <thead>
				  	<tr>
				  		<th>Order ID</th>
				  		<th>Customer ID</th>
				  		<th>Sales Staff ID</th>
				  		<th>Product Model ID</th>
						<th>Unit ID</th>
						<th>Quantity</th>
				  		<th>Date Ordered</th>
						<th>Order Status</th>
						<th>Total Amount</th>
				  		<th width="20%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  
				  	<?php 

				  		$mydb->setQuery("SELECT * 
											FROM  `tblorder` where Order_Status='Pending'");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->Order_ID.'</a></td>';
				  		echo '<td>' . $result->Customer_ID.'</a></td>';
				  		echo '<td>' . $result->SalStaff_ID.'</a></td>';
				  		echo '<td>'. $result->Product_ID.'</td>';
						echo '<td>'. $result->Unit_ID.'</td>';
						echo '<td>'. $result->Quantity.'</td>';
				  		echo '<td>'. $result->Order_Date.'</td>';
				  		echo '<td>'. $result->Order_Status.'</td>';
						echo '<td>'. $result->Total_Amount.'</td>';
				  		/*echo '<td>'. $result->ACCSTATUS.'</td>';*/
				  		If($_SESSION['EMPID'] || $result->EMPPOSITION=='Normal user') {
				  			$active = "Disabled";

				  		}else{
				  			$active = "";

				  		}

				  		echo '<td align="center" > 
				  				<a title="Delete" href="controller.php?action=delete&id='.$result->Order_ID.'" class="btn btn-danger btn-sm  delete" ><span class="fa fa-trash-o fw-fa"></span></a>		 
				  				<a title="Edit" href="index.php?view=edit&id='.$result->Order_ID.'"  class="btn btn-primary btn-sm  ">  <span class="fa fa-edit fw-fa"></span></a>	 
								</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
 

				</form>
       </div>
        </div>
      
      </div>