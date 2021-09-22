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
                $sql = $conn->prepare("SELECT * FROM `tbl_applicant` where `id` = '$applicant_id'");
                $sql->execute();
                while($fetch = $sql->fetch()){
         ?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-8">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile" aria-controls="settings" role="tab" data-toggle="tab">Applicant Profile</a></li>
                                     <li role="presentation"><a href="#references" aria-controls="settings" role="tab" data-toggle="tab">References And Other Info</a></li>
                                </ul>

                               
                                <input type="hidden" name="applicantID" value="<?php echo $fetch['id'];?>">
                                <div class="tab-content">
                                    <!--- ## START APPLICANT PROFILE --->
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile">
                                        <div class="form-horizontal">
                                            <h2>ENTRY</h2>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label for="Entry Status">Entry</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Entry" value="<?php
                                                       echo $fetch['entry'];?>" disabled="true">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <label for="Semester" class="control-label">Semester</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester" value="<?php echo $fetch['semester'];?>" disabled="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <h2>PROFILE</h2>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label>Name</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="name"
                                                        value="<?php
                                                            echo $fetch['last_name'];
                                                            echo ", ";
                                                            echo $fetch['first_name'];
                                                            echo " ";
                                                            echo $fetch['middle_name'];
                                                   ?>" disabled="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label>Mailing Address</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="mailing_address"
                                                        value="<?php echo $fetch['mailing_address'];?>" disabled="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--- ## END PROFILE --->
                                </div>
                               
                            </div> 
                        </div><!-- ## BODY CLOSING TAG ['TAB GROUP'] ## -->
                    </div>
                </div>
                <!-- ## APPLICANT PROFILE PICTURE ## -->
                <div class="col-xs-12 col-sm-4">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <?php
                                $image = (!empty($fetch['applicant_picture'])) ? '../../images/applicant-img/'.$fetch['applicant_picture'] : '../../images/user-lg.jpg';
                            ?>
                            <div class="image-area">
                                <?php echo "<img src='".$image."'  width='120px' height='180px'";?>
                            </div>
                            <div class="content-area">
                                <h3><?php
                                echo $fetch['last_name'];
                                echo ", ";
                                echo $fetch['middle_name'];
                                echo " ";
                                echo $fetch['first_name'];
                                ?></h3>
                                <p><?php echo $fetch['age'];?> years old</p>
                                <p><?php echo $fetch['program_first_choice'];?> - Applicant</p>
                            </div>

                        </div>
                         <div class="body">
                                <button type="submit" data-toggle="modal" data-target="#approve<?php echo $fetch['id']?>" class="btn btn-block btn-lg btn-success waves-effect"><i class="material-icons">check</i>APPROVE</button>
                                <button type="submit" data-toggle="modal" data-target="#reject<?php echo $fetch['id']?>"class="btn btn-block btn-lg bg-red waves-effect"><i class="material-icons">close</i>REJECT</button>
                                </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Education
                                    </div>
                                    <div class="content">
                                        Kinder: <?php echo $fetch['kinder_name'];?> <br>
                                        Elementary: <?php echo $fetch['elem_name'];?> <br>
                                        Junior HS: <?php echo $fetch['jhs_name'];?> <br>
                                        Senior HS: <?php echo $fetch['shs_name'];?> <br>
                                        College: <?php echo $fetch['college_name'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Address
                                    </div>
                                    <div class="content">
                                        <?php echo $fetch['address'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Personal Statement
                                    </div>
                                    <div class="content">
                                        <?php echo $fetch['personal_statement'];?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'be/applicant-review/approveApplicationModal.php';?>
        <?php include 'be/applicant-review/rejectApplicationModal.php';?>
        <?php 
            }
        ?>
    </section>

    <?php 
        include 'includes/scripts.php';
    ?>
</body>

</html>
