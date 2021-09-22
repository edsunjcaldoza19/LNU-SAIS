<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';
	if(isset($_POST['add'])){
		try{
           /* Add a new AY to the database */
            $year = $_POST['year'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_academic_year`(`ay_year`)
            VALUES ('$year')";
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
					title: "Academic Year Successfully Added",
                    text: "LNU - Student Admission and Information System",
					timer: 3000
				}).then(function(){
					window.location.replace("../../academic_year.php");

				});

			});

		</script>
	';
	}
?>


