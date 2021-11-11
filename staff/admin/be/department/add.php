<?php

    include '../includes/head.php';
    require '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
            $name = $_POST['name'];
            $acronym = $_POST['acronym'];
            $dean = $_POST['dean'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_department(`dept_name`, `dept_acronym`, `dept_dean`) VALUES('$name', '$acronym', `$dean`)";
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
					title: "College Successfully Added",
					text: "LNU - Student Admission Information System",
					timer: 2000
				}).then(function(){
					window.location.replace("../../college.php");

				});

			});

		</script>
	';
	}
?>

