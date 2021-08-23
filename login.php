<?php
	session_start();
	include 'conn/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM voter WHERE voter_id = '$voter'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter with the ID please register before login';
		}
		else{
			$row = $query->fetch_assoc();
			if($password==$row['password']){
				$_SESSION['voter'] = $row['id'];
				$_SESSION['loggedin_time'] = time();  
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	
	else if (isset($_POST['back']))
	{
		header('location: index.php');
		exit();
	}	
	
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}

	header('location: voters_login.php');

?>