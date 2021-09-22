<?php

    include '../includes/head.php';
    require '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
            $name = $_POST['name'];
            $acronym = $_POST['acronym'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_department(`dept_name`, `dept_acronym`) VALUES('$name', '$acronym')";
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
					title: "Department Successfully Added",
					timer: 3000
				}).then(function(){
					window.location.replace("../../department.php");

				});

			});

		</script>
	';
	}
?>

