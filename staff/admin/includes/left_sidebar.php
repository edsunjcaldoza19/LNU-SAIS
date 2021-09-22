<section>
       <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
           <?php
                include 'includes/user.php';
           ?>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="<?= ($activePage == 'home') ? 'active': ''; ?>">
                        <a href="home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?= ($activePage == 'academic_year') ? 'active': ''; ?>">
                        <a href="academic_year.php">
                            <i class="material-icons">date_range</i>
                            <span>Academic Year</span>
                        </a>
                    </li>
                    <li class="<?= ($activePage == 'department') ? 'active': ''; ?>">
                        <a href="department.php">
                            <i class="material-icons">assignment</i>
                            <span>College</span>
                        </a>
                    </li>
                    <li class="<?= ($activePage == 'unit') ? 'active': ''; ?>">
                        <a href="unit.php">
                            <i class="material-icons">dns</i>
                            <span>Unit Information</span>
                        </a>
                    </li>
                    <li class="<?= ($activePage == 'program') ? 'active': ''; ?>">
                        <a href="program.php">
                            <i class="material-icons">layers</i>
                            <span>Programs Offered</span>
                        </a>
                    </li>
                    <li class="<?= ($activePage == 'account_add') ? 'active': ''; ?>">
                        <a href="account_add.php">
                            <i class="material-icons">person_add</i>
                            <span>Add Account</span>
                        </a>
                    </li>
                    <li class="<?= ($activePage == 'account_admin' || $activePage == 'account_admission_officer' || $activePage == 'account_exam_officer'
                    || $activePage == 'account_interviewer' || $activePage == 'account_unit_head' || $activePage == 'account_all') ? 'active': ''; ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Accounts</span>
                        </a>
                        <ul class="ml-menu">
                        <li class="<?= ($activePage == 'account_all') ? 'active': ''; ?>">
                                <a href="account_all.php">All Accounts</a>
                            </li>
                            <li class="<?= ($activePage == 'account_admission_officer') ? 'active': ''; ?>">
                                <a href="account_admission_officer.php">Admission Officer</a>
                            </li>
                            <li class="<?= ($activePage == 'account_exam_officer') ? 'active': ''; ?>">
                                <a href="account_exam_officer.php">Exam Officer Account</a>
                            </li>
                            <li class="<?= ($activePage == 'account_unit_head') ? 'active': ''; ?>">
                                <a href="account_unit_head.php">Unit Head Account</a>
                            </li>
                            <li class="<?= ($activePage == 'account_interviewer') ? 'active': ''; ?>">
                                <a href="account_interviewer.php">Interviewer Account</a>
                            </li>
                        </ul>
                    </li>
                     <li class="<?= ($activePage == 'settings') ? 'active': ''; ?>">
                        <a href="settings.php">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li class="<?= ($activePage == 'feedback') ? 'active': ''; ?>">
                        <a href="feedback.php">
                            <i class="material-icons">feedback</i>
                            <span>Feedbacks</span>
                        </a>
                    </li>
                    <li class="<?= ($activePage == 'changelog') ? 'active': ''; ?>">
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
        </aside>
        <!-- #END# Left Sidebar -->
        <?php
            include 'includes/right_sidebar.php';
        ?>

    </section>