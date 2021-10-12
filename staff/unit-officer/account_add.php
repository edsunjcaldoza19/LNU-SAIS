<?php
    include 'includes/session.php';
    include 'includes/header.php';
    ?>
    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <?php
    include 'includes/topbar.php';
    include 'includes/left_sidebar.php';
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>ADD ACCOUNT</h1>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <p style="font-size: 24px; font-weight: 600;">ACCOUNT DETAILS</p>
                            <p>Please fill in the required fields to create an account. </p>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="be/account_staff/add.php" method="POST" enctype="multipart/form-data">
                                <p style="font-size: 20px;">Account Information</p>
                                <div class="form-group">
                                    <small>Provide username and password for your account information. This will be used to login to the system.</small>
                                </div>
                                <fieldset>
                                    <div class="alert alert-danger" id="alertUsername" name="alertUsername" style="padding: 10px; display: none;">
                                        <i class="fa fa-times-circle"></i><p class="" style="display: inline-block; margin-left: 10px;">An account with a similar username already exists!</p>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="username" id="username" required>
                                            <label class="form-label">Username*</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <p id="unitLabel">Program*</p>
                                                <select name="courseID" class="form-control" required>
                                                    <?php
                                                        require 'be/database/db_pdo.php';
                                                        $program_id = $_SESSION['staff_unit'];
                                                        $sqlCourse = $conn->prepare("SELECT * FROM `tbl_course` WHERE `unit_id` = $program_id");
                                                        $sqlCourse->execute();
                                                        while($fetchCourse = $sqlCourse->fetch()){
                                                    ?>
                                                        <option name="courseID" value="<?php echo $fetchCourse['id']?>">
                                                        <?php echo $fetchCourse['course_name'] ?></option>
                                                    <?php
                                                        }
                                                ?>
                                                </select>
                                        </div>  
                                    </div>
                                </fieldset>
                                <p style="font-size: 20px;">Personal Information</p>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <p id="unitLabel">Honorific</p>
                                            <select name="title" class="form-control">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mr.">Mrs.</option>
                                                <option value="Prof.">Prof.</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Engr.">Engr.</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="firstName" class="form-control" required>
                                            <label class="form-label">First Name*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="middleName" class="form-control">
                                            <label class="form-label">Middle Name</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="lastName" class="form-control" required>
                                            <label class="form-label">Last Name*</label>
                                        </div>
                                    </div>
                                    <div class="alert alert-danger" id="alertEmail" name="alertEmail" style="padding: 10px; display: none;">
                                        <i class="fa fa-times-circle"></i><p class="" style="display: inline-block; margin-left: 10px;">An account with a similar username already exists!</p>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" id="email" class="form-control" required>
                                            <label class="form-label">Email Address*</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="contact" cols="30" rows="3" class="form-control" required></input>
                                            <label class="form-label">Contact Number*</label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <label>
                                        Please upload the picture of the employee.
                                    </label>
                                    <!-- Basic file uploader -->
                                    <input type="file" name="image" class="form-control"
                                            onchange="previewImage(event)">
                                </div>
                                <div class="form-group">
                                    Image uploaded will be previewed here.
                                    Please select an image with same width and
                                    height ratio.
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <img id="preview" width="350px" height="350px" style="border: 2px solid;"/>
                                    </div>
                                </div>
                                <h3>Terms & Conditions - Finish</h3>
                                <fieldset>
                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                </fieldset>
                                <div class="form-group">
                                    <button type="submit" class="btn bg-green btn-lg" name="submit">Submit</button>
                                    <a href="account_admission_officer.php" class="btn bg-blue btn-lg">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>

    <?php
        include 'includes/logout_modal.php';
        include 'includes/scripts.php';
    ?>
    <!-- ADDITIONAL JAVASCRIPT FOR THIS PAGE (ACADEMIC YEAR) -->
    <!-- Autosize Plugin Js -->
    <script src="../../plugins/autosize/autosize.js"></script>
    <!-- Moment Plugin Js -->
    <script src="../../plugins/momentjs/moment.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/forms/basic-form-elements.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
     <script>
        var previewImage = function(event){
            var output = document.getElementById("preview");
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function(){
                URL.revokeObjectURL(output.src)
            }
        }

        //Validate add administrator account

        document.getElementById("username").addEventListener("keyup", checkUsername);
        document.getElementById("email").addEventListener("keyup", checkEmail);

        function checkUsername(){

            var username = $('#username').val();

            $.post("be/account_staff/check_staff_account.php", { "username": username }, function(response){

                if(response == 1){

                    $('#alertUsername').css('display', 'block');
                    $('#submit').attr("disabled", true);

                }else{

                    $('#alertUsername').css('display', 'none');
                    $('#submit').attr("disabled", false);

                }

            });

        }

        function checkEmail(){

            var email = $('#email').val();

            $.post("be/account_staff/check_staff_account.php", { "email": email }, function(response){

                if(response == 1){

                    $('#alertEmail').css('display', 'block');
                    $('#submit').attr("disabled", true);

                }else{

                    $('#alertEmail').css('display', 'none');
                    $('#submit').attr("disabled", false);

                }

            });

        }
    </script>
</body>

</html>
