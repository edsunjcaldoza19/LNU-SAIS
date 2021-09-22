<?php

require '../database/db_mysqli.php';

if(isset($_POST['addExam'])){

    try{

        /* Add a new Exam to the database */

        $timeLimit = $_POST['timeLimit'];
        $questionLimit = $_POST['questionLimit'];
        $examTitle = $_POST['examTitle'];
        $examDesc = $_POST['examDesc'];
       
        
        
            $query="INSERT INTO tbl_exam(`exam_title`, `exam_time_limit`, `exam_quest_limit`, `exam_description`) VALUES('$examTitle', '$timeLimit', '$questionLimit', '$examDesc')";
            $query_run = mysqli_query($connection, $query);

            if($query_run){
                sleep(2);
                header('location:../../exam_manage.php');
            }
            else{
                echo '<script> alert("Data not Saved");</script>';
            }

        
    }catch(exception $e){
        echo 'Error: '.$e->getErrorMessage();

    }

}

?>
