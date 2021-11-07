<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';
	$sy_id = $_GET['sy_id'];

	if(ISSET($_POST['updateScore'])){
		date_default_timezone_set('Asia/Taipei');
		try{
            $id = $_POST['id'];
            $courseId = $_POST['courseId'];
            $interview_score = $_POST['interview_score'];
			$timestamp = date('F j, Y, g:i:s A');

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_interview` SET `interview_rating`=$interview_score
            WHERE `interview_applicant_id`=$id";
			$conn->exec($sql);

			//fetch passing rating

			$sql1 = $conn->prepare("SELECT * FROM `tbl_course` WHERE `course_id`=$courseId");
			$sql1->execute();
			$fetch = $sql1->fetch();

			if($interview_score >= $fetch['interview_passing_score']){
				$status = "Qualified";
			}else{
				$status = "Unqualified";
			}

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql2 = "UPDATE `tbl_applicant` SET `interview_status`='$status', `is_timestamp` = '$timestamp'
            WHERE `applicant_account_id`=$id";
			$conn->exec($sql2);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql3 = "UPDATE `tbl_applicant_account` SET `interview_progress`='Done', `ip_timestamp` = '$timestamp'
            WHERE `id`=$id";
			$conn->exec($sql3);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Applicant Interview Score Added",
                    text: "LNU - Student Admission and Information System",
					timer: 1000
				}).then(function(){
					window.location.replace("../../applicant_pending.php?sy_id='.$sy_id.'");

				});

			});

		</script>
	';
	}
?>

