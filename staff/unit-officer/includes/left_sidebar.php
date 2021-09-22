<!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
           <?php
                include 'includes/user.php';
           ?>

            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MANAGE STUDENT APPLICATIONS</li>
                    <li class="<?= ($activePage == 'interview_pending' || $activePage == 'interview_pass' || $activePage == 'interview_fail' || $activePage =='applicant_review') ? 'active': ''; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Applicants</span>
                        </a>
                         <ul class="ml-menu">
                            <li class="<?= ($activePage == 'interview_pending') ? 'active': ''; ?>">
                                <a href="interview_pending.php">Pending Applications</a>
                            </li>
                            <li class="<?= ($activePage == 'interview_pass') ? 'active': ''; ?>">
                                <a href="interview_pass.php">Approved Applications</a>
                            </li>
                            <li class="<?= ($activePage == 'interview_fail') ? 'active': ''; ?>">
                                <a href="interview_fail.php">Rejected Applications</a>
                            </li>
                        </ul>
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
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);">Online Admission System</a>.
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