
<!-- ADD EXAMINATION MODULE MODAL -->
<div class="modal fade" id="updateScore<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php
            $syID = $_GET['sy_id'];
            ?>
            <form action = "be/applicant_exam/updateScore.php?sy_id=<?php echo $syID;?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add Exam Score</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?php echo $fetch['applicant_account_id']; ?>" name="id">
                    <div class="form-group">
                    <p>Set Exam Score for
                        <?php echo $fetch ['first_name']; echo ' ';
                            echo $fetch ['middle_name']; echo ' ';
                            echo $fetch ['first_name']; ?></p>
                            </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">mode_edit</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" name="exam_score" placeholder="Set Exam Score" required autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link waves-effect" name="updateScore" id="updateScore" >SAVE CHANGES</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

