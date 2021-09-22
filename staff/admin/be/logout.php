<?php

require 'database/db_mysqli.php';

session_start();



/* Unsets session from admin username */

header("location:../../login/index.php");
session_destroy();

?>