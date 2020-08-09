<?php
	require_once 'conn.php';
	
	if(ISSET($_REQUEST['id'])){
        try {

            $query = "DELETE FROM `contacts` WHERE id = '$_REQUEST[id]'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $conn = null;

            header('location: index.php');
        }catch (Exception $e)
        {
            header('location: errors.php?err=' . $e->getMessage());
        }
	}

?>