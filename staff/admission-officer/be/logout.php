<?php

require 'database/db_mysqli.php';

session_start();



/* Unsets session from admin username */

unset($_SESSION['staff_id']);
unset($_SESSION['staff_email']);
unset($_SESSION['staff_password']);
header("location:../../login");

session_destroy();

?>