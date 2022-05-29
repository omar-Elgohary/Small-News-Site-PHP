<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" name="keywords" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div> <!-- /.input-group -->
</form>
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php
                    //step 1 
                        $sqlCategories = " SELECT * FROM `categories` LIMIT 4 ";
                        $allCategories = mysqli_query($connection ,  $sqlCategories);

                        while( $category= mysqli_fetch_assoc($allCategories) ):
                            $cat_id = $category['cat_id'];
                            $cat_title = $category['cat_title'];
                    ?>
                    <li>
                        <a href="bycategory.php?cid=<?=$cat_id?>"><?=$cat_title?></a>
                    </li>
            <?php  
        endwhile; ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
      
    </div><!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>