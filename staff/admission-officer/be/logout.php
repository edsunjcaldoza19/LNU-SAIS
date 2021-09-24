<head>
    <link rel="stylesheet" type="text/css" href="../../../plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">

    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <script src="../../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<?php

require 'database/db_mysqli.php';

	echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Logged Out",
                    text: "LNU - Student Admission and Information System",
                    timer: 2000

				}).then(function(){
					window.location.replace("../../login");

				});

			});

		</script>
	';

session_start();
/* Unsets session from admin username */

unset($_SESSION['staff_id']);
unset($_SESSION['staff_email']);
unset($_SESSION['staff_password']);

session_destroy();




?>