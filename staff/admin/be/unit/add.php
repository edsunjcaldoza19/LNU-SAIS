<?php

    include '../includes/head.php';
    require '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
            $name = $_POST['name'];
            $description = $_POST['description'];
			$deptID = $_POST['deptID'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_unit(`unit_name`, `unit_desc`, `unit_dept_id`)
			VALUES('$name', '$description', '$deptID')";
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
					title: "Unit Successfully Added",
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

