<?php

	$email = '';
	require '../../backend/auth/check_token.php';

	if(isset($_SESSION['token'])){

		$sql = $conn->prepare("SELECT * from `tbl_applicant_account` WHERE `session_token` = '$token'");
		$sql->execute();

		if($fetch = $sql->fetch()){

			$form1_status = $fetch['form1_progress'];

		}

		if($form1_status == 'Done'){

			echo '

			<script>

				window.location.replace("application_form2.php");

			</script>

			';
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admission Procedure - Form 1 </title>

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
							<p class="sidebar-header">NAVIGATE</p>
							<div class="sidebar-item">
								<i class="far fa-user-circle sidebar-navigation-icon"></i> <a href="../help/my_status.php" class="sidebar-link">My Status</a>
							</div>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<div class="sidebar-item">
								<i class="far fa-comments sidebar-navigation-icon"></i> <a href="../help/send_feedback.php" class="sidebar-link">Send Feedback</a>
							</div>
						</div>
						<div class="sidebar-progress">
							<a class="sidebar-header" href="#" data-toggle="collapse" data-target="#collapse-progress">PROGRESS CHECKLIST <i class="fas fa-caret-down"></i></a>
							<div class="collapse show" id="collapse-progress">
								<div class="sidebar-item active">
									<i class="fas fa-arrow-circle-right sidebar-progress-icon active"></i> Application Form (1/2)
								</div>
								<div class="sidebar-item">
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<i class="far fa-times-circle sidebar-progress-icon"></i> Application Form (2/2)
								</div>
								<div class="sidebar-item">
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<i class="far fa-times-circle sidebar-progress-icon"></i> Entrance Examination
								</div>
								<div class="sidebar-item">
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<i class="far fa-times-circle sidebar-progress-icon"></i> Interview/Evaluation
								</div>
							</div>
						</div>

					</div>
				</aside>
				<aside id="sidebar-hidden" class="sidebar-hidden">
					<div class="student-sidebar-container-hidden">
						<div class="sidebar-navigation">
							<p class="sidebar-header">NAVIGATE</p>
							<div class="sidebar-item">
								<i class="far fa-user-circle sidebar-navigation-icon"></i> <a href="../help/my_status.php" class="sidebar-link">My Status</a>
							</div>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<div class="sidebar-item">
								<i class="far fa-comments sidebar-navigation-icon"></i> <a href="../help/send_feedback.php" class="sidebar-link">Send Feedback</a>
							</div>
						</div>
						<div class="sidebar-progress">
							<a class="sidebar-header" href="#" data-toggle="collapse" data-target="#collapse-progress-hidden">PROGRESS CHECKLIST <i class="fas fa-caret-down"></i></a>
							<div class="collapse show" id="collapse-progress-hidden">
								<div class="sidebar-item active">
									<i class="fas fa-arrow-circle-right sidebar-progress-icon active"></i> Application Form (1/2)
								</div>
								<div class="sidebar-item">
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<i class="far fa-times-circle sidebar-progress-icon"></i> Application Form (2/2)
								</div>
								<div class="sidebar-item">
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<i class="far fa-times-circle sidebar-progress-icon"></i> Entrance Examination
								</div>
								<div class="sidebar-item">
									<hr class="default-divider ml-auto" style="margin: 10px;">
									<i class="far fa-times-circle sidebar-progress-icon"></i> Interview/Evaluation
								</div>
							</div>
						</div>
					</div>
				</aside>
			</div>
			<div class="col-md-10">
				<div class="student-page-container">
				<form method="POST" action="../../backend/admission/application_form1.php" enctype="multipart/form-data">
					<div class="student-account-container">
						<p id="datetime" class="default-datetime">0:00</p>
						<div class="student-account-details">
							<p class="student-account-details-item name"><b>Hi, <?php echo $email ?></b></p>
							<a class="student-account-details-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
						</div>
					</div>
					<div class="student-page-default" style="height: 230px; margin-bottom: 20px;">
						<p class="student-page-default-header">APPLICATION DETAILS</p>
						<div class="row">
							<div class="col-md-2">
								<input type="hidden" name="id" value="<?php echo $fetch['id'] ?>">
								<p style="position: absolute; font-size: 12px; text-align: center; margin: 55px 0px 0px 20px;">Image will be <br> previewed here</p>
								<img id="preview" class="student-page-image-preview" />
							</div>
							<div class="col-md-2" style="padding: 0px;">
								<div class="student-page-upload-text">
									<p style="font-size: 14px; margin-top: 10px;"><strong>Recent Solo Whole-body Picture *</strong> <br>(Plain White Background w/Name Tag):</p>
									<input class="student-page-upload" name="image" type="file" onchange="previewImage(event)" required>
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-6">
										<p class="student-page-label">Entry Status *</p>
										<div class="form-group form-float">
					                        <select class="form-control show-tick" name="cbEntryStatus" id="cbEntryStatus" required>
                                        		<option value="" disabled selected>Select Entry Status</option>
                                        		<option value="Freshmen">Freshmen</option>
                                        		<option value="Transferee">Transferee</option>
                                        		<option value="Re-admission">Re-admission</option>
                                    		</select>
		                    			</div>
		                    			<p class="student-page-label">Semester *</p>
										<div class="form-group form-float">
					                        <select class="form-control show-tick" name="cbSemester" id="cbSemester" required>
                                        		<option value="" disabled selected>Select Semester</option>
                                        		<option value="First Semester">First Semester</option>
                                        		<option value="Second Semester">Second Semester</option>
                                        		<option value="Summer">Summer</option>
                                    		</select>
		                    			</div>
									</div>
									<div class="col-md-6">
		                    			<p class="student-page-label">Program Preference (First Choice) *</p>
										<div class="form-group form-float">
					                        <select class="form-control show-tick" style="margin-top: 10px;" name="cbFirstChoice" id="cbFirstChoice">
		                                    <option selected="true" disabled="true">First Choice</option>
		                                    <?php

		                                        $sql = $conn->prepare("SELECT * FROM `tbl_course`");
		                                        $sql->execute();

		                                        while($fetch = $sql->fetch()){
		                                    ?>
		                                    <option name="cbFirstChoice" value="<?php echo $fetch['id'] ?>"><?php echo $fetch['course_name'] ?></option>
		                                    <?php
		                                        }
		                                    ?>
		                                </select>
		                    			</div>
		                    			<p class="student-page-label">Program Preference (Second Choice) *</p>
										<div class="form-group form-float">
					                       <select class="form-control show-tick" style="margin-top: 10px;" name="cbSecondChoice" id="cbSecondChoice">
		                                    <option selected="true" disabled="true">Second Choice</option>
		                                    <?php

		                                        $sql = $conn->prepare("SELECT * FROM `tbl_course`");
		                                        $sql->execute();

		                                        while($fetch = $sql->fetch()){
		                                    ?>
		                                    <option name="cbSecondChoice" value="<?php echo $fetch['id'] ?>"><?php echo $fetch['course_name'] ?></option>
		                                    <?php
		                                        }
		                                    ?>
		                                </select>
		                    			</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="student-page-default" style="height: 320px;">
						<p class="student-page-default-header">PERSONAL INFORMATION</p>
						<p style="font-size: 12px;"><i>Note: Put NONE or N/A if not applicable.</i></p>
						<div class="row">
							<div class="col-md-6">
								<p class="student-page-label">Name of Applicant as Stated in Birth Certificate</p>
								<div class="form-group form-float" style="margin-bottom: 15px;">
		                        	<div class="form-line">
		                            	<input type="text" name="tbFamilyName" id="tbFamilyName" class="form-control" required/>
		                            	<label class="form-label">Family Name *</label>
		                       		</div>
		                    	</div>
								<div class="form-group form-float" style="margin-bottom: 15px;">
		                        	<div class="form-line">
		                            	<input type="text" name="tbFirstName" id="tbFirstName" class="form-control" required/>
		                            	<label class="form-label">First Name *</label>
		                       		</div>
		                    	</div>
		                    	<div class="form-group form-float" style="margin-bottom: 15px;">
		                        	<div class="form-line">
		                            	<input type="text" name="tbMiddleName" id="tbMiddleName" class="form-control"/>
		                            	<label class="form-label">Middle Name </label>
		                       		</div>
		                    	</div>
		                    	<p class="student-page-label">Date of Birth</p>
		                    	<div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="dpBirthday" id="dpBirthday" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-md-6">
                                		<p class="student-page-label">Age</p>
                                		<div class="form-group form-float">
                                    		<div class="form-line">
                                        		<input type="number" name="tbAge" id="tbAge" class="form-control" required/>
                                        		<label class="form-label">Enter Age</label>
                                    		</div>
                                		</div>
                                	</div>
                                	<div class="col-md-6">
                                		<p class="student-page-label">Gender</p>
                                		<div class="form-group form-float">
					                        <select class="form-control show-tick" name="cbGender" id="cbGender" required>
                                        		<option value="" disabled selected>Select Gender</option>
                                        		<option value="Male">Male</option>
                                        		<option value="Female">Female</option>
                                    		</select>
		                    			</div>
                                	</div>
                                </div>
                                <p class="student-page-label">Height</p>
                                <div class="row">
                                	<div class="col-md-6">
                                		<div class="form-group form-float">
					                        <select class="form-control show-tick" name="heightFeet" id="heightFeet" required>
                                        		<option value="" disabled selected>Height in Feet *</option>
                                        		<option value="3">3</option>
                                        		<option value="4">4</option>
                                        		<option value="5">5</option>
                                        		<option value="6">6</option>
                                    		</select>
		                    			</div>
                                	</div>
                                	<div class="col-md-6">
                                		<div class="form-group form-float">
					                        <select class="form-control show-tick" name="heightInch" id="heightInch" required>
                                        		<option value="" disabled selected>Height in Inches *</option>
                                        		<option value="0">0</option>
                                        		<option value="1">1</option>
                                        		<option value="2">2</option>
                                        		<option value="3">3</option>
                                        		<option value="4">4</option>
                                        		<option value="5">5</option>
                                        		<option value="6">6</option>
                                        		<option value="7">7</option>
                                        		<option value="8">8</option>
                                        		<option value="9">9</option>
                                        		<option value="10">10</option>
                                        		<option value="11">11</option>
                                    		</select>
		                    			</div>
                                	</div>
                                </div>
                                <div class="row">
                                	<div class="col-md-6">
                                		<p class="student-page-label">Weight(lbs) *</p>
		                    			<div class="form-group">
                                		    <div class="form-line">
                                		        <input type="text" name="tbWeight" id="tbWeight" class="form-control" required/>
                                		    </div>
                                		</div>
                                	</div>
                                	<div class="col-md-6">
                                		<p class="student-page-label">Civil Status *</p>
		                    			<div class="form-group form-float">
					                        <select class="form-control show-tick" name="cbCivilStatus" id="cbCivilStatus" required>
                                        		<option value="" disabled selected>Select Civil Status</option>
                                        		<option value="Single">Single</option>
                                        		<option value="Married">Married</option>
                                        		<option value="Separated">Separated</option>
                                        		<option value="Widowed">Widowed</option>
                                    		</select>
		                    			</div>
                                	</div>
                                </div>
                                <p class="student-page-label">Place of Birth (City/Town, Province) *</p>
		                    	<div class="form-group form-float">
                                    <div class="form-line ">
                                        <input type="text" name="tbPlaceOfBirth" id="tbPlaceOfBirth" class="form-control" required/>
                                        <label class="form-label">Place of Birth</label>
                                    </div>
                                </div>
                                <p class="student-page-label">Citizenship *</p>
		                    	<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="tbCitizenship" id="tbCitizenship" class="form-control" required/>
                                        <label class="form-label">Enter Citizenship</label>
                                    </div>
                                </div>
                                <p class="student-page-label">Complete Permanent Home Address (House Number, Street, Barangay, Town/City, Province, Zip Code) *</p>
		                    	<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="tbAddress" id="tbAddress" class="form-control" required/>
                                        <label class="form-label">Permanent Address</label>
                                    </div>
                                </div>
                                <p class="student-page-label">Mailing Address(if not the same as above)</p>
		                    	<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="tbMailingAddress" id="tbMailingAddress" class="form-control" required/>
                                        <label class="form-label">Mailing Address</label>
                                    </div>
                                </div>
                                <p class="student-page-label">Religion *</p>
		                    	<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="tbReligion" id="tbReligion" class="form-control" required/>
                                        <label class="form-label">Enter Religion</label>
                                    </div>
                                </div>
                                <p class="student-page-label">Mobile Number *</p>
		                    	<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="tbMobileNumber" id="tbMobileNumber" class="form-control" required/>
                                        <label class="form-label">Enter Mobile Number</label>
                                    </div>
                                </div>
							</div>
							<div class="col-md-6">
								<p class="student-page-label">Father's Information</p>
		                    	<div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbFatherName" id="tbFatherName" class="form-control" required/>
                                        <label class="form-label">Name *</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbFatherCitizenship" id="tbFatherCitizenship" class="form-control" required/>
                                        <label class="form-label">Citizenship *</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbFatherContact" id="tbFatherContact" class="form-control" required/>
                                        <label class="form-label">Contact Number *</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbFatherEmail" id="tbFatherEmail" class="form-control" />
                                        <label class="form-label">Email Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbFatherOccupation" id="tbFatherOccupation" class="form-control" />
                                        <label class="form-label">Occupation (if employed)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 35px;">
                                    <div class="form-line">
                                        <input type="text" name="tbFatherEmployer" id="tbFatherEmployer" class="form-control" />
                                        <label class="form-label">Employer's Address</label>
                                    </div>
                                </div>
                                <p class="student-page-label">Mother's Information</p>
		                    	<div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbMotherName" id="tbMotherName" class="form-control" required/>
                                        <label class="form-label">Name *</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbMotherCitizenship" id="tbMotherCitizenship" class="form-control" required/>
                                        <label class="form-label">Citizenship *</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbMotherContact" id="tbMotherContact" class="form-control" required/>
                                        <label class="form-label">Contact Number *</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbMotherEmail" id="tbMotherEmail" class="form-control" />
                                        <label class="form-label">Email Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbMotherOccupation" id="tbMotherOccupation" class="form-control" />
                                        <label class="form-label">Occupation (if employed)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 25px;">
                                    <div class="form-line">
                                        <input type="text" name="tbMotherEmployer" id="tbMotherEmployer" class="form-control" />
                                        <label class="form-label">Employer's Address</label>
                                    </div>
                                </div>
                                <p class="student-page-label">Guardian (if not living with parents)</p>
		                    	<div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbGuardianName" id="tbGuardianName" class="form-control" />
                                        <label class="form-label">Name </label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbGuardianCitizenship" id="tbGuardianCitizenship" class="form-control" />
                                        <label class="form-label">Citizenship </label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbGuardianContact" id="tbGuardianContact" class="form-control" />
                                        <label class="form-label">Contact Number </label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbGuardianEmail" id="tbGuardianEmail" class="form-control" />
                                        <label class="form-label">Email Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbGuardianOccupation" id="tbGuardianOccupation" class="form-control" />
                                        <label class="form-label">Occupation (if employed)</label>
                                    </div>
                                </div>
                                <div class="form-group form-float" style="margin-bottom: 15px;">
                                    <div class="form-line">
                                        <input type="text" name="tbGuardianEmployer" id="tbGuardianEmployer" class="form-control" />
                                        <label class="form-label">Employer's Address</label>
                                    </div>
                                </div>
							</div>
						</div>

						<div class="row">
                            <div class="col-md-12" align="center">
                                <a class="default-button page-start-button" href="#" data-toggle="modal" data-target="#nextModal" style="padding: 5px 20px 5px 20px;">Next</a>
                            </div>
						</div>
					</div>
					<div class="modal fade" id="nextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				    	<div class="modal-dialog" role="document">
				      		<div class="modal-content">
				       			<div class="modal-header">
				       			  <p class="modal-header-text">Proceed to the next step?</p>
				       			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				       			    <span aria-hidden="true">×</span>
				       			  </button>
				       			</div>
				       			<div class="modal-body">
				       				<p style="text-align: justify; font-size: 14px;">By proceeding to the next step, all the information that you entered on this page will be saved to the database.</p>
				       				<p style="text-align: justify; font-size: 14px;"><b>Please review everything first before proceeding.</b></p>
				      			</div>
				      			<div class="modal-footer" style="padding: 10px;">
				       			  <button type="submit" class="default-button" name="btnNext" style="padding: 5px 10px 5px 10px; position: relative;">Confirm</button>
				       			</div>
				    		</div>
				  		</div>
	  				</div>
				</form>
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