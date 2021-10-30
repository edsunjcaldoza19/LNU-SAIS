<?php
    include '../includes/head.php';
    require '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
            $id = $_POST['id'];
            $question = $_POST['question'];
            $answer = $_POST['answer'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_faqs` SET `question`='$question',
            `answer`='$answer' WHERE `id` = '$id'";
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
					title: "FAQ Entry Successfully Updated",
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

