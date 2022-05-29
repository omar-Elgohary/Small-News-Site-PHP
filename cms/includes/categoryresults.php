<div class="col-md-8">
<h1 class="page-header">
    Sally News  <small>General News Blog</small>
</h1>
<?php 
if(isset($_GET['cid'])){
    $cid = $_GET['cid'];
}
        $sqlPosts = " SELECT * FROM `posts` WHERE `category` = '$cid'   ";
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
<!-- First Blog Post -->
<h2> <a href="post.php?pid=<?=$post_id?>"><?=$post_title?></a></h2>
<p class="lead"> by <a href="index.php"><?=$post_author?></a></p>
<p><span class="glyphicon glyphicon-time"></span> Posted on <?=$post_date?></p>
<hr>
<img class="img-responsive" src="images/<?=$post_image?>" alt="">
<hr>
<p><?=$post_content?></p>
<a class="btn btn-primary" href="post.php?pid=<?=$post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
<hr>
<?php endwhile; ?>

</div><!-- col-8 -->
