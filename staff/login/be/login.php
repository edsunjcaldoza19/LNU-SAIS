<head>
    <link rel="stylesheet" type="text/css" href="../../../plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <script src="../../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<?php
	require 'database/db_pdo.php';

	session_start();
    $username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	function invalidCredentials(){
		echo '
			<script>
				$(document).ready(function(){
					Swal.fire({
						icon: "error",
						title: "Invalid User Credentials Please Login Again",
						timer: 2000
					}).then(function(){
						window.location.replace("../index.php")
					});

				});
			</script>
		';
	}
	function emptyCredentials(){
		echo '
		<script>
			$(document).ready(function(){
				Swal.fire({
					icon: "error",
					title: "Please input username and Password First",
					timer: 2000
				}).then(function(){

					window.location.replace("../index.php");

				});

			});
		</script>
	';
	}
		if(ISSET($_POST['login'])){
			if($_POST['username'] != "" || $_POST['password'] != ""){
				if($role == '0'){
					$sql = "SELECT * FROM `tbl_admin` WHERE `username`=? AND `password`=? ";
					$query = $conn->prepare($sql);
					$query->execute(array($username,$password));
					$row = $query->rowCount();
					$fetch = $query->fetch();
					if($row > 0) {
						$_SESSION['admin_id'] = $fetch['id'];
						$_SESSION['admin_name'] = $fetch['username'];
						$_SESSION['admin_email'] = $fetch['email'];
						echo '
						<script>
							$(document).ready(function(){
								Swal.fire({
									icon: "success",
									title: "Login Successful. Please Wait...",
									text: "Admin Account - Student Admission and Information System",
									timer: 3000,
									showConfirmButton: false
								}).then(function(){

									window.location.replace("../../admin/home.php");

								});

							});
						</script>
					';
					}
					else{
						invalidCredentials();
					}
			}
			elseif($role == '1'){
					$sql = "SELECT * FROM `tbl_account_staff` WHERE `staff_username`=?
					AND `staff_password`=? AND `staff_role` = 1";
					$query = $conn->prepare($sql);
					$query->execute(array($username,$password));
					$row = $query->rowCount();
					$fetch = $query->fetch();
					if($row > 0) {
						$_SESSION['staff_id'] = $fetch['id'];
						$_SESSION['staff_name'] = $fetch['staff_username'];
						$_SESSION['staff_email'] = $fetch['staff_email'];
						echo '
						<script>
							$(document).ready(function(){
								Swal.fire({
									icon: "success",
									title: "Login Successful. Please Wait...",
									text: "Admission Officer Account - Student Admission and Information System",
									timer: 3000,
									showConfirmButton: false
								}).then(function(){

									window.location.replace("../../admission-officer/index.php");

								});
							});
						</script>
					';
					}
					else{
						invalidCredentials();
					}
			}
			elseif ($role == '2'){
				$sql = "SELECT * FROM `tbl_account_staff` WHERE `staff_username`=?
					AND `staff_password`=? AND `staff_role` = 2";
					$query = $conn->prepare($sql);
					$query->execute(array($username,$password));
					$row = $query->rowCount();
					$fetch = $query->fetch();
					if($row > 0) {
						$_SESSION['staff_id'] = $fetch['id'];
						$_SESSION['staff_name'] = $fetch['staff_username'];
						$_SESSION['staff_email'] = $fetch['staff_email'];
						echo '
						<script>
							$(document).ready(function(){
								Swal.fire({
									icon: "success",
									title: "Login Successful. Please Wait...",
									text: "Examination Officer Account - Student Admission and Information System",
									timer: 3000,
									showConfirmButton: false
								}).then(function(){

									window.location.replace("../../exam-officer/index.php");

								});
							});
						</script>
					';
					}
					else{
						invalidCredentials();
					}
			}
			elseif($role == '3'){
				$sql = "SELECT * FROM `tbl_account_staff` WHERE `staff_username`=?
					AND `staff_password`=? AND `staff_role` = 3";
					$query = $conn->prepare($sql);
					$query->execute(array($username,$password));
					$row = $query->rowCount();
					$fetch = $query->fetch();
					if($row > 0) {
						$_SESSION['staff_id'] = $fetch['id'];
						$_SESSION['staff_name'] = $fetch['staff_username'];
						$_SESSION['staff_email'] = $fetch['staff_email'];
						echo '
						<script>
							$(document).ready(function(){
								Swal.fire({
									icon: "success",
									title: "Login Successful. Please Wait...",
									text: "Unit Head Account - Student Admission and Information System",
									timer: 3000,
									showConfirmButton: false
								}).then(function(){

									window.location.replace("../../unit-officer/index.php");

								});
							});
						</script>
					';
					}
					else{
						invalidCredentials();
					}
			}
			elseif($role == '4'){
				$sql = "SELECT * FROM `tbl_account_staff` WHERE `staff_username`=?
					AND `staff_password`=? AND `staff_role` = 4";
					$query = $conn->prepare($sql);
					$query->execute(array($username,$password));
					$row = $query->rowCount();
					$fetch = $query->fetch();
					if($row > 0) {
						$_SESSION['staff_id'] = $fetch['id'];
						$_SESSION['staff_name'] = $fetch['staff_username'];
						$_SESSION['staff_email'] = $fetch['staff_email'];
						echo '
						<script>
							$(document).ready(function(){
								Swal.fire({
									icon: "success",
									title: "Login Successful. Please Wait...",
									text: "Interviewer Account - Student Admission and Information System",
									timer: 3000,
									showConfirmButton: false
								}).then(function(){

									window.location.replace("../../interviewer/index.php");

								});
							});
						</script>
					';
					}
					else{
						invalidCredentials();
					}
			}
			}
			else{
				emptyCredentials();
			}
		}
?>