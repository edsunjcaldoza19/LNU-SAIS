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
                                <a href="javascript:void(0);" class="menu-toggle">Pending Applicants</a>
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
                            <li class="<?= ($activePage == 'applicant_qualified') ? 'active': ''; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">Qualified Applicants</a>
                                <ul class="ml-menu">
                                    <li>
                                        <?php
                                        require 'be/database/db_pdo.php';
                                        $sql = $conn->prepare("SELECT * FROM `tbl_academic_year`");
                                        $sql->execute();
                                        while($fetch = $sql->fetch()){
                                        ?>
                                        <a href="applicant_qualified.php?sy_id=<?php echo $fetch['id'];?>">A.Y. <?php echo $fetch['ay_year']; ?></a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= ($activePage == 'applicant_unqualified') ? 'active': ''; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">Unqualified Applicants</a>
                                <ul class="ml-menu">
                                    <li>
                                        <?php
                                        require 'be/database/db_pdo.php';
                                        $sql = $conn->prepare("SELECT * FROM `tbl_academic_year`");
                                        $sql->execute();
                                        while($fetch = $sql->fetch()){
                                        ?>
                                        <a href="applicant_unqualified.php?sy_id=<?php echo $fetch['id'];?>">A.Y. <?php echo $fetch['ay_year']; ?></a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="header">MANAGE ENTRANCE EXAMINATION</li>
                    <li class="<?= ($activePage == 'exam_manage') ? 'active': ''; ?>">
                                <a href="exam_manage.php">
                                <i class="material-icons">assignment</i>
                                <span>Examination Module</span>
                                </a>
                            </li>
                    <li class="<?= ($activePage == 'exam_results') ? 'active': ''; ?>">
                            <a href="exam_results.php">
                                <i class="material-icons">list</i>
                                <span>Examination Results</span>
                            </a>
                        </li>
                    <li class="header">OTHER OPTIONS</li>
                    <li>
                        <li class="<?= ($activePage == 'account_settings') ? 'active': ''; ?>">
                            <a href="account_settings.php">
                                <i class="material-icons">person</i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                    </li>
                    <li>
                        <li class="<?= ($activePage == 'exam_toggle') ? 'active': ''; ?>">
                            <a href="exam_toggle.php">
                                <i class="material-icons">settings</i>
                                <span>Enable/Disable Examination</span>
                            </a>
                        </li>
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
        <?php include 'be/entrance_examination/addExaminationModal.php';?>