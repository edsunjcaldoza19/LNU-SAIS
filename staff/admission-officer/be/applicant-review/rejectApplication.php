<?php
	require_once '../database/db_pdo.php';

	date_default_timezone_set('Asia/Taipei');
	
	if(ISSET($_POST['reject'])){
		try{
			$id = $_POST['applicantID'];
			$reason = $_POST['reasonReject'];
			$timestamp = date('F j, Y, g:i:s A');
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_applicant` SET `form_status` = 'Disapproved', `fs_timestamp` = '$timestamp', `remarks` = '$reason' WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:../../applicant_pending.php?sy_id='.$_GET['syID'].'');
	}
?>