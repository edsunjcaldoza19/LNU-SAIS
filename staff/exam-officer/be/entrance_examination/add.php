<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
            $exam_time = $_POST['exam_time'];
            $exam_title = $_POST['exam_title'];
            $exam_questions = $_POST['exam_questions'];
            $exam_description = $_POST['exam_description'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_exam`(`exam_title`, `exam_time_limit`,
            `exam_quest_limit`, `exam_description`, `exam_created`,
            `exam_start_date`, `exam_end_date`, `exam_status`)
            VALUES ('$exam_title','$exam_time','$exam_questions','$exam_description',[value-6],[value-7],[value-8],[value-9])";
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

