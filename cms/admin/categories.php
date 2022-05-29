<?php 
    include('./inc/admin_header.php');
    include('./inc/admin_navbar.php');
?>
 <div id="page-wrapper">
            <div class="container-fluid"> 
            <h1 class="page-header">  Sally News <small>by sally samir</small> </h1>
             
                <div class="row">
                <div class="col-md-6">
                        <table class="table table-bordered table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php allCategories();?>

                            </tbody>
                            <!-- delete Code -->
                            <?php deleteCategory();  ?>
                        </table>
                    </div><!-- table -->

                    <div class="col-md-6">
                        <!-- insert Code -->
                        <?php  insertCategory() ?>

                        <form action="" method="post">
                            <div class="form-group">
                            <label>Category Title</label>
                            <input type="text" class="form-control" name="cat_title">
                            </div><!--  -->

                            <div class="form-group">
                           
                            <button type="submit" class="btn btn-primary btn-block" name="add_category"> Add Category </button>
                            </div><!--  -->

                        </form>


                    <?php  if(isset($_GET['edit'])){
                            $edit_id = $_GET['edit'];
                            ?>

                        <div>
                            <h3 class="text-center"> Edit Category </h3>
                            <form action="" method="post">
                            <div class="form-group">
                            <label>Category Title</label>


                            <?php 
                $sqlCategories = " SELECT * FROM `categories` WHERE `cat_id` ='$edit_id' ";
                $allCategories = mysqli_query($connection ,  $sqlCategories);

                while( $category =  mysqli_fetch_assoc($allCategories) ):
                        $cat_id = $category['cat_id'];
                        $cat_title = $category['cat_title'];
            ?>
                            <input type="text" class="form-control" value="<?=$cat_title?>" name="cat_title">

        <?php  endwhile; ?>



        <?php 
                if(isset($_POST['update_category'])){
                                $cat_title = $_POST['cat_title'];
                                    $updateSql= " UPDATE `categories` SET `cat_title`='$cat_title' WHERE `cat_id` = '$edit_id' ";
                                    $updateCategory =  mysqli_query($connection ,$updateSql );
                                    header("Location:categories.php");  // auto refresh
                            }//if isset
                        ?>


                            </div><!--  -->

                            <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="update_category"> Update Category </button>
                            </div><!--  -->
                        </form>
                        </div>

                            <?php } // if isset edit ?>


                    </div><!-- form -->


                </div><!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
        <?php 
    include('./inc/admin_footer.php');
?>