<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Sally News</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            <?php 
                $sqlCategories = " SELECT * FROM `categories` ";
                $allCategories = mysqli_query($connection ,  $sqlCategories);

                while( $category =  mysqli_fetch_assoc($allCategories) ):
                        $cat_id = $category['cat_id'];
                        $cat_title = $category['cat_title'];
            ?>
                <li>
                    <a href="bycategory.php?cid=<?=$cat_id?>"><?=$cat_title ?></a>
                </li>

          <?php  endwhile; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>