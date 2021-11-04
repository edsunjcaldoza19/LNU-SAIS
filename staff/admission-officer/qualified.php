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
                        <p class="page-header">Qualified Student Applicants</p>
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
                                            <th>Entry Type</th>
                                            <th>First Choice</th>
                                            <th>Status</th>
                                            <th>Second Choice</th>
                                            <th>Status</th>
                                            <th>Notified</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant
                                            LEFT JOIN tbl_applicant_account ON tbl_applicant_account.id = tbl_applicant.applicant_account_id
                                            WHERE `form_status`='Approved' AND `exam_status`='Qualified'
                                            AND `interview_status`='Qualified' AND ((`approved_first_choice` = 1 AND `approved_second_choice` = 0) OR (`approved_first_choice` = 0 AND `approved_second_choice` = 1) OR (`approved_first_choice` = 1 OR `approved_second_choice` = 1) OR (`approved_first_choice` = 1 OR `approved_second_choice` = 3) OR (`approved_first_choice` = 3 OR `approved_second_choice` = 1))");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){

                                                //fetch first and second choice

                                                $firstChoice = $fetch['program_first_choice'];
                                                $secondChoice = $fetch['program_second_choice'];

                                                $sql1 = $conn->prepare("SELECT * FROM `tbl_course` WHERE `course_id` = '$firstChoice'");
                                                $sql1->execute();

                                                $sql2 = $conn->prepare("SELECT * FROM `tbl_course` WHERE `course_id` = '$secondChoice'");
                                                $sql2->execute();

                                                while($fetch1 = $sql1->fetch()){
                                                    while($fetch2 = $sql2->fetch()){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    echo $fetch['last_name'].', '.$fetch['first_name'].' '.$fetch['middle_name'];
                                                ?>
                                            </td>
                                            <td><?php echo $fetch['entry']; ?></td>
                                            <td>
                                                <?php
                                                    echo $fetch1['course_name'].' ('.$fetch1['course_acronym'].')';
                                                ?>  
                                            </td>
                                            <td>
                                                <?php
                                                    if($fetch['approved_first_choice'] == 1){
                                                        echo '<p class="label-blue">Approved</p>';
                                                    }else if($fetch['approved_first_choice'] == 2){
                                                        echo '<p class="label-blue">Disapproved</p>';
                                                    }else if($fetch['approved_first_choice'] == 3){
                                                        echo '<p class="label-orange">Waitlisted</p>';
                                                    }
                                                ?>  
                                            </td>
                                            <td>
                                                <?php
                                                    echo $fetch2['course_name'].' ('.$fetch2['course_acronym'].')';
                                                ?>    
                                            </td>
                                            <td>
                                                <?php
                                                    if($fetch['approved_second_choice'] == 1){
                                                        echo '<p class="label-blue">Approved</p>';
                                                    }else if($fetch['approved_second_choice'] == 2){
                                                        echo '<p class="label-blue">Disapproved</p>';
                                                    }else if($fetch['approved_second_choice'] == 3){
                                                        echo '<p class="label-orange">Waitlisted</p>';
                                                    }
                                                ?>  
                                            </td>
                                            <td>
                                                <?php
                                                    if($fetch['notified'] == 0){
                                                        echo '<p class="label-red">Pending</p>';
                                                    }else if($fetch['notified'] == 1){
                                                        echo '<p class="label-green">Done</p>';
                                                    }
                                                ?>  
                                            </td>
                                            <td style="text-align: center;">
                                                <button class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#notify<?php echo $fetch['id']?>"><i class="material-icons">notify</i></button>
                                            </td>
                                            
                                        <?php
                                            include 'be/notify/notifyModal.php';
                                                }
                                            }
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
