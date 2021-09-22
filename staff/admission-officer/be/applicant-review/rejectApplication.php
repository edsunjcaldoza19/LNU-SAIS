<?php
	require_once '../database/db_pdo.php';
	
	if(ISSET($_POST['reject'])){
		try{
			$id = $_POST['applicantID'];
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_applicant`SET `application` = 'rejected', `application_status` = 'rejected' WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:../../applicant_pending.php');
	}
?>