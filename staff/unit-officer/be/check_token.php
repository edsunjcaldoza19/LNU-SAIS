<?php

/* Redirects to login page if user already logged-out */
session_set_cookie_params(0);
session_start();

require 'database/db_pdo.php';

if(isset($_SESSION['token'])){

	$token = $_SESSION['token'];

	$sql = $conn->prepare("SELECT * from `tbl_account_staff` where `session_token` = '$token'");
	$sql->execute();

	if($fetch = $sql->fetch()){

		$username = $fetch['staff_username'];
		$unitId = $fetch['staff_unit'];
	
	}else{

		invalidToken();

	}

}else{

	loggedOut();

}

function invalidToken(){

	echo '
        <script>

            alert("[TOKEN EXPIRED/INVALID]: Please login to continue");
            window.location.replace("../login/index.php");

        </script>

    ';

}

function loggedOut(){

	echo '
        <script>

            alert("[WARNING]: You have been logged-out, please login to continue");
            window.location.replace("../login/index.php");

        </script>

    ';

}

?>