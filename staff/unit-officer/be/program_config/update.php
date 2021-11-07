<?php
include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$sy_id = $_POST['sy_id'];
			$program_quota = $_POST['program_quota'];
			$waitlist_quota = $_POST['waitlist_quota'];
			$interview_passing = $_POST['interview_passing'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_course` SET `course_quota`='$program_quota',
            `waitlist_quota`='$waitlist_quota', `interview_passing_score`='$interview_passing' 
            WHERE `course_id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Program Configuration Successfully Updated",
					text: "LNU - Student Admission Information System",
					timer: 2000
				}).then(function(){

					window.location.replace("../../program_configurations.php?sy_id='.$sy_id.'");

				});

			});

		</script>
	';
	}
?>