<head>

    <link rel="stylesheet" type="text/css" href="../../../../pages/assets/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../pages/assets/css/style.css">

    <script src="../../../../pages/assets/libs/jquery/jquery.min.js"></script>
    <script src="../../../../pages/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../pages/assets/libs/sweetalert/sweetalert2.all.min.js"></script>

</head>

<?php

require '../database/db_mysqli.php';
require '../../../../pages/assets/libs/PHPMailer/src/PHPMailer.php';
require '../../../../pages/assets/libs/PHPMailer/src/SMTP.php'; 
require '../../../../pages/assets/libs/PHPMailer/src/Exception.php'; 

if(isset($_POST['addAccount'])){

    //Get form Data

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['newUsername'];
    $email = $_POST['newEmail'];
    $loginStatus = 0;

    //Sanitize form data

    $firstName = $connection->real_escape_string($firstName);
    $lastName = $connection->real_escape_string($lastName);
    $username = $connection->real_escape_string($username);
    $email = $connection->real_escape_string($email);

    $fullName = $firstName.' '.$lastName;

    //Set last name as default password

    $password = password_hash($lastName, PASSWORD_DEFAULT);

    //Generate verification key

    $vkey = md5(time().$email);
    $verified = 0;

    $query="INSERT INTO tbl_admin(`username`, `password`, `name`, `email`, `verification_key`, `verified`, `login_status`) VALUES('$username', '$password', '$fullName', '$email', '$vkey', '$verified', '$loginStatus')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        sleep(1);

        //Initialize PHPMailer

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = "1800638@lnu.edu.ph";
        $mail->Password = "09041999";
        $mail->Subject = "Activate LNU-SAIS Administrator Account";
        $mail->setFrom("lnu.admissionsoffice@lnu.edu.ph");

        //Initialize email body

        $mail->isHTML(true);
        $mail->From = "lnu.admissionsoffice@lnu.edu.ph";
        $mail->FromName = "<no-reply-lnu.admissionsoffice@lnu.edu.ph>";
        $mail->addAddress($email);
        $mail->addEmbeddedImage('../../../../pages/assets/images/logo.png', 'lnu_logo');
        $mail->Body = "

            <div class='email-body' style=' height: auto; width: auto; background-color: #F2F2F2;'>
                <div class='email-logo-container' align='center' style='height: auto; width: auto; padding: 15px;
                background-color: #FFFFFF;'>
                    <img src='cid:lnu_logo' class='email-header-logo' alt='lnu-logo' style='height: auto;
                    width: 250px;'>
                </div>
                <div class='row' style='margin: 0px;'>
                    <div class='col-md-3'></div>
                    <div class='col-md-6 email-content' style='height: auto; width: auto; margin-top: 10px; padding: 20px;
                    background-color: #FFFFFF; box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.05);'>
                    <p class='letter-header' style='font-size: 30px; font-weight: 300; color: #A2A2A2;'>Administrator Account Activation</p>
                    <hr class='default-divider ml-auto' style='background-color: #A2A2A2;'>
                    <p style='font-weight: 600;'>Greetings! $email <br>You may now activate your LNU-SAIS Administrator Account</p>
                    <p>Please use the following default user credentials upon activation:</p>
                    <p style='margin-bottom: 5px;'><b>Username: $username</b></p>
                    <p><b>Password: $lastName</b></p>
                    <p style='text-align: justify;'>To activate your administrator account, please click your link provided below</p>
                    <p style='text-align: justify;'>Sincerely,</p>
                    <p style='text-align: justify; font-weight: 600;'>Admissions Office | Leyte Normal University</p>
                    <hr class='default-divider ml-auto' style='background-color: #A2A2A2;'>
                        <a href='http://localhost/lnu-sais/staff/admin/be/account_admin/verify.php?verification_key=$vkey'>Activate My Account</a>
                    <hr class='default-divider ml-auto' style='background-color: #A2A2A2;'>
                    <p style='text-align: center;'><b><i>Note: Inactivated accounts will not be allowed to log-in to the system. <br>We also advise you to change your password immediately on first login</i></b></p>
                    <p style='text-align: center;'><i>For more information, kindly contact the university MIS office or the Admissions Office</i></p>
                    <p style='font-size: 12px; text-align: center'><i>(This is a system generated email. Do not reply.)</i></p>
                    <p class='letter-footer' style='font-size: 10px; letter-spacing: 3px; color: #A2A2A2; text-align: center;'>
                        POWERED BY LNU SAIS V1.0.0
                    </p>
                    </div>   
                    <div class='col-md-3'></div> 
                </div>       
            </div>

        ";

        if($mail->Send()){
            echo '
            <script>

                $(document).ready(function(){

                    Swal.fire({

                        icon: "success",
                        title: "An activation email was sent to the indicated email address!",
                        showConfirmButton: false,
                        timer: 3000

                    }).then(function(){

                        window.location.replace("../../account_admin.php");

                    });

                });

            </script>

            ';
        }
    
    }
    else{
        echo '<script> alert("Error adding account");</script>';
        echo mysqli_error($connection);
    }
}


?>
