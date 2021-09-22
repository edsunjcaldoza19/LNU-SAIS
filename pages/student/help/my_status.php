<?php

	$email = '';
	require '../../backend/auth/check_token.php';

	$id = $fetch['id'];

	try{

		$sql = $conn->prepare("SELECT * FROM tbl_applicant WHERE `applicant_account_id` = '$id'");
    	$sql->execute();
    	$application = $sql->fetch();

    	if($application == ''){

    		$application['first_name'] = '--';
    		$application['middle_name'] = '--';
    		$application['last_name'] = '--';
    		$application['entry'] = 'N/A';
    		$application['application_status'] = 'Pending';
    		$application['as_timestamp'] = 'N/A';

    	}

    	if($application['application_status'] == 'Pending'){

    		$application['as_timestamp'] = 'N/A';

    	}

	}catch(exception $e){
		echo 'Error: '.$e->getMessage();
	}

	try{

		$sql = $conn->prepare("SELECT * FROM tbl_exam_result WHERE `exam_applicant_id` = '$id'");
    	$sql->execute();
    	$exam = $sql->fetch();

    	if($exam == ''){

    		$exam['exam_remarks'] = 'Pending';
    		$exam['er_timestamp'] = 'N/A';

    	}

	}catch(exception $e){
		echo 'Error: '.$e->getMessage();
	}

	try{

		$sql = $conn->prepare("SELECT * FROM tbl_interview WHERE `interview_applicant_id` = '$id'");
    	$sql->execute();
    	$interview = $sql->fetch();

    	if($interview == ''){

    		$interview['interview_status'] = 'Pending';
    		$interview['i_timestamp'] = 'N/A';

    	}

	}catch(exception $e){
		echo 'Error: '.$e->getMessage();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LNU SAIS | My Status</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Imports third-party CSS libraries -->

		<link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-select/dist/css/bootstrap-select.css">
    	<link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
		<link rel="stylesheet" type="text/css" href="../../assets/libs/font-awesome/css/all.css">

		<!-- Imports default styling -->

		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

		<link rel="shortcut-icon" href="../../assets/images/lnu.ico" type="image/x-icon"/>
  		<link rel="icon" href="../../assets/images/lnu.ico" type="image/x-icon"/>

</head>
<body id="body">

	<nav class="navbar navbar-expand-sm student-navbar-secondary" style="z-index: 3">
		<div class="student-navbar-logo-container secondary">
			<a class="navbar-brand" href="#">
				<img src="../../assets/images/navbar_logo_mobile.png" class="secondary-logo">
			</a>
		</div>
		<div class="student-navbar-hamburger-container">
			<a href="#" id="sidebar-toggle">
				<img src="../../assets/images/navbar_burger_icon.png" class="burger-icon">
			</a>
		</div>
	</nav>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-2" style="padding: 0px;">
				<aside id="sidebar" class="sidebar">
					<div class="student-sidebar-container">
						<div class="student-sidebar-logo-container">
							<img src="../../assets/images/sidebar-logo.png" class="sidebar-logo">
						</div>
						<div class="sidebar-navigation">
							<div class="sidebar-item">
								<i class="fa fa-arrow-circle-left sidebar-navigation-icon" style="color: #C2C2C2;"></i> <a href="../admission_procedures/start.php"
								class="sidebar-link" style="color: #C2C2C2;">Return</a>
							</div>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<p class="sidebar-header">NAVIGATE</p>
							<div class="sidebar-item">
								<i class="far fa-user-circle sidebar-navigation-icon"></i> <a href="javascript:void(0);" class="sidebar-link active">My Status</a>
							</div>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<div class="sidebar-item">
								<i class="far fa-comments sidebar-navigation-icon"></i> <a href="send_feedback.php" class="sidebar-link">Send Feedback</a>
							</div>
						</div>
					</div>
				</aside>
				<aside id="sidebar-hidden" class="sidebar-hidden">
					<div class="student-sidebar-container-hidden">
						<div class="sidebar-navigation">
							<div class="sidebar-item">
								<i class="fa fa-arrow-circle-left sidebar-navigation-icon" style="color: #C2C2C2;"></i> <a href="../admission_procedures/start.php"
								class="sidebar-link" style="color: #C2C2C2;">Return</a>
							</div>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<p class="sidebar-header">NAVIGATE</p>
							<div class="sidebar-item">
								<i class="far fa-user-circle sidebar-navigation-icon"></i> <a href="javascript:void(0);" class="sidebar-link active">My Status</a>
							</div>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<div class="sidebar-item">
								<i class="far fa-comments sidebar-navigation-icon"></i> <a href="send_feedback.php" class="sidebar-link">Send Feedback</a>
							</div>
						</div>
					</div>
				</aside>
			</div>
			<div class="col-md-10">
				<div class="student-page-container">
					<div class="student-account-container">
						<p id="datetime" class="default-datetime">0:00</p>
						<div class="student-account-details">
							<p class="student-account-details-item name"><b>Hi, <?php echo $email ?></b></p>
							<a class="student-account-details-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
						</div>
					</div>
					<div class="student-page-default" id="student-page-default" style="height: 550px; margin-bottom: 20px;">
						<div class="row">
							<div class="col-md-6">
								<img src="../../assets/images/status-image.png" class="status-placeholder-image">
							</div>
							<div class="col-md-6" style="padding: 0px 30px 0px 30px; overflow: hidden;">
								<p class="exam-placeholder-header" style="font-size: 30px; margin-top: 30px;">
									Monitor Admission Status
								</p>
								<p class="exam-placeholder-subheader" style="font-size: 15px; margin-top: 5px; margin-bottom: 5px;">
									Applicant Name:
								</p>
								<p class="default-interface-text name">
									<?php echo $application['first_name'] ?> <?php echo $application['middle_name'] ?> <?php echo $application['last_name'] ?> (<?php echo $application['entry'] ?>)
								</p>
								<hr class="default-divider ml-auto" style="margin: 5px;">
								<div id="status-labels" style="overflow-x: auto">
									<p class="default-interface-subheader">
										Filling-out of Application Form
									</p>
									<p class="default-interface-text">
										<?php
											if($fetch['form2_progress'] == 'Not Started'){
												echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
											}else{
												echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
											}
										?>
										<?php echo $fetch['form2_progress'] ?> (<?php echo $fetch['fp_timestamp'] ?>)
									</p>
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<p class="default-interface-subheader">
										Application Form Status
									</p>
									<p class="default-interface-text">
										<?php
											if($application['application_status'] == 'Approved'){
												echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
											}else if($application['application_status'] == 'Pending'){
												echo '<i class="far fa-question-circle sidebar-progress-icon"></i>';
											}else{
												echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
											}
										?>
										<?php echo $application['application_status'] ?> (<?php echo $application['as_timestamp'] ?>)
									</p>
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<p class="default-interface-subheader">
										Entrance Examination
									</p>
									<p class="default-interface-text">
										<?php
											if($fetch['examination_progress'] == 'Not Started'){
												echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
											}else{
												echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
											}
										?>
										<?php echo $fetch['examination_progress'] ?> (<?php echo $fetch['ep_timestamp'] ?>)
									</p>
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<p class="default-interface-subheader">
										Entrance Examination Status
									</p>
									<p class="default-interface-text">
										<?php
											if($exam['exam_remarks'] == 'Passed'){
												echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
											}else if($exam['exam_remarks'] == 'Pending'){
												echo '<i class="far fa-question-circle sidebar-progress-icon"></i>';
											}else{
												echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
											}
										?>
										<?php echo $exam['exam_remarks'] ?> (<?php echo $exam['er_timestamp'] ?>)
									</p>
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<p class="default-interface-subheader">
										Interview
									</p>
									<p class="default-interface-text">
										<?php
											if($fetch['interview_progress'] == 'Not Started'){
												echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
											}else{
												echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
											}
										?>
										<?php echo $fetch['interview_progress'] ?> (<?php echo $fetch['ip_timestamp'] ?>)
									</p>
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<p class="default-interface-subheader">
										Interview Status
									</p>
									<p class="default-interface-text">
										<?php
											if($interview['interview_status'] == 'Passed'){
												echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
											}else if($interview['interview_status'] == 'Pending'){
												echo '<i class="far fa-question-circle sidebar-progress-icon"></i>';
											}else{
												echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
											}
										?>
										<?php echo $interview['interview_status'] ?> (<?php echo $interview['i_timestamp'] ?>)
									</p>
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<p class="default-interface-subheader">
										Admission Status
									</p>
									<p class="default-interface-text">
										<?php
											if($fetch['admission_status'] == 'Approved'){
												echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
											}else if($fetch['admission_status'] == 'Pending'){
												echo '<i class="far fa-question-circle sidebar-progress-icon"></i>';
											}else{
												echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
											}
										?>
										<?php echo $fetch['admission_status'] ?> (<?php echo $fetch['as_timestamp'] ?>)
									</p>
									<hr class="default-divider ml-auto" style="margin: 10px;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
       			<div class="modal-header">
       			  <p class="modal-header-text">Confirm Logout?</p>
       			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
       			    <span aria-hidden="true">×</span>
       			  </button>
       			</div>
       			<div class="modal-body">
       				<p>Are you sure you want to logout?</p>
      			</div>
      			<div class="modal-footer" style="padding: 10px;">
       			  <a class="default-button" href="../../backend/auth/student_logout.php" style="padding: 5px 10px 5px 10px; position: relative;">Confirm</a>
       			</div>
    		</div>
  		</div>
  	</div>

	<footer class="footer-subfooter" style="bottom: 0;">
		<p class="subfooter-text">
			All Rights Reserved - Leyte Normal University | Maintained by MIS Office
		</p>
	</footer>

	<script src="../../assets/libs/jquery/jquery.min.js"></script>
	<script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../../assets/libs/bootstrap-select/dist/js/bootstrap-select.js"></script>
	<script src="../../assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="../../assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../../assets/libs/node-waves/waves.js"></script>
    <script src="../../assets/js/template/admin.js"></script>
    <script src="../../assets/js/template/demo.js"></script>

	<!-- Additional JS codes -->

	<script>

		var toggleClicks = 0;

		$(document).ready(function () {
        	showDateTime();
    	});

		$('#sidebar-toggle').click(function () {

			toggleClicks++;

			if(toggleClicks %2 == 0){
				closeSidebar();
			}else{
				openSidebar();
			}

    	});

		$(function(){
			$('#status-labels').slimScroll({
				height: '350px'
			});
			$('#student-page-default').slimScroll({
				height: '550px'
			});
		});


		function openSidebar(){

			document.getElementById("sidebar-hidden").style.width = "300px";
			document.getElementById("body").style.overflowY = "hidden";

		}

		function closeSidebar(){

			document.getElementById("sidebar-hidden").style.width = "0px";
			document.getElementById("body").style.overflowY = "auto";

		}

		function showDateTime(){

  			var dt = new Date();

  			document.getElementById("datetime").innerHTML = (("0"+(dt.getMonth()+1)).slice(-2)) + "/" + (("0"+dt.getDate()).slice(-2)) + "/" + (dt.getFullYear()) + " | " + (("0" + dt.getHours()).slice(-2)) + ":" + (("0" + dt.getMinutes()).slice(-2)) + ":" + (("0" + dt.getSeconds()).slice(-2));

  			setTimeout("showDateTime()", 1000);

  		}

  		var previewImage = function(event){
            var output = document.getElementById("preview");
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function(){
                URL.revokeObjectURL(output.src)
            }
        }


	</script>

</body>
</html>