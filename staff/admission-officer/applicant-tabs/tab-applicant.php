<div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <?php
                                $image = (!empty($fetch['applicant_picture'])) ? '../../images/applicant-img/applicant-profile/'.$fetch['applicant_picture'] : '../../images/user-lg.jpg';
                            ?>
                            <div class="image-area">
                                <?php echo "<img src='".$image."'  width='180px' height='180'";?>
                            </div>
                            <div class="content-area">
                                <h3><?php
                                echo $fetch['last_name'];
                                echo ", ";
                                echo $fetch['first_name'];
                                echo " ";
                                echo $fetch['middle_name'];
                                ?></h3>
                                <p><?php echo $fetch['age'];?> years old</p>
                                <p><?php echo $fetch['program_first_choice'];?> - Applicant</p>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <button type="submit" data-toggle="modal" data-target="#approve<?php echo $fetch['id']?>" class="btn btn-block btn-lg btn-success waves-effect"><i class="material-icons">check</i>APPROVE</button>
                            <button type="submit" data-toggle="modal" data-target="#reject<?php echo $fetch['id']?>"class="btn btn-block btn-lg bg-red waves-effect"><i class="material-icons">close</i>REJECT</button>
                        </div>
                    </div>
                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Education
                                    </div>
                                    <div class="content">
                                        Kinder: <?php echo $fetch['kinder_name'];?> <br>
                                        Elementary: <?php echo $fetch['elem_name'];?> <br>
                                        Junior HS: <?php echo $fetch['jhs_name'];?> <br>
                                        Senior HS: <?php echo $fetch['shs_name'];?> <br>
                                        College: <?php echo $fetch['college_name'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Address
                                    </div>
                                    <div class="content">
                                        <?php echo $fetch['address'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Personal Statement
                                    </div>
                                    <div class="content">
                                        <?php echo $fetch['personal_statement'];?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>