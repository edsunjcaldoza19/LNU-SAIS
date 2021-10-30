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
                    <div class="block-header">
                        <p class="page-header">Qualified Applicants</p>
                        <p class="page-subheader">Check/export list of qualified applicants</p>
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="table-subheader">Admission Qualifiers Masterlist</p>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Applicant Name</th>
                                            <th>Preferred Program</th>
                                            <th>Entry Type</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant
                                            LEFT JOIN tbl_applicant_account ON tbl_applicant_account.id = tbl_applicant.applicant_account_id
                                            LEFT JOIN tbl_course ON tbl_course.id=tbl_applicant.course_id
                                            WHERE `form_status`='Approved' AND `exam_status`='Qualified'
                                            AND `interview_status`='Qualified' AND `admission_status`='Approved'");
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
                                            <td><?php echo $fetch['mobile_number']; ?></td>
                                            <td><?php echo $fetch['entry']; ?></td>
                                            
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
    <?php include 'includes/logout_modal.php';?>
    <?php include 'includes/scripts.php';?>
</body>

</html>
