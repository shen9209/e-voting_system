<?php include 'session.php'; ?>
<?php include 'includes2/slugify.php'; ?>
<?php include 'includes2/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


<?php include 'index_topmenubar.php'; ?>
 
<div  class="content-wrapper">
   
       <section class="content">
	   <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
	   <div class="modal-dialog">
             
              
              <h4 class="modal-title"><b>Add New Voter</b></h4>
             
            <div class="modal-body">
              <form class="form-horizontal" method="POST"   enctype="multipart/form-data" action="register_add.php">
				
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label" >Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Please use your IC as Password" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
 
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </section>
    </div>
</div>
 

<?php include 'includes2/scripts.php'; ?>
 


</body>
</html>
