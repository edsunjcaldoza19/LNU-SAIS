<?php

require 'database/db_mysqli.php';

session_start();



/* Unsets session from admin username */

unset($_SESSION['officer_id']);
unset($_SESSION['officer_email']);
unset($_SESSION['officer_password']);
header("location:../login.php");

session_destroy();

?>