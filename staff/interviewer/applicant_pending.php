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

            //Fetch academic year//

            $id = $_GET['sy_id'];

            $sql1 = $conn->prepare("SELECT * from `tbl_academic_year` WHERE `id` = $id");
            $sql1->execute();
            $fetch1 = $sql1->fetch();

            $sql2 = $conn->prepare("SELECT * from `tbl_unit` WHERE `id` = ".$unitId."");
            $sql2->execute();
            $fetch2 = $sql2->fetch();

            $sql3 = $conn->prepare("SELECT * from `tbl_course` WHERE `unit_id` = ".$unitId."");
            $sql3->execute();
            while($fetch3 = $sql3->fetch()){
                $courses = $fetch3['course_id'];
            }
        ?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="block-header">
                        <p class="page-header">Pending Applicants</p>
                        <p class="page-subheader">Input ratings for applicants who took the interview</p>
                    </div>
                    <div class="card">
                        <div class="header"> 
                            <p class="table-subheader">Pending Applicants List - Interview (A.Y. <?php echo $fetch1['ay_year']?>)</p>
                            <small><?php echo $fetch2['unit_name']?></small>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Applicant Name</th>
                                            <th>Entry Type</th>
                                            <th>Preferred Program</th>
                                            <th>Interview Date</th>
                                            <th>Interview Time</th>
                                            <th>Interview Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant
                                            LEFT JOIN tbl_applicant_account ON tbl_applicant_account.id = tbl_applicant.applicant_account_id
                                            LEFT JOIN tbl_course ON (tbl_course.course_id=tbl_applicant.program_first_choice OR tbl_course.course_id=tbl_applicant.program_second_choice)
                                            LEFT JOIN tbl_interview ON tbl_interview.interview_applicant_id = tbl_applicant.applicant_account_id
                                            WHERE `form_status`='Approved' AND `exam_status`='Scored'
                                            AND `school_year_id` = $id AND `unit_id` = $unitId
                                            AND ((`interview_status` = 'Pending' AND `program_first_choice` = $courses) OR (`interview_status` = 'Pending' AND `program_second_choice` = $courses))
                                            ");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){

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
                                                    echo $fetch['course_name'].' ('.$fetch['course_acronym'].')';
                                                    if($fetch['course_id'] == $fetch['program_first_choice']){
                                                        echo ' - First Choice';
                                                        $course = $fetch['course_id'];
                                                    }else if($fetch['course_id'] == $fetch['program_second_choice']){
                                                        echo ' - Second Choice';
                                                        $course = $fetch['course_id'];
                                                    }
                                                ?>   
                                            </td>
                                            <td><?php echo $fetch['interview_date']?></td>
                                            <td><?php echo $fetch['interview_time']?></td>
                                            <td align="center">
                                                <?php
                                                    if($fetch['interview_status'] == "Pending"){
                                                        echo '<p class="label-blue">Pending</p>';
                                                    }else if($fetch['interview_status'] == "Qualified"){
                                                        echo '<p class="label-green">Qualified</p>';
                                                    }else if($fetch['interview_status'] == "Unqualified"){
                                                        echo '<p class="label-red">Unqualified</p>';
                                                    }
                                                ?>
                                            </td>
                                            
                                            <td align="center" style="width: 100px;">
                                                <button class="btn bg-orange btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#setSchedule<?php echo $fetch['id']; ?>"><i class="material-icons">alarm_add</i></button>
                                                <button class="btn bg-light-blue btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#updateScore<?php echo $fetch['id']; ?>"><i class="material-icons">edit</i></button>
                                            </td>
                                        <?php
                                            include 'be/applicant_interview/setScheduleModal.php';
                                            include 'be/applicant_interview/updateInterviewScoreModal.php';
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
    <!-- Logout Modal -->
    <?php
        include 'includes/logout_modal.php';
        include 'includes/scripts.php';
    ?>

    <script>
        $("#platform").change(function(){
            if($(this).val() == "Face-to-Face"){
                $("#callLink").hide();
            }
            else if($(this).val() == "Video Call"){
                $("#callLink").show();
            }
        });
    </script>
</body>

</html>
