<!-- APPROVE MODAL -->
<div class="modal fade" id="waitlist<?php echo $fetch['id']?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php
                $syID = $_GET['sy_id'];
            ?>
            <form action = "be/applicant-review/waitlistApplication.php?syID=<?php echo $syID ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add Applicant to Waitlist</h4>
                    <hr class="default-divider ml-auto">
                </div>
                <div class="modal-body">
                    <input type="hidden" name="applicantID" id="applicantID" value="<?php echo $fetch['id'] ?>">
                    <p class="card-dashboard-header">Are you sure you want to add
                    <b>
                    <?php 
                        echo $fetch['first_name'].' '.$fetch['middle_name'].' '.$fetch['last_name'];
                    ?></b>
                    to <b><?php echo $fetch['course_name']?></b>'s waitlist ?</p>
                </div>
                <div class="modal-footer">
                    <hr class="default-divider ml-auto">
                    <button type="submit" class="btn btn-link btn-warning waves-effect" name="approve" id="approve" onclick="showSuccess();" style="color: #EEEEEE;">Yes, Add to Waitlist</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>