<?php
	include '../includes/head.php';
	require '../database/db_pdo.php';

	if(isset($_POST['delete'])){
		try{
			$id = $_POST['id'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM tbl_academic_year WHERE `id` = '$id'";
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