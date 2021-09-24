<?php

require 'database/db_mysqli.php';
require 'database/db_pdo.php';

session_start();

if(isset($_POST['login'])){

	try{

		/* Checks user credentials in the database  */

		$username = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * from `tbl_admission_officer` where `email`='$username' and `password`='$password'";
		$query = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($query);
		$count = mysqli_num_rows($query);

		if($count > 0){

			$prep = $conn->prepare("SELECT * FROM `tbl_admission_officer` where `email` = '$username'");
    		$prep->execute();

    		while($fetch = $prep->fetch()){
					/* Sets PHP session [ADMIN CREDENTIALS] */
					$_SESSION['officer_id'] = $row['id'];
    				$_SESSION['officer_email'] = $row['email'];

					header('location:../applicant.php');
    		} 

		}else{
			?>
				<script>
					alert("Invalid user credentials. Please Login again");
					window.location.href = "../login.php";
				</script>
			<?php

		}

	}catch(exception $e){
		echo 'Error: '.$e->getErrorMessage();

	}

}

?>