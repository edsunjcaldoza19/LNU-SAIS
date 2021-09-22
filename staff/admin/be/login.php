<head>
    <link rel="stylesheet" type="text/css" href="../../../plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">

    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <script src="../../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<?php
require 'database/db_mysqli.php';
require 'database/db_pdo.php';

session_start();

if(isset($_POST['login'])){

	try{

		/* Checks user credentials in the database  */

		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * from `tbl_admin` where `username`='$username' and `password`='$password'";
		$query = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($query);
		$count = mysqli_num_rows($query);

		if($count > 0){

			$prep = $conn->prepare("SELECT * FROM `tbl_admin` where `username` = '$username'");
    		$prep->execute();

    		while($fetch = $prep->fetch()){
					/* Sets PHP session [ADMIN CREDENTIALS] */
					$_SESSION['admin_id'] = $row['id'];
    				$_SESSION['admin_username'] = $row['username'];
					$_SESSION['admin_password'] = $row['password'];
					$_SESSION['admin_name'] = $row['name'];
					$_SESSION['admin_email'] = $row['email'];

					echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "success",
								title: "Login Successful. Please Wait...",
								text: "LNU Student Admission and Information System",
								timer: 1000,
								showConfirmButton: false
							}).then(function(){

								window.location.replace("../home.php");

							});

						});
					</script>
				';
    		}

		}else{
			echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "error",
								title: "Invalid User Credentials Please Login Again",
								timer: 1000
							}).then(function(){

								window.location.replace("../login.php");

							});

						});
					</script>
				';

		}

	}catch(exception $e){
		echo 'Error: '.$e->getMessage();

	}
}
?>