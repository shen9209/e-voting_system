
<?php
	session_start();
	include '../conn/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE username = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else{
			$row = $query->fetch_assoc();
			if($password==$row['password']){
				$_SESSION['admin'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else if (isset($_POST['back']))
	{
		header('location: ../index.php');
		exit();
	}	

	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: login_index.php');

?>