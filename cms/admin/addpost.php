<?php
include('./inc/admin_header.php');
include('./inc/admin_navbar.php');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header"> Sally News <small>Add New Post</small> </h1>

        <div class="row">
            <div class="col-12">

          <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label>Post Title</label>
            <input type="text" name="post_title" class="form-control">
          </div> <!-- title -->

          <div class="form-group">
            <label>Post Category</label>
            <select name="category" class="form-control">
            <?php 
                $sqlCategories = " SELECT * FROM `categories` ";
                $allCategories = mysqli_query($connection ,  $sqlCategories);

                while( $category =  mysqli_fetch_assoc($allCategories) ):
                        $cat_id = $category['cat_id'];
                        $cat_title = $category['cat_title'];
            ?>
                          <option value="<?=$cat_id?>"><?=$cat_title?></option>; 
         <?php   endwhile; ?>
            </select>
          </div> <!-- category -->


          <div class="form-group">
            <label>Post Author</label>
            <input type="text" name="post_author" class="form-control">
          </div> <!-- author -->


          <div class="form-group">
            <label>Post Image</label>
            <input type="file" name="post_image" class="form-control">
          </div> <!-- Image -->

          <div class="form-group">
            <label>Post Content</label>
            <textarea rows="5" name="post_content" class="form-control"></textarea>
          </div> <!-- Content -->

          <div class="form-group">
            <label>Post Tags</label>
            <input type="text" name="post_tags" class="form-control">
          </div> <!-- Tags -->


          <div class="form-group">
            <input type="submit" name="add_post" class="btn btn-block btn-primary btn-lg">
          </div> <!-- submit -->

          </form>
            </div>
<?php
    if(isset($_POST['add_post'])){
        $post_title = $_POST['post_title'];
        $category = $_POST['category'];
        $post_author = $_POST['post_author'];

        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_date= date('d-m-y');
       
        //images
        $image_name = $_FILES['post_image']['name'];
        $image_tmp  = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($image_tmp , "../images/$image_name");

     
$insertSql = " INSERT INTO `posts` (`post_title`, `post_author`, `post_date`,`post_image`, `post_content`, `post_tags`, `category`)VALUES
('$post_title','$post_author', now(), '$image_name', '$post_content', '$post_tags','$category') ";

        $createPost = mysqli_query($connection , $insertSql);
        header("Location:posts.php");
    }
?>
        </div><!-- /.row -->
    </div> <!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php
include('./inc/admin_footer.php');
?>