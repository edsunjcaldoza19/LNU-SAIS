<head>

    <link rel="stylesheet" type="text/css" href="../../../../pages/assets/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../pages/assets/css/style.css">

    <script src="../../../../pages/assets/libs/jquery/jquery.min.js"></script>
    <script src="../../../../pages/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../pages/assets/libs/sweetalert/sweetalert2.all.min.js"></script>

</head>

<?php

    require '../database/db_pdo.php';

	if(ISSET($_POST['submit'])){
		try{
			//pathinfo
			$image=$_FILES['image']['name'];
			$extension = pathinfo($image, PATHINFO_EXTENSION);
			$random=rand(0,100000);
			$rename = 'IMG_STAFF'.date('Ymd').$random;
			$newname = $rename.'.'.$extension;
			$target="../../../../images/staff-img/".$newname;

            $username = $_POST['username'];
            $title = $_POST['title'];
            $firstName = $_POST['firstName'];
            $middleName = $_POST['middleName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
			$role = 4;
			$courseID = $_POST['courseID'];

			$password = $username;
			$password = password_hash($password, PASSWORD_DEFAULT);

			$loginStatus = 0;

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_account_staff`(`staff_username`, `staff_password`,
            `staff_title`, `staff_first_name`, `staff_middle_name`, `staff_last_name`, `staff_contact`,
            `staff_email`, `staff_role`, `staff_program`, `login_status`, `staff_profile_img`)
            VALUES ('$username','$password','$title','$firstName','$middleName',
            '$lastName','$contact','$email', '$role', '$courseID', '$loginStatus', '$newname')";
			$conn->exec($sql);
			//Move to path
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				$msg="Image uploaded successfully";
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Account Successfully Added",
                    text: "LNU - Student Admission and Information System",
                    timer: 3000

				}).then(function(){
					window.location.replace("../../account_add.php");

				});

			});

		</script>
	';
	}
?>

