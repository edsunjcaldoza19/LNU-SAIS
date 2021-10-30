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

            //Fetch academic year//

            $id = $_GET['sy_id'];

            $sql1 = $conn->prepare("SELECT * from `tbl_academic_year` WHERE `id` = $id");
            $sql1->execute();
            $fetch1 = $sql1->fetch();
        ?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="block-header">
                        <p class="page-header">Approved Applicants</p>
                        <p class="page-subheader">Inspect approved applicants</p>
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="table-subheader">Approved Applicants List (A.Y. <?php echo $fetch1['ay_year']?>)</p>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Entry Type</th>
                                            <th>Exam Score</th>
                                            <th>Interview Score</th>
                                            <th>Documents Status</th>
                                            <th>Exam Status</th>
                                            <th>Interview Status</th>
                                            <th>Admission</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant
                                            LEFT JOIN tbl_applicant_account ON tbl_applicant_account.id = tbl_applicant.applicant_account_id
                                            LEFT JOIN tbl_course ON tbl_course.id=tbl_applicant.course_id
                                            LEFT JOIN tbl_exam_result ON tbl_exam_result.exam_applicant_id=tbl_applicant.applicant_account_id
                                            LEFT JOIN tbl_interview ON tbl_interview.interview_applicant_id=tbl_applicant.applicant_account_id
                                            WHERE `form_status`='Approved' AND `exam_status`='Approved'
                                            AND `interview_status`='Approved' AND `admission_status`='Approved'
                                            AND `school_year_id` = $id");
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
                                            <td><?php echo $fetch['entry']; ?></td>
                                            <td><?php echo $fetch['exam_score']; ?></td>
                                            <td><?php echo $fetch['interview_rating']; ?></td>
                                            <td><?php
                                                if ($fetch['form_status'] == "Approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['form_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['form_status'] == "Pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['form_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['form_status'] == "Rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['form_status'];?></span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <td><?php
                                                if ($fetch['exam_status'] == "Approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['exam_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['exam_status'] == "Pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['exam_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['exam_status'] == "Rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['exam_status'];?></span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <td><?php
                                                if ($fetch['interview_status'] == "Approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['interview_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['interview_status'] == "Pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['interview_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['interview_status'] == "Rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['interview_status'];?></span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <td><?php
                                                if ($fetch['admission_status'] == "Approved") {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $fetch['admission_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['admission_status'] == "Pending"){
                                                ?>
                                                <span class="label bg-teal"><?php echo $fetch['admission_status'];?></span>
                                                <?php
                                            }
                                            elseif ($fetch['admission_status'] == "Rejected"){
                                                ?>
                                                <span class="label bg-red"><?php echo $fetch['admission_status'];?></span>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <?php
                                            include 'be/applicant-review/approveApplicationModal.php';
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
             <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action = "be/course/add.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Add Course Information</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" placeholder="Course Name" required autofocus>
                                </div>
                            </div>
                             <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="acronym" placeholder="Acronym" required autofocus>
                                </div>
                            </div>
                             <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                <select class="form-control" style="margin-top: 10px;" name="deptId" id="deptId">
                                    <option selected="true" disabled="true">Department</option>
                                    <?php
                                        require 'be/database/db_pdo.php';
                                        $sql = $conn->prepare("SELECT * FROM `tbl_department`");
                                        $sql->execute();

                                        while($fetch = $sql->fetch()){
                                    ?>
                                    <option name="deptId" value="<?php echo $fetch['id'] ?>"><?php echo $fetch['dept_name'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect" name="add" id="add">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        include 'includes/logout_modal.php';
        include 'includes/scripts.php';
    ?>
</body>

</html>
