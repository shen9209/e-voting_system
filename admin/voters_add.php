<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$voter = $_POST['voter'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		if(!empty($filename)){
			
		}
		//generate voters id
		//$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		//$voter = substr(str_shuffle($set), 0, 5);

		$sql = "INSERT INTO voter (voter_id, password, firstname, lastname) VALUES ('$voter', '$password', '$firstname', '$lastname')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>