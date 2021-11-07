<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';
	$sy_id = $_GET['sy_id'];

	if(ISSET($_POST['setSchedule'])){
		date_default_timezone_set('Asia/Taipei');
		try{
            $id = $_POST['id'];
            $platform = $_POST['platform'];

            if($platform == 'Face-to-face'){
            	$link = 'N/A';
            }else{
            	$link = $_POST['link'];
            }

            $timeString = $_POST['time'];
            $formatTime = new DateTime($timeString);
            $time = $formatTime->format('g:i A');

			$dateString = $_POST['date'];
            $formatDate = new DateTime($dateString);
            $date = $formatDate->format('m/d/Y');

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_interview` SET `interview_platform`='$platform', `interview_date`='$date',
			`interview_time`='$time', `interview_link`='$link'
            WHERE `interview_applicant_id`=$id";
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
					title: "Applicant Schedule Added Successfully",
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

