                                        <!-- --DELETE MODAL (Academic Year)-- -->
                                        <div class="modal fade" id="delete<?php echo $fetch['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action = "be/academic_year/delete.php" method="POST">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title logout-modal-title">Delete Academic Year</h5>
                                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body logout-modal-body">
                                                        <p class="card-dashboard-header">Are you sure you want to remove this Academic Year from the database?</p>
                                                        <input type="hidden" name="id" id="id" value="<?php echo $fetch['id'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" style="color: #FFFFFF" type="submit" name="delete" onclick="showSuccess();">Confirm Delete</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>