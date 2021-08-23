<?php include 'includes/conn.php'; ?>
<?php include 'includes/header.php'; ?>
 
 
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'index_topmenubar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
 
	        <div class="row">
	        	<div class="col-sm-10 col-sm-offset-1">
	        		 
 
				    <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
		        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        	<span class="message"></span>
			        </div>

				    <?php
				    	//$sql = "SELECT * FROM votes WHERE voters_id = '".$voter['id']."'";
				    	//$vquery = $conn->query($sql);

				    		?>
			    			<!-- Voting Ballot -->
 
				        		<?php
				        			include 'includes/slugify.php';

				        			$candidate = '';
				        			$sql = "SELECT * FROM positions ORDER BY priority ASC";
									$query = $conn->query($sql);
									while($row = $query->fetch_assoc()){
										$sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
										$cquery = $conn->query($sql);
										while($crow = $cquery->fetch_assoc()){
									 
											$image = (!empty($crow['photo'])) ? 'images/'.$crow['photo'] : 'images/profile.jpg';
											$candidate .= '
												 
												<div>
													<img src="'.$image.'" height="130px" width="120px" class="clist"> <span class="cname clist" style="margin-left:50px; font-size:30px">'.$crow['firstname'].' '.$crow['lastname'].'</span>  
													<p>
													<div  style="width: 800px; height: 100px;padding:10px; border: 5px solid black;" >
														<font color="#808080" size="4"> 
															<p></p>
															<span class="cname clist">'.$crow['platform'].'  </span>
														</font> 
													</div>	
													</p>
												</div>
											';
										}

										 

										echo '
											<div class="row">
												<div class="col-xs-12">
													<div class="box box-solid" id="'.$row['id'].'">
														<div class="box-header with-border">
															<h1 class="box-title"><b>'.$row['description'].'</b></h1>
														</div>
														<div class="box-body">
																
															<div id="candidate_list">
																<ul>
																	'.$candidate.'
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										';

										$candidate = '';

									}	

				        		?>
				        		 
				         
				        	<!-- End Voting Ballot -->
				    		<?php
				     

				    ?>

	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
 
 
</div>
 
<?php include 'includes/scripts.php'; ?>
 
 
</body>
</html>