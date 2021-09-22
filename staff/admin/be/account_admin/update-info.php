<?php
	require_once '../database/db_pdo.php';
	
	if(ISSET($_POST['submit'])){
		try{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_admin` SET `name` = '$name', `username` = '$username', `email` = '$email' WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:../../account_admin.php');
	}
?>