<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
            $step = $_POST['step'];
            $description = $_POST['description'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_procedures`(`procedure_step_num`, `procedure_desc`) VALUES ('$step','$description')";
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
					title: "Procedure Successfully Added",
                    text: "LNU - Student Admission and Information System",
					timer: 2000
				}).then(function(){
					window.location.replace("../../procedure.php");

				});

			});

		</script>
	';
	}
?>
