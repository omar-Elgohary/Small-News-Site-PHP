<?php
include('./inc/admin_header.php');
include('./inc/admin_navbar.php');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header"> Sally News <small>All Posts</small> </h1>

        <div class="row">
            <div class="col-12">
            <table class="table table-bordered table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>date</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
        $sqlPosts = " SELECT * FROM `posts`   ";
        $allPosts = mysqli_query($connection  ,$sqlPosts );

        while( $post = mysqli_fetch_assoc($allPosts)):
            $post_id = $post['post_id'];
            $post_title = $post['post_title'];
            $post_author = $post['post_author'];
            $post_date = $post['post_date'];
            $post_image = $post['post_image'];
            $post_content= substr($post['post_content'] , 0 ,200) ;
            // $post_content= $post['post_content'];
            $post_tags = $post['post_tags'];
            $post_comments_count = $post['post_comments_count'];
            $category = $post['category'];
?>
                            <tr>
                                    <td><?=$post_id?></td>
                                    <td><?=$post_title?></td>

                                    <td>
                                    <?php 
                $sqlCategories = " SELECT * FROM `categories` WHERE `cat_id`= '$category' ";
                $allCategories = mysqli_query($connection ,  $sqlCategories);

                while( $category =  mysqli_fetch_assoc($allCategories) ):
                        $cat_id = $category['cat_id'];
                        $cat_title = $category['cat_title'];
            
                         echo $cat_title; 
            endwhile; ?>
                                    </td>

                                    <td><?=$post_author?></td>
                                    <td><?=$post_date?></td>
                                    <td><img height="50" src="../images/<?=$post_image?>" alt=""></td>
    <td class="text-center"><a href="posts.php?edit=<?=$post_id?>" class="btn btn-warning "> <i class="fa fa-edit"></i> </a></td>
 <td class="text-center"><a href="posts.php?delete=<?=$post_id?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        <?php 
                         if(isset($_GET['delete'])){
                            $del_id = $_GET['delete'];
                            //echo $del_id ;
                            $delSql= " DELETE FROM `posts` WHERE `post_id` = '$del_id' ";
                            $delPost =  mysqli_query($connection ,$delSql );
                            header("Location:posts.php");  // auto refresh
                        }
                        ?>
                        </table>
            </div>

        </div><!-- /.row -->
    </div> <!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php
include('./inc/admin_footer.php');
?>