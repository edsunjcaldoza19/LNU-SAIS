<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';
	$sy_id = $_GET['sy_id'];

	if(ISSET($_POST['updateScore'])){
		date_default_timezone_set('Asia/Taipei');
		try{
            $id = $_POST['id'];
            $interview_score = $_POST['interview_score'];
			$timestamp = date('F j, Y, g:i:s A');

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_interview` SET `interview_rating`=$interview_score
            WHERE `interview_applicant_id`=$id";
			$conn->exec($sql);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql1 = "UPDATE `tbl_applicant` SET `interview_status`='Approved', `is_timestamp` = '$timestamp'
            WHERE `applicant_account_id`=$id";
			$conn->exec($sql1);
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

