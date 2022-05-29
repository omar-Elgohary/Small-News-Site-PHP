<?php 
include('./includes/header.php');
include('./includes/navbar.php');
?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <?php
                if(isset($_GET['pid'])){
                    $pid = $_GET['pid'];

                    $sqlPosts = " SELECT * FROM `posts` WHERE `post_id` = '$pid'  ";
        $allPosts = mysqli_query($connection  ,$sqlPosts );
        while( $post = mysqli_fetch_assoc($allPosts)):
            $post_id = $post['post_id'];
            $post_title = $post['post_title'];
            $post_author = $post['post_author'];
            $post_date = $post['post_date'];
            $post_image = $post['post_image'];
            // $post_content= substr($post['post_content'] , 0 ,200) ;
            $post_content= $post['post_content'];
            $post_tags = $post['post_tags'];
            $post_comments_count = $post['post_comments_count'];
            $category = $post['category'];
                ?>
                <h1><?=$post_title?></h1>
                <p class="lead">  by <a href="#"><?=$post_author?></a></p>
                <hr>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?=$post_image?>" alt="">
                <hr>
                <p><?=$post_title?><?=$post_content?></p>
                <hr>
<?php endwhile; ?>
                <!-- Blog Comments -->
<?php 
if(isset($_POST['create_comment'])){
    $comment_post_id = $_GET['pid'];
    $comment_author = $_POST['comment_author'];
    $comment_content = $_POST['comment_content'];

    $commentSql="INSERT INTO `comments`( `comment_post_id`, `comment_author`, `comment_content`, `comment_date`, `comment_status`) VALUES ('$comment_post_id','$comment_author','$comment_content',now(),'unapproved')";
    $addComment = mysqli_query($connection , $commentSql);

    $updatPostsSql = "UPDATE `posts` SET `post_comments_count`= `post_comments_count`+1 WHERE `post_id` = '$comment_post_id' "; 
    $updatPosts = mysqli_query($connection , $updatPostsSql);

    header("Location:post.php?pid=$comment_post_id");  // auto refresh
}
?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment_author" placeholder="author">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
     $sqlComments = " SELECT * FROM `comments` WHERE `comment_post_id` = '$pid' AND `comment_status`='approved'";
        $allComments = mysqli_query($connection  ,$sqlComments );
        while( $comment = mysqli_fetch_assoc($allComments)):  
            $comment_id = $comment['comment_id'];
            $comment_post_id = $comment['comment_post_id'];
            $comment_author = $comment['comment_author'];
            $comment_content = $comment['comment_content'];
            $comment_date = $comment['comment_date'];
            $comment_status = $comment['comment_status'];
            ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?=$comment_author?>
                            <small><?=$comment_date?></small>
                        </h4>
                        <?=$comment_content?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 
                include('./includes/sidebar.php');
            ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php 
                include('./includes/footer.php');
            ?>

<?php }else{
    header("Location:index.php");
}  ?>