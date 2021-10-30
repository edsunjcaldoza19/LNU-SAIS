<?php

    include '../includes/head.php';
    require '../database/db_pdo.php';
	if(isset($_POST['delete'])){
		try{
            $id = $_POST['id'];
			$oldImage = $_POST['image'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM tbl_account_staff WHERE `id` = '$id'";
			$conn->exec($sql);
			if (unlink("../../../../images/staff-img/".$oldImage)) {
				$msg= "Deleted";
			}
			else {
				$msg ="Not Deleted";
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Staff Account Successfully Deleted",
                    text: "LNU - Student Admission and Information System",
                    timer: 2000

				}).then(function(){
					window.location.replace("../../account_all.php");

				});

			});

		</script>
	';
	}
?>


