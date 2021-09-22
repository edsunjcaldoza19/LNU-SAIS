<?php

	$email = '';
	require '../../backend/auth/check_token.php';

	try{

		$id = $fetch['id'];

		$sql = $conn->prepare("SELECT * FROM tbl_feedback WHERE `feedback_applicant_id` = '$id'");
    	$sql->execute();

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
		<link rel="stylesheet" type="text/css" href="../../assets/libs/datatables/dataTables.bootstrap4.min.css">
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
								<i class="far fa-user-circle sidebar-navigation-icon"></i> <a href="my_status.php" class="sidebar-link">My Status</a>
							</div>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<div class="sidebar-item">
								<i class="far fa-comments sidebar-navigation-icon"></i> <a href="javascript:void(0)" class="sidebar-link active">Send Feedback</a>
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
								<i class="far fa-user-circle sidebar-navigation-icon"></i> <a href="my_status.php" class="sidebar-link">My Status</a>
							</div>
							<hr class="default-divider ml-auto" style="margin: 10px;">
							<div class="sidebar-item">
								<i class="far fa-comments sidebar-navigation-icon"></i> <a href="javascript:void(0)" class="sidebar-link active">Send Feedback</a>
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
					<div class="student-page-default" id="student-page-default">
						<p class="exam-placeholder-header" style="font-size: 30px; margin: 0px;">
							Send Feedback
						</p>
						<p class="exam-placeholder-subheader" style="font-size: 15px; margin-top: 5px; margin-bottom: 5px;">
							Send feedbacks, issues encountered and other related concerns.
						</p>
						<hr class="default-divider ml-auto" style="margin: 10px;">
						<button class="default-button feedback-button" data-toggle="modal" data-target="#addMessageModal">Send Feedback</button>
						<hr class="default-divider ml-auto" style="margin: 10px;">
						<div class="feedback-table-container" id="feedback-table-container" style="overflow-y: auto;">
							<table class="table table-striped feedback-table" id="dataTable">
                                <thead class="header">
                                    <tr>
                                    	<th>Feedback Subject</th>
                                    	<th>Status</th>
                                    	<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="body">
                                	<?php
                                        while($feedback = $sql->fetch()){
                                	?>
                                    <tr>
                                    	<td><?php echo $feedback['feedback_subject']?></td>
                                    	<td><?php echo $feedback['feedback_status']?></td>
                                    	<td>
                                    		<a data-toggle="modal" data-target="#openMessageModal<?php echo $feedback['id']?>"><i class="fa fa-eye" style="color: #7AA0CB; margin: 2px;"></i></a>
											<div class="modal fade" id="openMessageModal<?php echo $feedback['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										    	<div class="modal-dialog" role="document">
										      		<div class="modal-content">
										       			<div class="modal-header">
										       			  <p class="modal-header-text">Feedback Viewer</p>
										       			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
										       			    <span aria-hidden="true">×</span>
										       			  </button>
										       			</div>
										       			<div class="modal-body" style="height: auto; overflow-x: auto">
										       				<div class="message-container">
										       					<p><b>Me:</b></p>
										       					<p><?php echo $feedback['feedback_message']?></p>
										       					<hr class="default-divider ml-auto" style="margin: 5px;">
										       					<p style="font-weight: 600; font-size: 12px;">Sent on: <?php echo $feedback['feedback_sent_timestamp']?></p>
										       				</div>
										       				<div class="reply-container" style="padding: 10px; width: 100%;">
										       					<?php
										       						if($feedback['feedback_reply'] !== ''){
										       							echo '
										       								<p><b>System Administrator:</b></p>
										       								<p>' .$feedback["feedback_reply"].'</p>
										       								<hr class="default-divider ml-auto" style="margin: 10px;">
										       								<p style="font-weight: 600; font-size: 12px;">Replied on: '.$feedback["feedback_reply_timestamp"].'</p>
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
										       			  <p class="modal-header-text">Delete Message?</p>
										       			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
										       			    <span aria-hidden="true">×</span>
										       			  </button>
										       			</div>
										       			<div class="modal-body" style="height: auto; overflow-x: auto">
										       				Are you sure you want to delete this message?
										       				<input name="message_id" type="hidden" value="<?php echo $feedback['id']?>">
										      			</div>
										      			<div class="modal-footer" style="padding: 10px;">
       			  											<a class="default-button" href="../../backend/feedback/delete_feedback.php?id=<?php echo $feedback['id']?>">Confirm</a>
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
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<form method="POST" action="../../backend/feedback/add_feedback.php">
      		<div class="modal-content">
       			<div class="modal-header">
       			  <p class="modal-header-text">Create New Feedback</p>
       			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
       			    <span aria-hidden="true">×</span>
       			  </button>
       			</div>
       			<div class="modal-body">
       				<p class="student-page-label">Feedback Category *</p>
					<div class="form-group form-float">
					    <select class="form-control show-tick" name="cbFeedbackCategory" id="cbFeedbackCategory" required>
                            <option value="" disabled selected>Choose Feedback Category</option>
                            <option value="User Experience Feedback">User Experience Feedback</option>
                            <option value="Issues Encountered">Issues Encountered</option>
                            <option value="Others">Others (specify on the subject line)</option>
                        </select>
		            </div>
                    <div class="form-group form-float">
                    	<p class="student-page-label">Feedback Subject *</p>
                        <div class="form-line" style="margin-bottom: 20px;">
                          	<input type="text" name="tbFeedbackSubject" id="tbFeedbackSubject" class="form-control" required/>
                          	<label class="form-label">e.g. I discovered a bug on the system</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                    	<p class="student-page-label">Feedback Message *</p>
                        <div class="form-line">
			               	<div class="form-line">
                           	    <textarea rows="7" name="tbFeedbackMessage" id="tbFeedbackMessage" class="form-control no-resize" placeholder="Type your answer..." required></textarea>
                           	</div>
			            </div>
                    </div>
                    <input id="senderID" name="senderID" value="<?php echo $fetch['id'] ?>" type="hidden" style="margin: 0px;">
      			</div>
      			<div class="modal-footer" style="padding: 10px;">
       			  <button class="default-button" type="submit" name="btnSend" style="padding: 5px 10px 5px 10px; position: relative;">Send Feedback</button>
       			</div>
    		</div>
    		</form>
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
	<script src="../../assets/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="../../assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
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
        	$('table').DataTable({
                "pageLength": 5,
                "bLengthChange": false,
                "scrollY": '38vh'
            });
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
			$('#feedback-table-container').slimScroll({
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