<?php
	include 'includes/session.php';

	$sql = "DELETE FROM voter";
	if($conn->query($sql)){
		$_SESSION['success'] = "Votes reset successfully";
	}
	else{
		$_SESSION['error'] = "Something went wrong in reseting";
	}

	header('location: voters.php');

?>