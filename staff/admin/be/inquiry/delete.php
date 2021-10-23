<?php

require '../database/db_mysqli.php';

try{

    if(isset($_POST['deleteFeedback'])){

        $id = $_POST['id'];

        $query="DELETE FROM tbl_feedback WHERE `id` = '$id'";
        $query_run = mysqli_query($connection, $query);

        if($query){
            
            echo '<script> alert("Data deleted");</script>';
            sleep(2);
            header('location:../../feedback.php');

        }
        else{
            echo '<script> alert("Data not deleted");</script>';
        }
    }      

}catch(exception $e){
        echo 'Error: '.$e->getErrorMessage();

    }

?>
