<?php

	$email = '';
	require '../../backend/auth/check_token.php';

	try{

		$sql = $conn->prepare("SELECT *, tbl_applicant_account.id FROM tbl_applicant_account
        LEFT JOIN tbl_applicant ON tbl_applicant_account.id = tbl_applicant.applicant_account_id 
        WHERE `session_token` = '$token'");
    	$sql->execute();
    	$application = $sql->fetch();

    	if($application == ''){

    		$application['first_name'] = '--';
    		$application['middle_name'] = '--';
    		$application['last_name'] = '--';
    		$application['entry'] = 'N/A';
    		$application['form_status'] = 'Pending';
    		$application['fs_timestamp'] = 'N/A';
			$application['exam_status'] = 'Pending';
    		$application['es_timestamp'] = 'N/A';
			$application['interview_status'] = 'Pending';
    		$application['is_timestamp'] = 'N/A';
			$application['admission_status'] = 'Pending';
    		$application['as_timestamp'] = 'N/A';

    	}else{

    		if($application['form_status'] == ''){
    			$application['form_status'] = 'Pending';
    			$application['fs_timestamp'] = 'N/A';
    		}
    		if($application['exam_status'] == ''){
    			$application['exam_status'] = 'Pending';
    			$application['es_timestamp'] = 'N/A';
    		}
    		if($application['interview_status'] == ''){
    			$application['interview_status'] = 'Pending';
    			$application['is_timestamp'] = 'N/A';
    		}
    		if($application['admission_status'] == ''){
    			$application['admission_status'] = 'Pending';
    			$application['as_timestamp'] = 'N/A';
    		}

    	}

    	if($application['form_status'] == 'Pending'){

    		$application['as_timestamp'] = 'N/A';

    	}

		if($application['exam_status'] == 'Pending'){

    		$application['es_timestamp'] = 'N/A';

    	}

		if($application['interview_status'] == 'Pending'){

    		$application['is_timestamp'] = 'N/A';

    	}

    	if($application['interview_progress'] == 'Not Started'){

    		echo '

			<script>

				alert("[MESSAGE]: Finish the previous step first!");
				window.location.replace("interview.php");

			</script>

			';

    	}

	}catch(exception $e){
		echo 'Error: '.$e->getMessage();
	}

	try{

		$id = $fetch['id'];

		$sql = $conn->prepare("SELECT * FROM tbl_inquiry WHERE `inquiry_applicant_id` = '$id'");
    	$sql->execute();

	}catch(exception $e){
		echo 'Error: '.$e->getMessage();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LNU SAIS | Admission Done</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Imports third-party CSS libraries -->

		<link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/libs/font-awesome/css/all.css">

		<!-- Imports default styling -->

		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

		<link rel="shortcut-icon" href="../../assets/images/lnu.ico" type="image/x-icon"/>
  		<link rel="icon" href="../../assets/images/lnu.ico" type="image/x-icon"/>

</head>
<body>

	<div class="container-fluid login">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 login">
				<div class="container-fluid" style="width: 100%; padding: 35px;">
					<img src="../../assets/images/navbar_logo_main_alt.png" style="width: 50%; position: absolute; left: 50%; margin-left: -25%;">
				</div>
				<div class="default-container">
					<div class="tab-content">
						<div class="tab-pane active" style="transition: 0.5s;" role="tabpanel" id="main">
							<div class="default-header" style="height: 60px;">
								<img src="../../assets/images/done_icon.png" style="width: 15%; position: absolute;	left: 50%; margin-left: -7.5%;">
							</div>
							<div class="login-form-header">
								<p class="login-form-header-text" style="text-align: center; line-height: normal;">Thank you for taking the university admission!</p>
								<p class="login-form-header-subtext" style="text-align: center; font-size: 14px;">Your application is currently being assessed by the concerned offices. Please wait for further updates on your email address.</p>
							</div>
							<hr class="default-divider ml-auto" style="margin: 0px;">
							<div class="nav" role="tablist" style="margin: 0px 0px 0px 0px;">
								<div class="sidebar-item ml-auto mr-auto">
									<i class="far fa-user-circle sidebar-navigation-icon"></i><a href="#test" class="sidebar-link" role="tab" data-toggle="tab" aria-controls="test" aria-selected="true">Check Admission Status</a>
								</div>
								<hr class="default-divider ml-auto" style="margin: 0px;">
								<div class="sidebar-item ml-auto mr-auto">
									<i class="far fa-comments sidebar-navigation-icon"></i><a href="#try" class="sidebar-link" role="tab" data-toggle="tab">Send Inquiry</a>
								</div>
								<hr class="default-divider ml-auto" style="margin: 0px;">
								<div class="sidebar-item ml-auto mr-auto">
									<a class="default-form-link-text" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
								</div>
							</div>
						</div>
						<div class="tab-pane fade in" style="transition: 0.5s;" role="tabpanel" id="test">
							<p class="exam-placeholder-subheader" style="font-size: 15px; margin-top: 5px; margin-bottom: 5px;">
								ADMISSION STATUS MONITORING
							</p>
							<hr class="default-divider ml-auto" style="margin: 5px;">
							<p class="default-interface-subheader">
								Application Form Status
							</p>
							<p class="default-interface-text">
								<?php
									if($application['form_status'] == 'Approved'){
										echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
									}else if($application['form_status'] == 'Pending'){
										echo '<i class="far fa-question-circle sidebar-progress-icon"></i>';
									}else{
										echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
									}
								?>
								<?php echo $application['form_status'] ?> (<?php echo $application['fs_timestamp'] ?>)
							</p>
							<p style="margin-left: 22px; <?php if($application['form_status'] == 'Disapproved'){echo 'display:block';}else{echo 'display:none';} ?>">
								<i>Remarks: <?php echo $application['remarks'];?></i>
							</p>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<div style="<?php if($application['entry'] !== 'Re-admission'){echo 'display:block';}else{echo 'display:none';}?>">
								<p class="default-interface-subheader">
									Entrance Examination Status
								</p>
								<p class="default-interface-text">
									<?php
										if($application['exam_status'] == 'Qualified'){
											echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
										}else if($application['exam_status'] == 'Pending'){
											echo '<i class="far fa-question-circle sidebar-progress-icon"></i>';
										}else{
											echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
										}
									?>
									<?php echo $application['exam_status'] ?> (<?php echo $application['es_timestamp'] ?>)
									</p>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							</div>
							<p class="default-interface-subheader">
								Interview Status
							</p>
							<p class="default-interface-text">
								<?php
									if($application['interview_status'] == 'Qualified'){
										echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
									}else if($application['interview_status'] == 'Pending'){
										echo '<i class="far fa-question-circle sidebar-progress-icon"></i>';
									}else{
										echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
									}
								?>
								<?php echo $application['interview_status'] ?> (<?php echo $application['is_timestamp'] ?>)
							</p>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<p class="default-interface-subheader">
								Admission Status
							</p>
							<p class="default-interface-text">
								<?php
									if($application['admission_status'] == 'Qualified'){
										echo '<i class="far fa-check-circle sidebar-progress-icon done"></i>';
									}else if($application['admission_status'] == 'Pending'){
										echo '<i class="far fa-question-circle sidebar-progress-icon"></i>';
									}else{
										echo '<i class="far fa-times-circle sidebar-progress-icon"></i>';
									}
								?>
								<?php echo $application['admission_status'] ?> (<?php echo $application['as_timestamp'] ?>)
									</p>
							<hr class="default-divider ml-auto" style="margin: 0px;">
							<div class="nav" role="tablist" style="margin: 0px 0px 0px 0px">
								<div class="sidebar-item ml-auto mr-auto">
									<i class="fa fa-arrow-left sidebar-navigation-icon"></i><a href="#main" class="sidebar-link" role="tab" data-toggle="tab">Return</a>
								</div>
							</div>
						</div>
						<div class="tab-pane fade in" style="transition: 0.5s;" role="tabpanel" id="try">
							<button class="default-button feedback-button" data-toggle="modal" data-target="#addMessageModal">New Inquiry Ticket</button>
						<hr class="default-divider ml-auto" style="margin: 10px;">
						<div class="feedback-table-container" id="feedback-table-container" style="overflow-y: auto;">
							<table class="table table-striped feedback-table" id="dataTable">
                                <thead class="header">
                                    <tr>
                                    	<th>Inquiry Subject</th>
                                    	<th>Status</th>
                                    	<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                	<?php
                                        while($feedback = $sql->fetch()){
                                	?>
                                    <tr>
                                    	<td><?php echo $feedback['inquiry_subject']?></td>
                                    	<td>
                                    		<?php 
                                                if($feedback['inquiry_status'] == "Queued"){
                                                    echo '<p class="label-red">Queued</p>';
                                                }else{
                                                    echo '<p class="label-green">Settled</p>';
                                                }
                                            ?>
                                    	</td>
                                    	<td>
                                    		<a data-toggle="modal" data-target="#openMessageModal<?php echo $feedback['id']?>"><i class="fa fa-eye" style="color: #7AA0CB; margin: 2px;"></i></a>
											<div class="modal fade" id="openMessageModal<?php echo $feedback['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										    	<div class="modal-dialog" role="document">
										      		<div class="modal-content">
										       			<div class="modal-header">
										       			  <p class="modal-header-text">Inquiry Viewer</p>
										       			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
										       			    <span aria-hidden="true">×</span>
										       			  </button>
										       			</div>
										       			<div class="modal-body" style="height: auto; overflow-x: auto">
										       				<div class="message-container">
										       					<p><b>Me:</b></p>
										       					<p><?php echo $feedback['inquiry_message']?></p>
										       					<hr class="default-divider ml-auto" style="margin: 5px;">
										       					<p style="font-weight: 600; font-size: 12px;">Sent on: <?php echo $feedback['inquiry_sent_timestamp']?></p>
										       				</div>
										       				<div class="reply-container" style="padding: 10px; width: 100%;">
										       					<?php
										       						if($feedback['inquiry_reply'] !== ''){
										       							echo '
										       								<p><b>System Administrator:</b></p>
										       								<p>' .$feedback["inquiry_reply"].'</p>
										       								<hr class="default-divider ml-auto" style="margin: 10px;">
										       								<p style="font-weight: 600; font-size: 12px;">Replied on: '.$feedback["inquiry_reply_timestamp"].'</p>
										       							';
										       						}else{
										       							echo 'No replies yet';
										       						}
										       					?>
										       				</div>
										      			</div>
										    		</div>
										  		</div>
  											</div>
  											<a data-toggle="modal" data-target="#deleteMessageModal<?php echo $feedback['id']?>"><i class="fa fa-trash-alt" style="color: #FF6961; margin: 2px;"></i></a>
  											<div class="modal fade" id="deleteMessageModal<?php echo $feedback['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										    	<div class="modal-dialog" role="document">
										      		<div class="modal-content">
										       			<div class="modal-header">
										       			  <p class="modal-header-text">Delete Ticket?</p>
										       			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
										       			    <span aria-hidden="true">×</span>
										       			  </button>
										       			</div>
										       			<div class="modal-body" style="height: auto; overflow-x: auto">
										       				Are you sure you want to delete this ticket?
										       				<input name="message_id" type="hidden" value="<?php echo $feedback['id']?>">
										      			</div>
										      			<div class="modal-footer" style="padding: 10px;">
       			  											<a class="default-button" href="../../backend/inquiry/delete_inquiry.php?id=<?php echo $feedback['id']?>">Confirm</a>
       													</div>
										    		</div>
										  		</div>
  											</div>
                                    	</td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
						</div>
						<hr class="default-divider ml-auto" style="margin: 0px;">
						<div class="nav" role="tablist" style="margin: 0px 0px 0px 0px">
							<div class="sidebar-item ml-auto mr-auto">
								<i class="fa fa-arrow-left sidebar-navigation-icon"></i><a href="#main" class="sidebar-link" role="tab" data-toggle="tab">Return</a>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<!-- Inquiry Modal -->

	<div class="modal fade" id="addMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<form method="POST" action="../../backend/inquiry/add_inquiry.php">
      		<div class="modal-content">
       			<div class="modal-header">
       			  <p class="modal-header-text">Create New Inquiry Ticket</p>
       			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
       			    <span aria-hidden="true">×</span>
       			  </button>
       			</div>
       			<div class="modal-body" style="overflow-y: auto; height: auto;">
       				<p class="student-page-label">Inquiry Category *</p>
       				<div class="form-group form-float">
						<div class="form-line">
							<select class="form-control" style="margin-top: 10px;" name="cbFeedbackCategory" id="cbFeedbackCategory" required>
							    <option value="" disabled selected>Choose Feedback Category</option>
                            	<option value="General Inquiry">General Inquiry</option>
                            	<option value="Follow-up">Follow-up*</option>
                            	<option value="Others">Others (specify your concern on the subject line)</option>
				            </select>
						</div>
						<p id="followUpNote" style="margin-top: 10px; font-size: 12px; display: none;"><i>*Note: For follow-up tickets, kindly type "RE: (your original ticket subject)" as your feedback subject.</i></p>
				    </div>
                    <div class="form-group form-float">
                    	<p class="student-page-label">Inquiry Subject *</p>
                        <div class="form-line" style="margin-bottom: 20px;">
                          	<input type="text" name="tbFeedbackSubject" id="tbFeedbackSubject" class="form-control" required/>
                          	<label class="form-label">e.g. I discovered a bug on the system</label>
                        </div>
                    </div>
                    <div class="form-group form-float" id="inquiryTextarea">
                    	<p class="student-page-label">Inquiry *</p>
                        <div class="form-line">
			               	<div class="form-line">
                           	    <textarea rows="7" name="tbFeedbackMessage" id="tbFeedbackMessage" class="form-control no-resize" placeholder="Describe your issue here..." required></textarea>
                           	</div>
			            </div>
                    </div>
                    <input id="senderID" name="senderID" value="<?php echo $fetch['id'] ?>" type="hidden" style="margin: 0px;">
      			</div>
      			<div class="modal-footer" style="padding: 10px;">
       			  <button class="default-button" type="submit" name="btnSend" style="padding: 5px 10px 5px 10px; position: relative;">Send Inquiry Ticket</button>
       			</div>
    		</div>
    		</form>
  		</div>
  	</div>

	<!-- Logout Modal -->

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

	<script src="../../assets/libs/jquery/jquery.min.js"></script>
	<script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../assets/libs/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../assets/js/template/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../assets/js/template/demo.js"></script>

    <script>
    	$('.sidebar-item a').on('click', function(e){
    		e.preventDefault();
    		$(this).tab('show');
    		var theThis = $(this);
    		$('.sidebar-item a').removeClass('active');
    		theThis.addClass('active');
    	});

    	$("#cbFeedbackCategory").change(function(){
            if($(this).val() == "Others"){
                $("#followUpNote").hide();
            }
            else if($(this).val() == "General Inquiry"){
                $("#followUpNote").hide();
            }
            else if($(this).val() == "Follow-up"){
                $("#followUpNote").show();
            }
        });
    </script>

</body>
</html>