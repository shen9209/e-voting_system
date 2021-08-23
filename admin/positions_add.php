<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$description = $_POST['description'];
		$max_vote = $_POST['max_vote'];

		$sql = "SELECT * FROM positions ORDER BY priority DESC LIMIT 1";
		$candidates="SELECT COUNT(id) AS AMOUNT FROM candidates";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		
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
			$priority = $row['priority'] + 1;
			$sql = "INSERT INTO positions (description, max_vote, priority) VALUES ('$description', '$max_vote', '$priority')"; 
			
			if($conn->query($sql)){
				$_SESSION['success'] = 'Position updated successfully'	;
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
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: positions.php');
?>