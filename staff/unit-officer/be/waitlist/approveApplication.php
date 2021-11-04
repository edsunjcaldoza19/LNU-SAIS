<?php
	require_once '../database/db_pdo.php';

	date_default_timezone_set('Asia/Taipei');

	if(ISSET($_POST['approve'])){
		try{
			$id = $_POST['applicantID'];
			$courseId = $_POST['courseID'];
			$firstChoice = $_POST['firstChoice'];
			$secondChoice = $_POST['secondChoice'];
			$timestamp = date('F j, Y, g:i:s A');

			if($courseId == $firstChoice){
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE `tbl_applicant` SET `approved_first_choice` = 1, `admission_status` = 'Approved', `as_timestamp` = '$timestamp' WHERE `id` = '$id'";
				$conn->exec($sql);
			}else if($courseId == $secondChoice){
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE `tbl_applicant` SET `approved_second_choice` = 1, `admission_status` = 'Approved', `as_timestamp` = '$timestamp' WHERE `id` = '$id'";
				$conn->exec($sql);
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}

		$conn = null;
		header('location:../../waitlist.php?course_id='.$courseId.'&sy_id='.$_GET['syID'].'');
	}
?>