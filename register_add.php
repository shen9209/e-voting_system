<?php
	include 'includes2/session.php';
	
	if(isset($_POST['add'])){
		//$voter = $_POST['voter'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		if(!empty($filename)){
			
		}
		//generate voters id
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$voter = substr(str_shuffle($set), 0, 5);
		
		
		$dbc = mysqli_connect('localhost', 'root', '', 'evotingsystem') or die('Error connecting to MySQL server');
		$check=mysqli_query($dbc,"select voter_id from voter where voter_id='$voter'");
		$checkrows=mysqli_num_rows($check);
		
		$check1=mysqli_query($dbc,"select password from voter where password='$password'");
		$checkrows1=mysqli_num_rows($check1);
		
		if($checkrows>0) 
		{
			$_SESSION['error'] = 'ID exists';
		} 
		else
		{
			if( preg_match("#[0-9]#", $password) )
			{
				if( strlen($password) == 12 )
				{
					if($checkrows1>0)
					{
						$_SESSION['error'] = 'You have been registered';
						
					}
					else
					{
						$sql = "INSERT INTO voter (voter_id, password, firstname, lastname) VALUES ('$voter', '$password', '$firstname', '$lastname')";
			
						if($conn->query($sql)){
							$_SESSION['success'] = 'Voter added successfully. Your Voter ID is ' . $voter ;
						}
						else{
							$_SESSION['error'] = $conn->error;
						}
					}
					
				}
				else
				{
					$_SESSION['error'] = 'Password must be your IC Number';
				}
			}
			else
			{
				$_SESSION['error'] = 'Password must be your IC Number';
			}
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: register.php');
?>