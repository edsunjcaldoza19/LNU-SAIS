<?php
    require_once '../be/database/db_pdo.php';
    
    if(ISSET($_POST['reject'])){
        try{
            $id = $_POST['id'];
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `tbl_applicant`SET `interview_status` = 'rejected', `application_status` = 'rejected' WHERE `id` = '$id'";
            $conn->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
        $conn = null;
        header('location:../interview_pending.php');
    }
?>