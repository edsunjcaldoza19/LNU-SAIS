<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
            $question = $_POST['question'];
            $answer = $_POST['answer'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_faqs`(`question`, `answer`) VALUES ('$question','$answer')";
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
					title: "FAQ Entry Successfully Added",
                    text: "LNU - Student Admission and Information System",
					timer: 2000
				}).then(function(){
					window.location.replace("../../faqs.php");

				});

			});

		</script>
	';
	}
?>

