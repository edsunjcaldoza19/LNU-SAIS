<?php
	include '../includes/head.php';
	require '../database/db_pdo.php';

	if(isset($_POST['deleteCollege'])){
		try{
			$id = $_POST['id'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM tbl_department WHERE `id` = '$id'";
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
					title: "College Successfully Deleted",
					timer: 3000
				}).then(function(){

					window.location.replace("../../department.php");

				});

			});

		</script>
	';
	}
?>