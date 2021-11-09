<!-- ADD EXAMINATION MODULE MODAL -->
<div class="modal fade" id="setSchedule<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php
                $syID = $_GET['sy_id'];
            ?>
            <form action = "be/applicant_interview/setSchedule.php?sy_id=<?php echo $syID;?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Set Interview Schedule</h4>
                    <hr class="default-divider ml-auto">
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?php echo $fetch['applicant_account_id']; ?>" name="id">
                    <div class="form-group">
                    <p style="font-weight: 600;">Set Interview Schedule for: </p>
                        <p>
                            <?php echo $fetch['last_name'].', '.$fetch['first_name'].' '.$fetch['middle_name']?>
                        </p>       
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control" name="platform" id="platform">
                                <option value="" disabled selected="">Select Platform for Interview:</option>
                                <option value="Face-to-Face">Face-to-Face</option>
                                <option value="Video Call">Video Call</option>
                            </select>
                            <label class="form-label">Interview Platform</label>
                        </div>
                    </div>
                    <div class="form-group form-float" id="callLink" style="display: none;">
                        <div class="form-line">
                            <input type="text" class="form-control" name="link" autofocus>
                            <label class="form-label">Enter Video Call Link:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <input type="date" class="form-control" name="date" required autofocus>
                                    <label class="form-label">Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <input type="time" class="form-control" name="time" required autofocus>
                                    <label class="form-label">Time</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <hr class="default-divider ml-auto">
                        <button type="submit" class="btn btn-link waves-effect" name="setSchedule" id="setSchedule" >SAVE CHANGES</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
