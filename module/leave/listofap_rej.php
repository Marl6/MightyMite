<?php
	 if (!isset($_SESSION['EMPID'])){
      redirect(web_root."/index.php");
     }

?>
<div class="card mb-3">

        <div class="card-header">
          <i class="fa fa-table"></i> List of Approved/Done Report    <?php if ($_SESSION['EMPPOSITION'] == 'Administrator') 
      	  ?>
 	</div>

         
        <div class="card-body">
          <div class="table-responsive">
	 		    <form action="controller.php?action=delete" Method="POST">  
			    		
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				
				  <thead>
				  	<tr>
					    <th>REPORT ID</th>
				  		<th>CUSTOMER ID</th>
				  		<th>DATE</th>
						<th>PRODUCT ID</th>
						<th>PROBLEM</th>
						<th>DESCRIPTION</th>
				  		<th>STATUS</th>
				  		<th>REMARKS</th>
				  		<th>DATE POSTED</th>
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
				  	//`LEAVEID`, `EMPID`, `DATESTART`, `DATEEND`, `NODAYS`, `SHIFTTIME`, `TYPEOFLEAVE`, `REASON`, `LEAVESTATUS`, `ADMINREMARKS`, `DATEPOSTED`
					
				  	if ($_SESSION['EMPPOSITION'] == 'Normal user') {
				  		global $mydb;
			  		$mydb->setQuery("select  * from tblreport where EMPID=". $_SESSION['EMPID']." AND LEAVESTATUS='APPROVED'" );
					$cur = $mydb->loadResultList();
				  		foreach ($cur as $Defaults) {
					  		echo '<tr>';

							  echo '<td>' . $Defaults->LEAVEID.'</a></td>';
							  echo '<td>'. $Defaults->EMPID.'</td>';
							  echo '<td>'. $Defaults->DATESTART.'</td>';
							  echo '<td>'. $Defaults->PRODUCT_ID.'</td>';
							  echo '<td>'. $Defaults->PROBLEM.'</td>';
							  echo '<td>'. $Defaults->DESCRIPTION.'</td>';
							  echo '<td>' . $Defaults->LEAVESTATUS.'</a></td>';
							  echo '<td>'. $Defaults->ADMINREMARKS.'</td>';
							  echo '<td>'. $Defaults->DATEPOSTED.'</td>';
					  		echo '</tr>';
				  		} 
				  	}elseif ($_SESSION['EMPPOSITION'] == 'Sales Staff' || $_SESSION['EMPPOSITION'] == 'Manager user') {
				  		global $mydb;
			  		$mydb->setQuery("select  * from tblreport where LEAVESTATUS='APPROVED' AND `EMPID` IN ( SELECT `EMPID` from tblcustomer WHERE `COMPANY`='". $_SESSION['COMPANY']  ."' AND `DEPARTMENT`='". $_SESSION['DEPARTMENT']  ."')  " );
					$cur = $mydb->loadResultList();
				  		foreach ($cur as $Defaults) {
					  		echo '<tr>';

							  echo '<td>' . $Defaults->LEAVEID.'</a></td>';
							  echo '<td>'. $Defaults->EMPID.'</td>';
							  echo '<td>'. $Defaults->DATESTART.'</td>';
							  echo '<td>'. $Defaults->PRODUCT_ID.'</td>';
							  echo '<td>'. $Defaults->PROBLEM.'</td>';
							  echo '<td>'. $Defaults->DESCRIPTION.'</td>';
							  echo '<td>' . $Defaults->LEAVESTATUS.'</a></td>';
							  echo '<td>'. $Defaults->ADMINREMARKS.'</td>';
							  echo '<td>'. $Defaults->DATEPOSTED.'</td>';
					  		echo $active = "";
					  		
					  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$Defaults->LEAVEID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
					  					 </td>';
					  		echo '</tr>';
				  		} 
				  	}elseif ($_SESSION['EMPPOSITION'] == 'Administrator') {
						global $mydb;
					$mydb->setQuery("select  * from tblreport where LEAVESTATUS='APPROVED'" );
				  $cur = $mydb->loadResultList();
						foreach ($cur as $Defaults) {
							echo '<tr>';

							echo '<td>' . $Defaults->LEAVEID.'</a></td>';
							echo '<td>'. $Defaults->EMPID.'</td>';
							echo '<td>'. $Defaults->DATESTART.'</td>';
							echo '<td>'. $Defaults->PRODUCT_ID.'</td>';
							echo '<td>'. $Defaults->PROBLEM.'</td>';
							echo '<td>'. $Defaults->DESCRIPTION.'</td>';
							echo '<td>' . $Defaults->LEAVESTATUS.'</a></td>';
							echo '<td>'. $Defaults->ADMINREMARKS.'</td>';
							echo '<td>'. $Defaults->DATEPOSTED.'</td>';
					  		
					  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$Defaults->LEAVEID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
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