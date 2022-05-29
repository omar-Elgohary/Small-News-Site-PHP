<?php 
    include('./inc/admin_header.php');
    include('./inc/admin_navbar.php');
?>
 <div id="page-wrapper">
            <div class="container-fluid"> 
            <h1 class="page-header">  Sally News <small>by sally samir</small> </h1>
             
                <div class="row">
                <div class="col-md-12">
                        <table class="table table-bordered table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Status</th>

                                    <th>Approve</th>
                                    <th>UnApprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                            $sqlComments = " SELECT * FROM `comments` ";
         $allComments  = mysqli_query($connection ,  $sqlComments);

         while( $comment = mysqli_fetch_assoc($allComments)):  
            $comment_id = $comment['comment_id'];
            $comment_post_id = $comment['comment_post_id'];
            $comment_author = $comment['comment_author'];
            $comment_content = $comment['comment_content'];
            $comment_date = $comment['comment_date'];
            $comment_status = $comment['comment_status'];
     ?>
     <tr>
             <td><?=$comment_id?></td>
             <td><?=$comment_author?></td>
             <td><?=$comment_content?></td>
             <td><?=$comment_status?></td>

             <td class="text-center"><a href="comments.php?approve=<?=$comment_id?>" class="btn btn-success "> Approve </a></td>
             <td class="text-center"><a href="comments.php?unapprove=<?=$comment_id?>" class="btn btn-primary ">UnApprove </a></td>
             <td class="text-center"><a href="comments.php?delete=<?=$comment_id?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>
         </tr>
<?php  endwhile; ?>

                            </tbody>
                            <!-- Approve Code -->
                            <?php 
                             if(isset($_GET['approve'])){
                                $approve_id = $_GET['approve'];
                                $approveSql= " UPDATE `comments` SET `comment_status`='approved' WHERE `comment_id` = '$approve_id' ";
                                $approveComment =  mysqli_query($connection ,$approveSql );
                                header("Location:comments.php");  // auto refresh
                            }
                            ?>
                            <!-- UnApprove Code -->
                            <?php 
                             if(isset($_GET['unapprove'])){
                                $unapprove_id = $_GET['unapprove'];
                                $unapproveSql= " UPDATE `comments` SET `comment_status`='unapproved' WHERE `comment_id` = '$unapprove_id' ";
                                $unapproveComment =  mysqli_query($connection ,$unapproveSql );
                                header("Location:comments.php");  // auto refresh
                            }
                            ?>
                            <!-- delete Code -->
                            <?php 
                             if(isset($_GET['delete'])){
                                $del_id = $_GET['delete'];
                                //echo $del_id ;
                                $delSql= " DELETE FROM `comments` WHERE `comment_id` = '$del_id' ";
                                $delComment =  mysqli_query($connection ,$delSql );
                                header("Location:comments.php");  // auto refresh
                            }
                            ?>
                        </table>
                    </div><!-- table -->

                  


                </div><!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
        <?php 
    include('./inc/admin_footer.php');
?>