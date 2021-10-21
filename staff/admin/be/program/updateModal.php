 <!-- UPDATE MODAL (DEPARTMENT) -->
 <div class="modal fade" id="update<?php echo $fetch['id']?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action = "be/program/update.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Update Program Offering</h4>
                            <hr class="default-divider ml-auto">
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $fetch['id']?>">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" value="<?php echo $fetch['course_name']?>"required autofocus>
                                    <label class="form-label">Program Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="acronym" value="<?php echo $fetch['course_acronym']?>" required autofocus>
                                    <label class="form-label">Program Acronym</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-float">
                                    <select class="form-control show-tick" name="unitID">
                                    <?php
                                        require 'be/database/db_pdo.php';
                                        $sqlUnit = $conn->prepare("SELECT * FROM `tbl_unit`");
                                        $sqlUnit->execute();
                                        while($fetchUnit = $sqlUnit->fetch()){
                                    ?>
                                        <option name="unitID" <?php if($fetch['unit_id'] == $fetchUnit['id'])
                                        {echo 'selected';}?> value="<?php echo $fetchUnit['id'] ?>">
                                        <?php echo $fetchUnit['unit_name'] ?></option>
                                    <?php
                                        }
                                    ?>
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