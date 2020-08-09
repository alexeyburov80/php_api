<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$source_id = $_POST['source_id'];
		$name = $_POST['name'];
		$phone =  substr($_POST['phone'], -10);
		$email = $_POST['email'];
		
		$query = "INSERT INTO `contacts` (source_id, name, phone, email) VALUES(:source_id, :name, :phone, :email)";
		
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':source_id', $source_id);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':email', $email);
		
		$stmt->execute();
		$conn = null;
		
		header('location: index.php');
		
	}
?>