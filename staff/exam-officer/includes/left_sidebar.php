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
                    <li class="header">MANAGE ENTRANCE EXAMINATION</li>
                    <li class="<?= ($activePage == 'applicant_approved') ? 'active': ''; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Entrance Examination</span>
                        </a>
                         <ul class="ml-menu">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#addExaminationModal">Add Examination Module</a>
                            </li>
                            <li class="<?= ($activePage == 'applicant_approved') ? 'active': ''; ?>">
                                <a href="applicant_approved.php">Manage Examination Modules</a>
                            </li>
                        </ul>
                        <li class="<?= ($activePage == 'exam_results') ? 'active': ''; ?>">
                            <a href="exam_results.php">
                                <i class="material-icons">list</i>
                                <span>Examination Results</span>
                            </a>
                        </li>
                    </li>
                    <li class="header">OTHER OPTIONS</li>
                     <li>
                        <li class="<?= ($activePage == 'exam_settings') ? 'active': ''; ?>">
                            <a href="exam_settings.php">
                                <i class="material-icons">settings</i>
                                <span>Examination Settings</span>
                            </a>
                        </li>
                        <li class="<?= ($activePage == 'account_settings') ? 'active': ''; ?>">
                            <a href="account_settings.php">
                                <i class="material-icons">person</i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);">Leyte Normal University</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
            <?php
            include 'includes/right_sidebar.php';
        ?>
        </aside>
        <!-- #END# Left Sidebar -->
        <?php include 'be/entrance_examination/addExaminationModal.php';?>