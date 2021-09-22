<?php
include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$name = $_POST['name'];
			$acronym = $_POST['acronym'];
			$unitID = $_POST['unitID'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_course`(`course_name`, `course_acronym`, `unit_id`)
            VALUES ('$name','$acronym','$unitID')";
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
					title: "Program Successfully Added",
					text: "LNU - Student Admission Information System",
					timer: 3000
				}).then(function(){

					window.location.replace("../../program.php");

				});

			});

		</script>
	';
	}
?>