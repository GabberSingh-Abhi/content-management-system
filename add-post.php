<?php require_once('inc/top.php');
//session check
session_start();
if(!isset($_SESSION['username'])){
 header("Location:login.php");}

$session_username=$_SESSION['username'];
$session_author_image=$_SESSION['author_image'];
echo $session_author_image;

?>
  </head>

  <body>
  <div id="wrapper">
    <?php require_once('inc/header.php');?>

 <div class="container-fluid body">
    <div class="row">
<?php require_once('inc/sidebar.php')?>

  <div class="col-md-9">

                <h1><i class="fa fa-plus-square"></i> Add Post <small> Add New Post</small></h1> <hr>



                <ol class="breadcrumb">
                  <li><a href="indedx.php"><i class="fa fa-tachometer"></i> Dashboard </a></li>
                  <li class="active"> / <i class="fa fa-plus-square"></i> Add Post</li>

                </ol>

                <?php 
                if(isset($_POST['submit'])){

               

                      $title=mysqli_real_escape_string($con,$_POST['title']);
                      $post_data=mysqli_real_escape_string($con,$_POST['post-data']);
                      $categories=$_POST['categories'];
                      $tags=$_POST['tags'];
                      $status=$_POST['status'];
                      $image=$_FILES['image']['name'];
                      $tmp_name=$_FILES['image']['tmp_name'];
                    
               if(empty($title) or empty($post_data) or empty($tags) or empty($image)){
                $error="All (*) fields are required";
               }else{
$insert_query="INSERT INTO `posts` (`id`, `date`, `title`, `author`, `author_image`, `image`, `categories`,
 `tags`, `post_data`, `views`, `status`) VALUES (NULL, CURRENT_TIMESTAMP, '$title', '$session_username', 
'$session_author_image', '$image', '$categories', '$tags', '$post_data', '0', '$status')";
                if(mysqli_query($con,$insert_query)){
                    $msg="Post Has been added";
                    $path="img/$image";

                      //successfull submit hone ke badd sbfields ko balnk bhi kkrr dena hai 
                    $title="";
                    $post_data="";
                    $status="";
                    $tags="";
                    $categories="";









                     if(move_uploaded_file($tmp_name,$path)){
                      copy($path,"../$path");

                      

    /*
       if(mysqli_query($con,$query) > 0){
                        $path="media/$image";
                       
                       if(move_uploaded_file($tmp_name, "media/$image")){
                        copy($path, "../$path");
                       }
                      } */



                      







                   }
                }else{
                  $error="Post Has not been added";
                }
               }

              }


                ?>







               <div class="row">
                  <div class="col-12">
                    <form action="add-post.php" method="post" enctype="multipart/form-data">
                      
                        <div class="form-group">
                          <label for="title">Title:-*</label>

                         <?php
                  if(isset($error)){
                    echo "<span style='color:red;' class='pull-right'>$error</span>";
                  }
                  else if(isset($msg)){
                     echo "<span style='color:green;' class='pull-right'>$msg</span>";
                  }
                  ?>

                          <input type="text" name="title" placeholder="Type Post Title Here" 
                             value="<?php if(isset($title)){echo $title;}?>" 
                          class="form-control">

                        </div>

                        <div class="form-group">
                         <a href="media.php" class="btn btn-primary">Add Media</a>

                        </div>


                        <div class="form-group">
                        <textarea name="post-data" id="textarea" rows="10" class="form-control">
                           <?php if(isset($post_data)){echo $post_data;}?>
                        </textarea>

                        </div>



                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                                    <label for="file">Post Image:-*</label>
                                    <input type="file" name="image">

                            </div>
                          </div>

                           <div class="col-sm-6">
                              <div class="form-group">
                          <label for="categories">Categories:-*</label>
                        <select name="categories" id="categories" class="form-control">
                         
                          <?php


                $cat_query="SELECT * FROM categories ORDER BY ID DESC";
                 $cat_run=mysqli_query($con,$cat_query);
                 if(mysqli_num_rows($cat_run)>0){


                        while($cat_row=mysqli_fetch_array($cat_run)){
                          $cat_name=$cat_row['category'];

                              echo "<option value='".$cat_name."' 
                  ".((isset($categories) and $categories==$cat_name)?"selected":"").">".ucfirst($cat_name)."</option>";

                            }
                             
                           }else{
                            echo "<center><h6>No Categories Available</h6></center>";
                           }
                           ?>

                        </select>
                        </div>

                          </div>
                        </div>


                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                                    <label for="tags">Tags:-*</label>
                                    <input type="text" name="tags" placeholder="Your Tags Here" class="form-control"  value="<?php if(isset($tags)){echo $tags;}?>">

                            </div>
                          </div>

                           <div class="col-sm-4">
                              <div class="form-group">
                          <label for="status">Status:-*</label>
                            <select name="status" id="status" class="form-control">
                            <option value="publish" <?php if(isset($status) and $status=='publish'){echo "selected";}?>>
                             Publish </option>
                            <option value="draft" <?php if(isset($status) and $status=='draft'){echo "selected";}?>>
                            Draft</option>
                        </select>
                        

                        </div>
                          </div>
                          
                          
                        </div>
                        <input type="submit" name="submit" value="Add-Post" class="btn btn-primary">    

                         <br>
                        <br><br><br>

                  </form>                  
                  </div>
                 

              </div>

             
    
    
  </div>
  </div>
</div>
<?php require_once('inc/footer.php')?>