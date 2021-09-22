<?php
    include 'includes/session.php';
    include 'includes/header.php';
    include 'includes/topbar.php';
?>
    <section>

        <?php
        	include 'includes/left_sidebar.php';
            include 'includes/right_sidebar.php';
        ?>
    </section>

    <!-- ## BODY CONTENTS ## -->
    <section class="content">
    	 <?php
                $applicant_id = $_GET['id'];
                require 'be/database/db_pdo.php';
                $sql = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant
                LEFT JOIN tbl_course ON tbl_course.id=tbl_applicant.program_first_choice
                WHERE tbl_applicant.id = '$applicant_id'");
                $sql->execute();

                $sql2 = $conn->prepare("SELECT *, tbl_applicant.id FROM tbl_applicant
                LEFT JOIN tbl_course ON tbl_course.id=tbl_applicant.program_second_choice
                WHERE tbl_applicant.id = '$applicant_id'");
                $sql2->execute();

                while($fetch = $sql->fetch()){
                    while($fetch2 = $sql2->fetch()){

         ?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12">

                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile" aria-controls="settings" role="tab" data-toggle="tab">Applicant Profile</a></li>
                                    <li role="presentation"><a href="#parent" aria-controls="settings" role="tab" data-toggle="tab">Parent Information</a></li>
                                    <li role="presentation"><a href="#education" aria-controls="settings" role="tab" data-toggle="tab">Educational Background</a></li>
                                     <li role="presentation"><a href="#references" aria-controls="settings" role="tab" data-toggle="tab">References And Other Info</a></li>
                                </ul>


                                <input type="hidden" name="applicantID" value="<?php echo $fetch['id'];?>">
                                <div class="tab-content">
                                    <?php
                                    	include 'applicant-tabs/tab-profile.php';
                                    	include 'applicant-tabs/tab-parent.php';
                                    	include 'applicant-tabs/tab-education.php';
                                    	include 'applicant-tabs/tab-references.php';
                                    ?>
                                </div>

                            </div>
                        </div><!-- ## BODY CLOSING TAG ['TAB GROUP'] ## -->
                    </div>
                </div>
                <!-- ## APPLICANT PROFILE PICTURE ## -->
                <?php include 'applicant-tabs/tab-applicant.php';?>
            </div>
        </div>
        <?php include 'be/applicant-review/approveApplicationModal.php';?>
        <?php include 'be/applicant-review/rejectApplicationModal.php';?>
        <?php
            }
        }
        ?>
    </section>

    <?php
        include 'includes/scripts.php';
    ?>
</body>

</html>
