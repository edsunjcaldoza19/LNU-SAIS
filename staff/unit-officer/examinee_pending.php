<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html>

<?php
    include 'includes/header.php';
    include 'includes/topbar.php';
?>
    <section>
        <?php
            include 'includes/left_sidebar.php';
            include 'includes/right_sidebar.php';
        ?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <?php include 'includes/breadcrumbs_applicant.php';?>
                    <div class="card">
                        <div class="header">
                            <h2>
                                APPLICANTS
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Department</th>
                                            <th>Entry</th>
                                            <th>Documents Status</th>
                                            <th>Exam Status</th>
                                            <th>Interview Status</th>
                                            <th>Examination Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Department</th>
                                            <th>Entry</th>
                                            <th>Documents Status</th>
                                            <th>Exam Status</th>
                                            <th>Interview Status</th>
                                            <th>Examination Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant LEFT JOIN tbl_course ON tbl_course.id=tbl_applicant.course_id LEFT JOIN tbl_department ON tbl_department.id=tbl_applicant.dept_id LEFT JOIN tbl_exam_result ON tbl_exam_result.exam_applicant_id=tbl_applicant.applicant_account_id LEFT JOIN tbl_interview ON tbl_interview.interview_applicant_id=tbl_applicant.applicant_account_id");
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
                                                if ($fetch['application_status'] == "approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['application_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['application_status'] == "pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['application_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['application_status'] == "rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['application_status'];?></span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <td><?php 
                                                if ($fetch['exam_remarks'] == "approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['exam_remarks'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['exam_remarks'] == "pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['exam_remarks'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['exam_remarks'] == "rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['exam_remarks'];?></span>
                                                <?php
                                            }
                                            ?>       
                                            </td>
                                            <td><?php 
                                                if ($fetch['interview_status'] == "approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['interview_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['interview_status'] == "pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['interview_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['interview_status'] == "rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['interview_status'];?></span>
                                                <?php
                                            }
                                            ?>       
                                            </td>
                                            <td><?php 
                                                if ($fetch['admission_status'] == "approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['admission_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['admission_status'] == "pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['admission_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['admission_status'] == "rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['admission_status'];?></span>
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
     
    <?php include 'includes/scripts.php';?>
</body>

</html>
