<!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
           <?php
                include 'includes/user.php';
           ?>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="<?= ($activePage == 'home') ? 'active': ''; ?>">
                        <a href="home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                    <li class="<?= ($activePage == 'procedure') ? 'active': ''; ?>">
                        <a href="procedure.php">
                            <i class="material-icons">assignment_turned_in</i>
                            <span>Procedures</span>
                        </a>
                    </li>
                    <li>
                    <li class="<?= ($activePage == 'requirements') ? 'active': ''; ?>">
                        <a href="requirements.php">
                            <i class="material-icons">assignment</i>
                            <span>Requirements</span>
                        </a>
                    </li>
                    <li>
                    <li class="<?= ($activePage == 'schedule') ? 'active': ''; ?>">
                        <a href="schedule.php">
                            <i class="material-icons">date_range</i>
                            <span>Schedules</span>
                        </a>
                    </li>
                    <li class="header">MANAGE STUDENT APPLICATIONS</li>
                    <li class="<?= ($activePage == 'applicant' || $activePage == 'applicant_approved' || $activePage == 'applicant_pending' || $activePage == 'applicant_rejected' || $activePage =='applicant_review') ? 'active': ''; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Applicants</span>
                        </a>
                         <ul class="ml-menu">
                            <li class="<?= ($activePage == 'applicant') ? 'active': ''; ?>">
                                <a href="applicant.php">Applicants Masterlist</a>
                            </li>
                            <li class="<?= ($activePage == 'applicant_pending') ? 'active': ''; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">Pending Applications</a>
                                <ul class="ml-menu">
                                    <li>
                                        <?php
                                        require 'be/database/db_pdo.php';
                                        $sql = $conn->prepare("SELECT * FROM `tbl_academic_year`");
                                        $sql->execute();
                                        while($fetch = $sql->fetch()){
                                        ?>
                                        <a href="applicant_pending.php?sy_id=<?php echo $fetch['id'];?>">A.Y. <?php echo $fetch['ay_year']; ?></a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= ($activePage == 'applicant_approved') ? 'active': ''; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">Approved Applications</a>
                                <ul class="ml-menu">
                                    <li>
                                        <?php
                                        require 'be/database/db_pdo.php';
                                        $sql = $conn->prepare("SELECT * FROM `tbl_academic_year`");
                                        $sql->execute();
                                        while($fetch = $sql->fetch()){
                                        ?>
                                        <a href="applicant_approved.php?sy_id=<?php echo $fetch['id'];?>">A.Y. <?php echo $fetch['ay_year']; ?></a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= ($activePage == 'applicant_rejected') ? 'active': ''; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">Rejected Applications</a>
                                <ul class="ml-menu">
                                    <li>
                                        <?php
                                        require 'be/database/db_pdo.php';
                                        $sql = $conn->prepare("SELECT * FROM `tbl_academic_year`");
                                        $sql->execute();
                                        while($fetch = $sql->fetch()){
                                        ?>
                                        <a href="applicant_rejected.php?sy_id=<?php echo $fetch['id'];?>">A.Y. <?php echo $fetch['ay_year']; ?></a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($activePage == 'applicant_monitoring') ? 'active': ''; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Applicant Monitoring</span>
                        </a>
                         <ul class="ml-menu">
                            <li>
                            <?php
                                        require 'be/database/db_pdo.php';
                                        $sql = $conn->prepare("SELECT * FROM `tbl_academic_year`");
                                        $sql->execute();
                                        while($fetch = $sql->fetch()){
                                        ?>
                                        <a href="applicant_monitoring.php?id=<?php echo $fetch['id'];?>">A.Y. <?php echo $fetch['ay_year']; ?></a>
                                        <?php
                                            }
                                        ?>
                            </li>

                        </ul>
                    </li>
                    <li class="<?= ($activePage == 'qualified') ? 'active': ''; ?>">
                        <a href="qualified.php">
                            <i class="material-icons">check_circle</i>
                            <span>Qualified for Admission</span>
                        </a>
                    </li>
                    <li class="header">OTHER OPTIONS</li>
                     <li>
                        <a href="settings.php">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="changelog.php">
                            <i class="material-icons">feedback</i>
                            <span>Feedbacks</span>
                        </a>
                    </li>
                    <li>
                        <a href="changelog.php">
                            <i class="material-icons">update</i>
                            <span>Changelogs</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="version">
                    LNU SAIS | Version 1.0.0
                </div>
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);">Leyte Normal University</a>
                </div>
            </div>
            <!-- #Footer -->
            <?php
            include 'includes/right_sidebar.php';
        ?>
        </aside>
        <!-- #END# Left Sidebar -->