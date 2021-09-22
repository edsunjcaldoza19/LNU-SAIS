<?php
    session_start();
    $activePage = basename($_SERVER['PHP_SELF'], ".php");

    if(!ISSET($_SESSION['officer_id'])){
		header('location:login.php');
	}

?>
