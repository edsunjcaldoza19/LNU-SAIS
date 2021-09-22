<?php
    require_once '../be/database/db_pdo.php';
    
    if(ISSET($_POST['update'])){
        try{
            $id = $_POST['id'];
            $link = $_POST['interview-link'];
            $date = $_POST['interview-date'];
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `tbl_interview`SET `interview_link` = '$link', `interview_date` = '$date' WHERE `interview_applicant_id` = '$id'";
            $conn->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
        $conn = null;
        header('location:../interview_pending.php');
    }
?>