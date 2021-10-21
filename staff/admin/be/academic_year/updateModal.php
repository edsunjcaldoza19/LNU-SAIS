<!-- UPDATE MODAL -->
<div class="modal fade" id="update<?php echo $fetch['id']?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action = "be/academic_year/update.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Update Academic Year</h4>
                            <hr class="default-divider ml-auto">
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?php echo $fetch['id']; ?>" name="id">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="year" value="<?php echo $fetch['ay_year']; ?>" required autofocus>
                                    <label class="form-label">Academic Year (e.g. 2020-2021)</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control" name="enableExam" id="enableExam" required>
                                        <option value="" disabled selected>
                                            <?php
                                                if($fetch['enable_exam'] == 0){
                                                    echo 'Disabled';
                                                }else{
                                                    echo 'Enabled';
                                                }
                                            ?>
                                        </option>
                                        <option value="1">Enable</option>
                                        <option value="0">Disable</option>
                                    </select>   
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="" disabled selected>
                                            <?php
                                                if($fetch['ay_status'] == 0){
                                                    echo 'Deactivated';
                                                }else{
                                                    echo 'Activated';
                                                }
                                            ?>
                                        </option>
                                        <option value="1">Active (Deactivates currently active year*)</option>
                                        <option value="0">Inactive</option>
                                    </select>   
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <hr class="default-divider ml-auto">
                            <button type="submit" class="btn btn-link waves-effect" name="update" id="update">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>