<!-- UPDATE MODAL -->
<div class="modal fade" id="update<?php echo $fetch['id']?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action = "be/academic_year/update.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Update Procedure</h4>
                            <hr class="default-divider ml-auto">
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?php echo $fetch['id']; ?>" name="id">
                            <div class="input-group">     
                                </span>
                                <div class="form-line">
                                    <input type="number" value="<?php echo $fetch['procedure_step_num']; ?>" class="form-control" name="step" placeholder="Step No." required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" value="<?php echo $fetch['procedure_desc']; ?>" class="form-control" name="description" placeholder="Description" required autofocus>
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