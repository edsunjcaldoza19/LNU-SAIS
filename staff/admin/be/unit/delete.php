<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';
	if(isset($_POST['deleteUnit'])){
		try{
           /* DELETE course from Database */
           $id = $_POST['id'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM tbl_unit WHERE `id` = '$id'";
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
					title: "Unit Information Successfully Deleted",
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



