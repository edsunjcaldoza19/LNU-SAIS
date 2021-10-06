<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html>

<?php
    include 'includes/header.php';
    include 'includes/topbar.php';
?>
    <section>
        <?php
            include 'includes/left_sidebar.php';
        ?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="block-header">
                        <p class="block-header-text">MANAGE EXAMINATION MODULES</p>
                            <button type="button" class="btn bg-green waves-effect" href="#" data-toggle="modal" data-target="#addExaminationModal">
                                <i class="material-icons">add</i>
                                <span style="font-family: 'Segoe UI', sans-serif; font-weight: 600;">ADD EXAM</span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                Examination Modules
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Exam Title</th>
                                            <th>Time Limit (Mins)</th>
                                            <th>Display Limit</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Manage</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT * FROM `tbl_exam`");
                                            $sql->execute();

                                            while($fetch = $sql->fetch()){
                                        ?>
                                        <tr>
                                            <td><?php echo $fetch['exam_title']; ?></td>
                                            <td><?php echo $fetch['exam_time_limit']; ?> mins.</td>
                                            <td><?php echo $fetch['exam_quest_limit']; ?></td>
                                            <td><?php echo $fetch['exam_start_date']; ?></td>
                                            <td><?php echo $fetch['exam_end_date']; ?></td>
                                            <td style="text-align: center;">
                                                <a href="exam_configure.php?id=<?php echo $fetch['id']; ?>" class="btn bg-teal btn-circle waves-effect waves-circle waves-float"><i class="material-icons">settings</i></a>
                                            </td>
                                            <td style="text-align: center;">
                                                <button class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#delete<?php echo $fetch['id']?>" id="btnDelete"><i class="material-icons">delete</i></button>
                                            </td>
                                            <?php
                                            include 'be/entrance_examination/deleteModal.php';
                                            }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
             <?php include 'be/entrance_examination/addExaminationModal.php'; ?>
        </div>
    </section>
    <?php
        include 'includes/logout_modal.php';
        include 'includes/scripts.php';
    ?>
</body>


<!-- Autosize Plugin Js -->
<script src="../../plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="../../plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<script>
    $(document).ready(function(){
        $('#exam_start_sched').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD HH:mm'
        });
        $('#exam_end_sched').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD HH:mm'
        });

        $.material.init();
    });
</script>

<!-- Custom Js -->
<script src="../../js/pages/forms/basic-form-elements.js"></script>


</html>
