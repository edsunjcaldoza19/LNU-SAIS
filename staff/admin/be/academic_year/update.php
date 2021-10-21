<?php
include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
            $id = $_POST['id'];
			$year = $_POST['year'];
			$enable_exam = $_POST['enableExam'];
            $status = $_POST['status'];

            /* Disables currently active academic year */

            if($status == 1){

            	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE `tbl_academic_year` SET `ay_status` = 0 WHERE `ay_status` = 1";
				$conn->exec($sql);

            }

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_academic_year` SET
            `ay_year`='$year', `enable_exam`=$enable_exam, `ay_status`=$status WHERE `id` = '$id'";
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
					title: "Academic Year Successfully Updated",
					text: "LNU - Student Admission Information System",
					timer: 2000
				}).then(function(){

					window.location.replace("../../academic_year.php");

				});

			});

		</script>
	';
	}
?>