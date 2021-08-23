<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$description = $_POST['description'];
		$max_vote = $_POST['max_vote'];
		
		$connection = mysqli_connect("localhost", "root", "",  "evotingsystem"); 
		$query = "SELECT id FROM candidates";
		$result = mysqli_query($connection, $query); 
		
		if ($result) 
		{
			 $row = mysqli_num_rows($result); 
			  mysqli_free_result($result); 
		}
		 
		 
		if($max_vote<=$row)
		{
			$sql = "UPDATE positions SET description = '$description', max_vote = '$max_vote' WHERE id = '$id'";
				if($conn->query($sql)){
					$_SESSION['success'] = 'Position updated successfully';
				}
				else{
					$_SESSION['error'] = $conn->error;
				}
		}
		else{
				$_SESSION['error'] ='Max Vote cannot more than the candidates';
			}
				
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: positions.php');

?>