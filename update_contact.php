<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		$id = $_POST['id'];
		$source_id = $_POST['source_id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		//$query = "UPDATE `contacts` SET `source_id` = :source_id, `name` = :name, `phone` = :phone, `email` = :email WHERE `id` = :id";
		$query = "UPDATE `contacts` SET `source_id` = :source_id, `name` = :name, `phone` = :phone, `email` = :email WHERE `id` = :id";

		$stmt = $conn->prepare($query);
		$stmt->bindParam(':source_id', $source_id);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':phone', $phone);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':id', $id);
		
		$stmt->execute();
		$conn = null;
		
		header('location: index.php');
		
	}
?>