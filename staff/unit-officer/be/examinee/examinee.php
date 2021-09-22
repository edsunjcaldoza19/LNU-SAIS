<?php
	require_once '../database/db_pdo.php';
	
	if(ISSET($_POST['examineePass'])){
		try{
			$id = $_POST['applicantID'];
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_applicant`SET `examination_status` = 'approved' WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:../../examinee_pending.php');
	}
	else if(ISSET($_POST['examineeFail'])){
		try{
			$id = $_POST['applicantID'];
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_applicant`SET `examination_status` = 'rejected', `application_status` = 'rejected' WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:../../examinee_pending.php');
	}
?>