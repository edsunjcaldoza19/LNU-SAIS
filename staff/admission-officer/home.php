<?php
    include 'includes/session.php';
    include 'includes/header.php';
    include 'includes/left_sidebar.php';
    include 'includes/topbar.php';
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h3>DASHBOARD</h3>
            </div>
            <!-- Dashboard Items -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-teal ">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">COLLEGE</div>
                            <?php
                              include 'be/database/db_pdo.php';
                              $query = "SELECT * FROM tbl_department";
                              $result=$conn->query($query);
                              $count = $result->rowCount();
                              ?>
                            <div class="number"><?php echo $count ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-teal ">
                            <i class="material-icons">layers</i>
                        </div>
                        <div class="content">
                            <div class="text">UNITS</div>
                            <?php
                              include 'be/database/db_pdo.php';
                              $query = "SELECT * FROM tbl_unit";
                              $result=$conn->query($query);
                              $count = $result->rowCount();
                              ?>
                            <div class="number"><?php echo $count ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-teal ">
                            <i class="material-icons">dns</i>
                        </div>
                        <div class="content">
                            <div class="text">PROGRAMS</div>
                            <?php
                              include 'be/database/db_pdo.php';
                              $query = "SELECT * FROM tbl_course";
                              $result=$conn->query($query);
                              $count = $result->rowCount();
                              ?>
                            <div class="number"><?php echo $count ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect">
                        <div class="icon bg-teal ">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">ACCOUNTS</div>
                            <?php
                              include 'be/database/db_pdo.php';
                              $query = "SELECT * FROM tbl_account_staff";
                              $result=$conn->query($query);
                              $count = $result->rowCount();
                              ?>
                            <div class="number"><?php echo $count ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                    <h3>ACCOUNTS</h3>
                                    <div class="card">
                                    <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-success">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                                                        Admission Officer Accounts
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                                <div class="panel-body">
                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Username</th>
                                                                <th>Name</th>
                                                                <th>Contact Number</th>
                                                                <th>Email</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- populate table with db data -->
                                                            <?php
                                                                require 'be/database/db_pdo.php';
                                                                $sql = $conn->prepare("SELECT * FROM `tbl_account_staff` WHERE `staff_role` = '1'");
                                                                $sql->execute();

                                                                while($fetch = $sql->fetch()){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $fetch['staff_username']?></td>
                                                                <td><?php
                                                                    echo $fetch['staff_first_name'];
                                                                    echo " ";
                                                                    echo $fetch['staff_middle_name'];
                                                                    echo " ";
                                                                    echo $fetch['staff_last_name'];?>
                                                                </td>
                                                                <td><?php echo $fetch['staff_contact']; ?></td>
                                                                <td><?php echo $fetch['staff_email']; ?></td>

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
                            </div>
                        </div>

        </div>
    </section>
 <?php
        include 'includes/logout_modal.php';
        include 'includes/scripts.php';
    ?>
</body>



</html>
