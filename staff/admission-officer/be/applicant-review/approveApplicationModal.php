<!-- --APPROVE APPLICATION-- -->
                                        <div class="modal fade" id="approve<?php echo $fetch['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action = "be/applicant-review/approveApplication.php" method="POST">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title logout-modal-title">Approve Application</h5>
                                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body logout-modal-body">
                                                        <p class="card-dashboard-header">Are you sure you want to approve this Application for 
                                                            <?php echo $fetch['last_name'];
                                                            echo ", ";
                                                            echo $fetch['first_name'];
                                                            echo " ";
                                                            echo $fetch['middle_name'];
                                                        ?>?</p>
                                                        <input type="hidden" name="applicantID" id="applicantID" value="<?php echo $fetch['id'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-success" style="color: #FFFFFF" type="submit" name="approve" id="approve" onclick="showSuccess();">YES, Approve Application</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>