<?php

require '../database/db_mysqli.php';

if(isset($_POST['add'])){

    try{

        /* Add a new course to the database */

        $name = $_POST['name'];
        $acronym = $_POST['acronym'];
        $deptId = $_POST['deptId'];
        

        $query="INSERT INTO tbl_course(`course_name`, `dept_acronym`, `dept_id`) VALUES('$name', '$acronym', '$deptId')";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            sleep(2);
            header('location:../../pages/course.php');
        }
        else{
            echo '<script> alert("Data not Saved");</script>';
        }
    }catch(exception $e){
        echo 'Error: '.$e->getErrorMessage();

    }

}
?>
