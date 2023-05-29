<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo WEB_ROOT; ?>index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a  href="<?php echo WEB_ROOT; ?>module/Customer/index.php?view=edit&id=<?php echo $_SESSION['EMPID']; ?>">View</a>
            </li>
            <li>
              <a href="<?php echo WEB_ROOT; ?>module/Customer/index.php?view=reset&id=<?php echo $_SESSION['EMPID']; ?>">Reset Password</a>
            </li>
          </ul>
        </li>

        <?php
          if ($_SESSION['EMPPOSITION'] == 'Normal user') {
          
          
          echo '  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Leave">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsL" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Actions</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponentsL">
          <li>
              <a  href="'; ?><?php echo WEB_ROOT; ?>module/company/index.php?view=orderist">
              <?php 
          echo  'Buy a Car</a>
            </li>
            <li>
              <a  href="'; ?><?php echo WEB_ROOT; ?>module/order/index.php?view=allist">
              <?php 
        echo  'Manage Orders</a>
          </li>
            <li>
              <a  href="'; ?><?php echo WEB_ROOT; ?>module/leave/index.php?view=add">
              <?php 
          echo  'Submit a Report</a>
            </li>
            <li>
                <a  href="'; ?><?php echo WEB_ROOT; ?>module/leave/index.php?view=list">
                 <?php 
          echo  'Manage Reports</a>
            </li>
          </ul>
        </li>';
          }elseif ($_SESSION['EMPPOSITION'] == 'Sales Staff' || $_SESSION['EMPPOSITION'] == 'Manager user') {
          
         echo  '
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Leave">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsL" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Actions</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponentsL">
          <li>
          <a  href="'; ?><?php echo WEB_ROOT; ?>module/company/index.php?view=orderist">
          <?php 
         echo  'Buy a Car</a>
            </li>
            
            <li>
                <a  href="'; ?><?php echo WEB_ROOT; ?>module/order/index.php?view=allist">
                 <?php 
          echo  'View Orders</a>
            </li>
            
          
          </ul>
        </li>';
          
        }else{
          echo '
             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company">
          <a class="nav-link" href="'; ?> <?php echo WEB_ROOT; ?>module/company/">
             <?php 
          echo  '
            <i class="fa fa-car"></i>
            <span class="nav-link-text">Car ShowRoom</span>
          </a>
        </li>
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsO" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-list"></i>
          <span class="nav-link-text">Orders</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponentsO">
          
          <li>
              <a  href="'; ?><?php echo WEB_ROOT; ?>module/order/">
              <?php 
        echo  'Manage Orders</a>
          </li>
          <li>
              <a  href="'; ?><?php echo WEB_ROOT; ?>module/order/index.php?view=approved">
              <?php 
        echo  'Approved/Accomplished Orders</a>
          </li>
          <li>
              <a  href="'; ?><?php echo WEB_ROOT; ?>module/order/index.php?view=rejected">
              <?php 
        echo  'Rejected Orders</a>
          </li>

        </ul>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customer">
      <a class="nav-link" href="'; ?><?php echo WEB_ROOT; ?>module/suppliers/">
       <?php 
      echo  '
        <i class="fa fa-fw fa-sitemap"></i>
        <span class="nav-link-text">Suppliers</span>
       </a>
    </li>

       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customer">
            <a class="nav-link" href="'; ?><?php echo WEB_ROOT; ?>module/rawmaterials/">
             <?php 
          echo  '
            <i class="fa fa-fw fa-puzzle-piece"></i>
            <span class="nav-link-text">Raw Materials</span>
          </a>
       </li>
       
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customer">
            <a class="nav-link" href="'; ?><?php echo WEB_ROOT; ?>module/customer/">
             <?php 
          echo  '
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
       </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Leave">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsL" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Reports</span>
          </a>
         <ul class="sidenav-second-level collapse" id="collapseComponentsL">
            
            <li>
                <a  href="'; ?><?php echo WEB_ROOT; ?>module/leave/">
                 <?php 
          echo  'Manage Reports</a>
            </li>
             <li>
                <a  href="'; ?><?php echo WEB_ROOT; ?>module/leave/index.php?view=approved">
                 <?php 
          echo  'Approved/Accomplished Reports</a>
            </li>
            <li>
                <a  href="'; ?><?php echo WEB_ROOT; ?>module/leave/index.php?view=rejected">
                 <?php 
          echo  'Rejected Report</a>
            </li>
          
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customer">
            <a class="nav-link" href="'; ?><?php echo WEB_ROOT; ?>module/order/index.php?view=sale">
             <?php 
          echo  '
            <i class="fa fa-fw fa-bar-chart"></i>
            <span class="nav-link-text">Sales</span>
          </a>
       </li>';

          
          }


        ?>

        

        
          
       
      </ul>