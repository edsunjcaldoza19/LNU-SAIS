<?php
    include 'includes/session.php';
    include 'includes/header.php';
    include 'includes/topbar.php';
    include 'includes/left_sidebar.php';
?>
    
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-amber">
                        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                        <li class="active"><i class="material-icons">assignment</i> Exams</li>
                    </ol>
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXAM RESULTS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Department</th>
                                            <th>Entry</th>
                                            <th width="20%">Documents Checked</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Department</th>
                                            <th>Entry</th>
                                            <th width="20%">Documents Checked</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant LEFT JOIN tbl_course ON tbl_course.id=tbl_applicant.course_id LEFT JOIN tbl_department ON tbl_department.id=tbl_applicant.dept_id");
                                            $sql->execute();
                                            
                                            while($fetch = $sql->fetch()){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    echo $fetch['last_name'];
                                                    echo ', ';
                                                    echo $fetch['middle_name'];
                                                    echo ' ';
                                                    echo $fetch['first_name'];
                                                ?></td>
                                            <td><?php
                                                    echo $fetch['course_name'];
                                                    echo ' - ';
                                                    echo $fetch['course_acronym'];
                                            ?></td>
                                            <td><?php
                                                    echo $fetch['dept_name'];
                                                    echo ' - ';
                                                    echo $fetch['dept_acronym'];
                                            ?></td>
                                            <td><?php echo $fetch['entry']; ?></td>
                                            <td><?php 
                                                if ($fetch['documents_status'] == "approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['documents_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['documents_status'] == "pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['documents_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['documents_status'] == "rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['documents_status'];?></span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <?php
                                            }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
<?php include 'includes/modals.php';?>
 <?php 
        include 'includes/scripts.php';
    ?>

</body>

</html>
