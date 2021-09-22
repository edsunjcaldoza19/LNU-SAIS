<?php
    session_start();
    $activePage = basename($_SERVER['PHP_SELF'], ".php");

    if(!ISSET($_SESSION['staff_id'])){
		header('location:../login/index.php');
	}

?>
