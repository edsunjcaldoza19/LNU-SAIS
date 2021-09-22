<!DOCTYPE html>
<html>
<head>
	<title>LNU SAIS | Password Recovery</title>

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
<body style="background-color: #262626;">

	<div class="container-fluid login">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 login">
				<div class="container-fluid" style="width: 100%; padding: 40px;">
				<img src="../../assets/images/navbar_logo_main.png" style="width: 40%;">
				</div>
				<div class="login-form-container">
					<form>
						<div class="login-form-header">
							<p class="login-form-header-text">Password Recovery</p>
							<p class="login-form-header-subtext">Please enter the e-mail address linked to your account</p>
						</div>
						<div class="login-form-body">
		                    <div class="form-group form-float">
		                        <div class="form-line">
		                            <input type="email" name="tbEmail" id="tbEmail" class="form-control" autocomplete="off" required/>
		                            <label class="form-label">Email</label>
		                        </div>
		                    </div>
						</div>
						<div class="login-form-body security-question-section" style="display: none;">
							<div class="form-group form-float">
		                        <p class="login-form-header-subtext">Your security question:</p>
		                        <p class="login-form-security-question" id="security-question">
		                        	This is a test question?
		                        </p>
		                    </div>
		                    <div class="form-group form-float">
		                        <div class="form-line">
		                            <input type="password" name="tbAnswer" id="tbAnswer" class="form-control" required/>
		                            <label class="form-label">Enter your answer</label>
		                        </div>
		                    </div>
		                     <div class="form-group form-float">
		                        <div class="form-line">
		                            <input type="password" name="tbConfirmAnswer" id="tbConfirmAnswer" class="form-control" required/>
		                            <label class="form-label">Confirm your answer</label>
		                        </div>
		                    </div>
						</div>
						<div class="login-form-buttons" align="center">
							<button class="default-button primary-button" type="submit" disabled>Recover Password</button>
							<hr class="default-divider ml-auto">
							<a class="default-form-link-text" href="login.php">Return to Login Page</a>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<script src="../../assets/libs/jquery/jquery.min.js"></script>
	<script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../../assets/libs/chart.js/Chart.min.js"></script>
    <script src="../../assets/libs/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="../../assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../assets/libs/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../assets/js/template/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../assets/js/template/demo.js"></script>

	<!-- Additional JS codes -->

</body>
</html>