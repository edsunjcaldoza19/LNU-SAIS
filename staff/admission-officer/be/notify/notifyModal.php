<!-- APPROVE MODAL -->
<div class="modal fade" id="notify<?php echo $fetch['id']?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action = "be/applicant-review/approveApplication.php?syID=<?php echo $syID ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Send Notification Email</h4>
                    <hr class="default-divider ml-auto">
                </div>
                <div class="modal-body">
                    <input type="hidden" name="applicantID" id="applicantID" value="<?php echo $fetch['id'] ?>">
                    <p class="card-dashboard-header">Email to: 
                    <br>
                        <b>
                            <?php 
                                echo $fetch['first_name'].' '.$fetch['middle_name'].' '.$fetch['last_name'];
                            ?>  
                        </b>
                    </p>
                    <p class="card-dashboard-header">Recommended Program:
                    <br>
                        <b>
                            <?php 
                                if($fetch['approved_first_choice'] == 1 && $fetch['approved_second_choice'] == 1){
                                    echo $fetch1['course_name'];
                                }else if($fetch['approved_first_choice'] == 1 && $fetch['approved_second_choice'] == 0){
                                    echo $fetch1['course_name'];
                                }else if($fetch['approved_first_choice'] == 1 && $fetch['approved_second_choice'] == 3){
                                    echo $fetch1['course_name'];
                                }else if($fetch['approved_first_choice'] == 0 && $fetch['approved_second_choice'] == 1){
                                    echo $fetch2['course_name'];
                                }else if($fetch['approved_first_choice'] == 3 && $fetch['approved_second_choice'] == 1){
                                    echo $fetch2['course_name'];
                                }

                            ?> 
                        </b>
                    </p>
                    <hr class="default-divider ml-auto">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="idNum" required autofocus>
                            <label class="form-label">Enter Student ID Number</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <hr class="default-divider ml-auto">
                    <button type="submit" class="btn btn-link btn-success waves-effect" name="approve" id="approve" onclick="showSuccess();" style="color: #EEEEEE;">Send Notification Email</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>