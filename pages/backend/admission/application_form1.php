<?php

require '../config/db_mysqli.php';
require '../config/db_pdo.php';

if(isset($_POST['btnNext'])){

    try{

        /* Add a new Applicant to the database [Application Form 1] */
        //pathinfo
		$image=$_FILES['image']['name'];
		$extension = pathinfo($image, PATHINFO_EXTENSION);
		$random=rand(0,100000);
		$rename = 'IMG_APPLICANT'.date('Ymd').$random;
		$newname = $rename.'.'.$extension;
		$target="../../../images/applicant-img/applicant-profile/".$newname;

        $applicant_account_id = $_POST['applicantId'];

        $academic_year = $_POST['academicYear'];
        $semester = $_POST['cbSemester'];
        $first_choice = $_POST['cbFirstChoice'];
        $second_choice = $_POST['cbSecondChoice'];
        $height_feet = $_POST['heightFeet'];
        $height_inch = $_POST['heightInch'];
        $weight = $_POST['tbWeight'];
        $civil_status = $_POST['cbCivilStatus'];
        $place_birth = $_POST['tbPlaceOfBirth'];
        $citizenship = $_POST['tbCitizenship'];
        $address = $_POST['tbAddress'];
        $mailing_address = $_POST['tbMailingAddress'];
        $religion = $_POST['tbReligion'];
        $mobile_number = $_POST['tbMobileNumber'];
        $father_name = $_POST['tbFatherName'];
        $father_citizenship = $_POST['tbFatherCitizenship'];
        $father_contact = $_POST['tbFatherContact'];
        $father_email = $_POST['tbFatherEmail'];
        $father_occupation = $_POST['tbFatherOccupation'];
        $father_employer = $_POST['tbFatherEmployer'];
        $mother_name = $_POST['tbMotherName'];
        $mother_citizenship = $_POST['tbMotherCitizenship'];
        $mother_contact = $_POST['tbMotherContact'];
        $mother_email = $_POST['tbMotherEmail'];
        $mother_occupation = $_POST['tbMotherOccupation'];
        $mother_employer = $_POST['tbMotherEmployer'];
        $guardian_name = $_POST['tbGuardianName'];
        $guardian_citizenship = $_POST['tbGuardianCitizenship'];
        $guardian_contact = $_POST['tbGuardianContact'];
        $guardian_email = $_POST['tbGuardianEmail'];
        $guardian_occupation = $_POST['tbGuardianOccupation'];
        $guardian_employer = $_POST['tbGuardianEmployer'];
        $status = "Pending";
        $timestamp = "N/A";

        $query="UPDATE `tbl_applicant` SET `school_year_id`='$academic_year',`applicant_picture`='$newname', 
        `semester`='$semester',`program_first_choice`='$first_choice',`program_second_choice`='$second_choice', 
        `course_id`='$first_choice',`height_feet`='$height_feet',`height_inches`='$height_inch',`weight`='$weight', 
        `civil_status`='$civil_status',`place_birth`='$place_birth',`citizenship`='$citizenship',`address`='$address', 
        `mailing_address`='$mailing_address',`religion`='$religion',`mobile_number`='$mobile_number',`father_name`='$father_name', 
        `father_citizenship`='$father_citizenship',`father_contact`='$father_contact',`father_email`='$father_email', 
        `father_occupation`='$father_occupation',`father_employer_address`='$father_employer',`mother_name`='$mother_name',
        `mother_citizenship`='$mother_citizenship',`mother_contact`='$mother_contact',`mother_email`='$mother_email',
        `mother_occupation`='$mother_occupation',`mother_employer_address`='$mother_employer',`guardian_name`='$guardian_name',
        `guardian_citizenship`='$guardian_citizenship',`guardian_contact`='$guardian_contact',`guardian_email`='$guardian_email',
        `guardian_occupation`='$guardian_occupation',`guardian_employer_address`='$guardian_employer',`form_status`='$status', 
        `fs_timestamp`='$timestamp',`exam_status`='$status',`es_timestamp`='$timestamp',`interview_status`='$status', 
        `is_timestamp`='$timestamp',`admission_status`='$status',`as_timestamp`='$timestamp'
        WHERE `applicant_account_id` = '$applicant_account_id'";

        $query2="INSERT INTO `tbl_interview`(`interview_applicant_id`)
        VALUES ('$applicant_account_id')";
        $query3="INSERT INTO `tbl_exam_result`(`exam_applicant_id`)
        VALUES ('$applicant_account_id')";

        $query_run = mysqli_query($connection, $query);
        $query_run2 = mysqli_query($connection, $query2);
        $query_run3 = mysqli_query($connection, $query3);

        //Move to path
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg="Image uploaded successfully";
        }

        if($query_run && $query_run2 && $query_run3){

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE `tbl_applicant_account` SET `form1_progress` = 'Done' WHERE `id` = '$applicant_account_id'";
            $conn->exec($sql);

            header('location:../../student/admission_procedures/application_form2.php');

        }
        else{
            echo '<script> alert("Data not Saved");</script>';
        }

    }catch(exception $e){
        echo 'Error: '.$e->getMessage();

    }

}
?>
