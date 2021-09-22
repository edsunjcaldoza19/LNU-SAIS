 <!-- ADD MODAL (DEPARTMENT) -->
             <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action = "be/unit/add.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Add Department Information</h4>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" placeholder="Add Unit Name" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="description" placeholder="Add Unit Description" required autofocus>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <select class="form-control show-tick" name="deptID">
                                    <?php
                                        require 'be/database/db_pdo.php';
                                        $sqlUnit = $conn->prepare("SELECT * FROM `tbl_department`");
                                        $sqlUnit->execute();
                                        while($fetchUnit = $sqlUnit->fetch()){
                                    ?>
                                        <option name="unitID" value="<?php echo $fetchUnit['id'] ?>">
                                        <?php echo $fetchUnit['dept_name'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect" name="add" id="add" >SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>