<header class="main-header">
   
  <a href="admin_homepage.php" class="logo">
    <span class="logo-lg"><b>e-Voting System </span>
	
  </a>
   
  <nav class="navbar navbar-static-top">
     

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
       
        <li class=" ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          
            <span class="hidden-xs"><?php echo $user['firstname'].' '.$user['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu">
            
             
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
              </div>
              <div class="pull-right">
                <a href="admin_logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>