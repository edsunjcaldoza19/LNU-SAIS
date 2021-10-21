<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';
	if(isset($_POST['add'])){
		try{
           /* Add a new AY to the database */
            $year = $_POST['year'];
            $enable_exam = $_POST['enableExam'];
            $status = $_POST['status'];

            /* Disables currently active academic year */

            if($status == 1){

            	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE `tbl_academic_year` SET `ay_status` = 0 WHERE `ay_status` = 1";
				$conn->exec($sql);

            }

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql1 = "INSERT INTO `tbl_academic_year`(`ay_year`, `enable_exam`, `ay_status`)
            VALUES ('$year', '$enable_exam', '$status')";
			$conn->exec($sql1);
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Academic Year Successfully Added",
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


