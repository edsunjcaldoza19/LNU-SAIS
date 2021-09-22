<?php
	require_once '../database/db_pdo.php';
	require '../database/db_mysqli.php';
	
	if(ISSET($_POST['submit'])){
		try{
			$id = $_POST['id'];
			$oldPassword = $_POST['oldPassword'];
			$newPassword = $_POST['newPassword'];
			$newPasswordConfirm = $_POST['newPasswordConfirm'];

			$sql = "SELECT * from `tbl_admin` where `id`='$id'";
			$query = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($query);
			$count = mysqli_num_rows($query);

			if ($oldPassword == $row['password'] and $newPassword == $newPasswordConfirm) {
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE `tbl_admin`SET `password` = '$newPassword' WHERE `id` = '$id'";
				$conn->exec($sql);
			}
			else{
				?>
				<script>
					alert("Invalid Password");
					window.location.href = "../../account_admin.php";
				</script>
				<?php
			}
			
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:../../account_admin.php');
	}
?>