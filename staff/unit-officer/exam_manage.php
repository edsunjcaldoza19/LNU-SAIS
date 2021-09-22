<?php
    include 'includes/session.php';
    include 'includes/header.php';
    include 'includes/topbar.php';
    include 'includes/left_sidebar.php';
?>
    
    <section class="content">
        <div class="container-fluid">
            
            <div class="block-header">
                 <button type="button" class="btn bg-amber waves-effect"  href="#" data-toggle="modal" data-target="#addExamModal">
                        <i class="material-icons">add</i>
                    <span>ADD EXAM INFORMATION</span>
                </button>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXAM
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
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Exam Title</th>
                                            <th>Description</th>                                            
                                            <th>Time Limit</th>                                            
                                            <th>Display Limit</th>  
                                            <th>Action</th>                                                                                      
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Exam Title</th>
                                            <th>Description</th>                                            
                                            <th>Time Limit</th>                                            
                                            <th>Display Limit</th>  
                                            <th>Action</th>           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                          <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT * FROM `tbl_exam`");
                                            $sql->execute();
                                            
                                            while($fetch = $sql->fetch()){
                                        ?>
                                        <tr>
                                            <td><?php echo $fetch['exam_title']?></td>
                                            <td><?php echo $fetch['exam_description']?></td>
                                            <td><?php echo $fetch['exam_time_limit']?></td>
                                            <td><?php echo $fetch['exam_quest_limit']?></td>
                                            <td><a href="exam_manage.php?id=<?php echo $fetch['id']; ?>" type="button" class="btn btn-success btn-sm">Manage</a></td>
                                            <?php
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
        </div>
    </section>
<?php include 'includes/modals.php';?>
 <?php 
        include 'includes/scripts.php';
    ?>

</body>

</html>
