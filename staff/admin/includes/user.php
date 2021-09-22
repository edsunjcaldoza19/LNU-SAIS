<!-- User Info -->
            <div class="user-info">

                <div class="image">
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@<?php echo $_SESSION['admin_name'];?></div>
                    <div class="email"><?php echo $_SESSION['admin_email'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="account_admin.php;"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="account_admission_officer;"><i class="material-icons">group</i>Admission</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>

            </div>

<!-- #User Info -->

