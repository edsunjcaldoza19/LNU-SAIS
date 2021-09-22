<head>

    <link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <script src="../../assets/libs/jquery/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/sweetalert/sweetalert2.all.min.js"></script>

</head>

<?php

require '../config/db_mysqli.php';

if(isset($_POST['btnRegister'])){

    $email = $_POST['tbEmail'];
    $password = $_POST['tbPassword'];
    $securityQuestion = $_POST['cbQuestion'];
    $securityAnswer = $_POST['tbAnswer'];
    $form1 = "Not Started";
    $form2 = "Not Started";
    $form_timestamp = "N/A";
    $exam = "Not Started";
    $exam_timestamp = "N/A";
    $interview = "Not Started";
    $interview_timestamp = "N/A";
    $admission = "pending";
    $admission_timestamp = "N/A";
    $studentNumber = "N/A";
    $loginStatus = "Logged-out";

    //Sanitize form data

    $email = $connection->real_escape_string($email);
    $password = $connection->real_escape_string($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $securityQuestion = $connection->real_escape_string($securityQuestion);
    $securityAnswer = $connection->real_escape_string($securityAnswer);

    //Generate verification key

    $vkey = md5(time().$email);
    $verified = 0;

    $query="INSERT INTO tbl_applicant_account(`email`, `password`, `verification_key`, `verified`, `security_question`, `security_answer`, `form1_progress`, `form2_progress`, `fp_timestamp`, `examination_progress`, `ep_timestamp`, `interview_progress`, `ip_timestamp`, `admission_status`, `as_timestamp`, `student_number`, `login_status`) VALUES('$email', '$password', '$vkey', '$verified', '$securityQuestion', '$securityAnswer', '$form1', '$form2', '$form_timestamp', '$exam', '$exam_timestamp', '$interview', '$interview_timestamp', '$admission', '$admission_timestamp', '$studentNumber', '$loginStatus')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        sleep(1);

        $logo = "http://localhost/sais/assets/images/navbar_logo_main.png";

        $to = $email;
        $subject = "LNU Admissions | Verification Email";
        $message = "

            <div class='email-body'>
                <div class='email-logo-container'>
                    <img src='$logo' class='logo' alt='sais-logo'>
                </div>
                <div class='email-content'>
                    <p style='font-weight: 600;'>Hi! $email Your account registration is almost done.</p>
            
                    <p style='text-align: justify;'>To proceed with the admission process, kindly verify your account using the link provided below</p>
                    <p style='text-align: justify;'>Sincerely,</p>
                    <p style='text-align: justify; font-weight: 600;'>Admissions Office | Leyte Normal University</p>

                    <hr class='default-divider ml-auto'>
                    <a href='http://localhost/sais/backend/register/verify.php?verification_key=$vkey'>Verify Account Here</a>
                    <hr class='default-divider ml-auto'>
                    <p style='text-align: justify;'><i>Note: Unverified accounts will not be allowed to log-in to the system</i></p>
                    <p style='font-size: 12px;'><i>(This is an system generated email. Do not reply.)</i></p>
                   
                </div>
            </div>

        ";
        $headers = "From: lnu.admissionsoffice@lnu.edu.ph" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $message, $headers, '-f lnu.admissionsoffice@lnu.edu.ph');

        echo '
        <script>

            $(document).ready(function(){

                Swal.fire({

                    icon: "success",
                    title: "A verification email was already sent to your email address!",
                    showConfirmButton: false,
                    timer: 3000

                }).then(function(){

                    window.location.replace("../../accounts/student/registration.php");

                });

            });

        </script>

        ';
    }
    else{
        echo '<script> alert("Error adding account");</script>';
        echo mysqli_error($connection);
    }
}


?>
