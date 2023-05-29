<?php
	 if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }

?>
<div class="card mb-3">

        <div class="card-header">
          <i class="fa fa-table"></i><a href="index.php?view=allist"> Approved Orders</a> / <a href="index.php?view=listofpend">Pending Orders</a> / <a href="index.php?view=listofallrej">Rejected Orders</a><?php if ($_SESSION['EMPPOSITION'] == 'Administrator' || $_SESSION['EMPPOSITION'] == 'Sales Staff') 
      	  ?>
 	</div>

         
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
				  		<?php 
				  		if ($_SESSION['EMPPOSITION'] == 'Normal user') {

				  		}else{
				  			echo " <th>Action</th>";
				  		}
				  		?>
						
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
					
				  	if ($_SESSION['EMPPOSITION'] == 'Normal user' ) {
				  		global $mydb;
			  		$mydb->setQuery("select  * from tblorder where Order_Status='REJECTED' AND Customer_ID=". $_SESSION['EMPID']);
					$cur = $mydb->loadResultList();
				  		foreach ($cur as $Defaults) {
					  		echo '<tr>';
							
                              echo '<td>' . $Defaults->Order_ID.'</a></td>';
                              echo '<td>' . $Defaults->Customer_ID.'</a></td>';
                              echo '<td>' . $Defaults->SalStaff_ID.'</a></td>';
                              echo '<td>'. $Defaults->Product_ID.'</td>';
                              echo '<td>'. $Defaults->Unit_ID.'</td>';
							  echo '<td>'. $Defaults->Quantity.'</td>';
                              echo '<td>'. $Defaults->Order_Date.'</td>';
                              echo '<td>'. $Defaults->Order_Status.'</td>';
                              echo '<td>'. $Defaults->Total_Amount.'</td>';

					  		echo '</tr>';
				  		} 
				  	}elseif ($_SESSION['EMPPOSITION'] == 'Sales Staff' || $_SESSION['EMPPOSITION'] == 'Manager user') {
				  		global $mydb;
			  		$mydb->setQuery("select  * from tblorder where Order_Status='REJECTED' AND SalStaff_ID=". $_SESSION['EMPID']);
					$cur = $mydb->loadResultList();
				  		foreach ($cur as $Defaults) {
					  		echo '<tr>';

                              echo '<td>' . $Defaults->Order_ID.'</a></td>';
                              echo '<td>' . $Defaults->Customer_ID.'</a></td>';
                              echo '<td>' . $Defaults->SalStaff_ID.'</a></td>';
                              echo '<td>'. $Defaults->Product_ID.'</td>';
                              echo '<td>'. $Defaults->Unit_ID.'</td>';
							  echo '<td>'. $Defaults->Quantity.'</td>';
                              echo '<td>'. $Defaults->Order_Date.'</td>';
                              echo '<td>'. $Defaults->Order_Status.'</td>';
                              echo '<td>'. $Defaults->Total_Amount.'</td>';
					  		echo $active = "";
					  		
					  		echo '<td align="center" > 
					  					 </td>';
					  		echo '</tr>';
				  		} 
				  	}elseif ($_SESSION['EMPPOSITION'] == 'Administrator') {
						global $mydb;
					$mydb->setQuery("select  * from tblorder where Order_Status='REJECTED' AND Customer_ID=". $_SESSION['EMPID']);
				  $cur = $mydb->loadResultList();
						foreach ($cur as $Defaults) {
							echo '<tr>';

                            echo '<td>' . $Defaults->Order_ID.'</a></td>';
                            echo '<td>' . $Defaults->Customer_ID.'</a></td>';
                            echo '<td>' . $Defaults->SalStaff_ID.'</a></td>';
                            echo '<td>'. $Defaults->Product_ID.'</td>';
                            echo '<td>'. $Defaults->Unit_ID.'</td>';
							echo '<td>'. $Defaults->Quantity.'</td>';
                            echo '<td>'. $Defaults->Order_Date.'</td>';
                            echo '<td>'. $Defaults->Order_Status.'</td>';
                            echo '<td>'. $Defaults->Total_Amount.'</td>';

					  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$Defaults->Order_ID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
					  					 </td>';
					  		echo '</tr>';
				  		} 
				  	}

				  	

						
				  	?>
				  </tbody>
				 
				</table>
			
				</form>
	
       </div>
        </div>
      
      </div>