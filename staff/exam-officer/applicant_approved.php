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
                                <?php
                                $sy_id = $_GET['sy_id'];
                                require 'be/database/db_pdo.php';
                                $sqlAY = $conn->prepare("SELECT * FROM `tbl_academic_year` WHERE `id` = $sy_id");
                                $sqlAY->execute();
                                $fetchAY = $sqlAY->fetch();
                                ?>
                                APPLICANTS FOR A.Y. <?php echo $fetchAY['ay_year']; ?>
                            </h2>
                            <p>This table shows the applicants who already have approved documents and already taken the entrance exam</p>
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
                                            <th>Entry Type</th>
                                            <th>Documents Status</th>
                                            <th>Exam Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant
                                            LEFT JOIN tbl_applicant_account ON tbl_applicant_account.id = tbl_applicant.applicant_account_id
                                            LEFT JOIN tbl_course ON tbl_course.id=tbl_applicant.course_id
                                            WHERE `form_status`='Approved' AND `exam_status`='Approved' AND `school_year_id` = $sy_id");
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
                                            <?php
                                            include 'be/applicant_exam/updateScoreModal.php';
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
