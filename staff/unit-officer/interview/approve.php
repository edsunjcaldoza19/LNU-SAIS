<?php
    require_once '../be/database/db_pdo.php';
    
    if(ISSET($_POST['approve'])){
        try{
            $id = $_POST['id'];
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `tbl_applicant`SET `admission_status` = 'approved' WHERE `applicant_account_id` = '$id'";
            $conn->exec($sql);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql1 = "UPDATE `tbl_interview`SET `interview_status` = 'approved' WHERE `interview_applicant_id` = '$id'";
            $conn->exec($sql1);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql2 = "UPDATE `tbl_exam_result`SET `exam_remarks` = 'approved' WHERE `exam_applicant_id` = '$id'";
            $conn->exec($sql2);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
        $conn = null;
        header('location:../interview_pending.php');
    }
?>