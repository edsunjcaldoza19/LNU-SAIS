<?php

require '../database/db_mysqli.php';

if(isset($_POST['add'])){

    try{

        /* Add a new room to the database */

        $name = $_POST['name'];
        $acronym = $_POST['acronym'];

        $query="INSERT INTO tbl_department(`dept_name`, `dept_acronym`) VALUES('$name', '$acronym')";
        $query_run = mysqli_query($connection, $query);

        if($query_run){
            sleep(2);
            header('location:../../pages/department.php');
        }
        else{
            echo '<script> alert("Data not Saved");</script>';
        }
    }catch(exception $e){
        echo 'Error: '.$e->getErrorMessage();

    }

}

?>
