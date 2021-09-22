<!-- --APPROVE APPLICATION-- -->
                                        <div class="modal fade" id="reject<?php echo $fetch['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action = "be/applicant-review/rejectApplication.php" method="POST">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title logout-modal-title">Approve Application</h5>
                                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body logout-modal-body">
                                                         <input type="hidden" name="applicantID" id="applicantID" value="<?php echo $fetch['applicant_account_id'] ?>">
                                                        <div class="form-group">
                                                        <label>Are you sure you want to reject this Application for 
                                                            <?php echo $fetch['last_name'];
                                                            echo ", ";
                                                            echo $fetch['first_name'];
                                                            echo " ";
                                                            echo $fetch['middle_name'];
                                                        ?>? If YES, please specify the reason for rejecting this application.</label>
                                                        <div class="form-line">
                                                            <textarea name="reasonReject" cols="30" rows="5" class="form-control no-resize" placeholder="Reason for rejection" required></textarea>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" style="color: #FFFFFF" type="submit" name="reject" id="reject" onclick="showSuccess();">YES, Reject Application</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>