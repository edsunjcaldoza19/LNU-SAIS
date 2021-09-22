<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$desc = $_POST['description'];
			$deptID = $_POST['deptID'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_unit` SET `unit_name` = '$name',
			`unit_desc` = '$desc', `unit_dept_id` = $deptID WHERE `id` = '$id'";
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
					title: "Unit Information Successfully Updated",
                    text: "LNU - Student Admission and Information System",
					timer: 3000
				}).then(function(){
					window.location.replace("../../unit.php");

				});

			});

		</script>
	';
	}
?>