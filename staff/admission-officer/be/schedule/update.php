<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
            $id = $_POST['id'];
            $date = $_POST['date'];
            $description = $_POST['description'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_schedules` SET `schedule_date`='$date',
            `schedule_desc`='$description' WHERE `id` = '$id'";
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
					title: "Schedule Successfully Updated",
                    text: "LNU - Student Admission and Information System",
					timer: 2000
				}).then(function(){
					window.location.replace("../../schedule.php");

				});

			});

		</script>
	';
	}
?>

