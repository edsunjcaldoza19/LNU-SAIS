<?php
	include '../includes/head.php';
	require '../database/db_pdo.php';

	if(isset($_POST['delete'])){
		try{
			$id = $_POST['id'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM tbl_academic_year WHERE `id` = '$id'";
			$conn->exec($sql);

			$staff_id = $_POST['staff_id'];
			$staff_username = $_POST['staff_username'];
			$log_description = 'Deleted an academic year';
			$timestamp = date('m/d/Y, g:i:s A');

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql2 = "INSERT INTO `tbl_logs`(`log_staff_id`, `log_staff_username`, `log_description`, `timestamp`)
            VALUES ('$staff_id', '$staff_username', '$log_description', '$timestamp')";
			$conn->exec($sql2);

		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Academic Year Successfully Deleted",
					text: "LNU - Student Admission and Information System",
					timer: 2000
				}).then(function(){

					window.location.replace("../../academic_year.php");

				});

			});

		</script>
	';
	}
?>