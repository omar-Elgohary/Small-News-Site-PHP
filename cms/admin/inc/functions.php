<?php 

    function insertCategory(){
        global $connection;
        if(isset($_POST['add_category'])){
            $cat_title = $_POST['cat_title'];
           // echo $cat_title ; 
           if($cat_title == "" || empty($cat_title)){
            echo '<div class="alert alert-danger">
                 <h1 class="text-center text-danger">This Field Should Not Be Empty </h1>
                    </div>';
           } else{
                $addSql= " INSERT INTO `categories`(`cat_title`) VALUES ('$cat_title') ";
                $addCategory =  mysqli_query($connection ,$addSql );
                header("Location:categories.php");  // auto refresh
           }

        }//if isset
    }//insertCategory


    function deleteCategory(){
        global $connection;
        if(isset($_GET['delete'])){
            $del_id = $_GET['delete'];
            //echo $del_id ;
            $delSql= " DELETE FROM `categories` WHERE `cat_id` = '$del_id' ";
            $delCategory =  mysqli_query($connection ,$delSql );
            header("Location:categories.php");  // auto refresh
        }
    } //deleteCategory


    function allCategories(){
         global $connection;
         $sqlCategories = " SELECT * FROM `categories` ";
         $allCategories = mysqli_query($connection ,  $sqlCategories);

         while( $category =  mysqli_fetch_assoc($allCategories) ):
                 $cat_id = $category['cat_id'];
                 $cat_title = $category['cat_title'];
     ?>
     <tr>
             <td><?=$cat_id?></td>
             <td><?=$cat_title?></td>

             <td class="text-center"><a href="categories.php?edit=<?=$cat_id?>" class="btn btn-warning "> <i class="fa fa-edit"></i> </a></td>
             <td class="text-center"><a href="categories.php?delete=<?=$cat_id?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>
         </tr>
<?php  endwhile;
    }//allCategories





?>