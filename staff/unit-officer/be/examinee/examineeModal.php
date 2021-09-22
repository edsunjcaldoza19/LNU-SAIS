<!-- --DELETE MODAL (DEPARTMENT)-- -->
                                        <div class="modal fade" id="reviewExam<?php echo $fetch['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action = "be/examinee/examinee.php" method="POST">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title logout-modal-title">Approve Examinee</h5>
                                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body logout-modal-body">
                                                        <p class="card-dashboard-header">Are you sure you want to Approve this score? Exam Score <?php ?></p>
                                                        <h2>EXAM SCORE: 92/100</h2>
                                                        <input type="hidden" name="applicantID" id="applicantID" value="<?php echo $fetch['id'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-success" style="color: #FFFFFF" type="submit" name="examineePass" id="examineePass" onclick="showSuccess();">Approve, Proceed To Interview</button>
                                                        <button class="btn btn-danger" style="color: #FFFFFF" type="submit" name="examineeFail" id="examineeFail" onclick="showSuccess();">Reject</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>