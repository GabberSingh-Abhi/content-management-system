<?php require_once('inc/top.php');
//session check
session_start();
if(!isset($_SESSION['username'])){
 header("Location:login.php");
}
$comment_tag_query="SELECT * FROM comments WHERE status ='pending'";
$category_tag_query="SELECT * FROM categories";
$users_tag_query="SELECT * FROM users ";
$posts_tag_query="SELECT * FROM posts ";

$com_tag_run=mysqli_query($con,$comment_tag_query);
$cat_tag_run=mysqli_query($con,$category_tag_query);
$user_tag_run=mysqli_query($con,$users_tag_query);
$post_tag_run=mysqli_query($con,$posts_tag_query);

$com_rows=mysqli_num_rows($com_tag_run);
$cat_rows=mysqli_num_rows($cat_tag_run);
$user_rows=mysqli_num_rows($user_tag_run);
$post_rows=mysqli_num_rows($post_tag_run);

?>
  </head>

  <body>
  <div id="wrapper">
    <?php require_once('inc/header.php');?>

 <div class="container-fluid body">
    <div class="row">
<?php require_once('inc/sidebar.php')?>

  <div class="col-md-9">

                <h1><i class="fa fa-tachometer"></i> Dashboard <small> Statistics Overview</small></h1>


                <ol class="breadcrumb">
                  <li class="active">Dashboard</li>
                </ol>


      <div class="row tag-boxes">

                <div class="col-md-6 col-lg-3">
                  <div class="panel panel-primary tag1">
                    <div class="panel-heading">
                      <div class="row">
                            <div class="col-3">
                              
                              <i class="fa fa-comments fa-4x"></i>
                            </div>
                            <div class="col-9">

                              <div class="text-right huge">
                                <?php
                                echo $com_rows;

                                ?>
                              </div>
                              <div class="text-right"> New Comments</div>
                            </div>
                      </div>
                    </div>
                    <hr>
                    <a href="comments.php">
                      <div class="panel-footer">
                        <span class="pull-left">Views All Comments </span>
                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                         <div class="clearfix"></div>
                      </div>
                    </a>
                  </div>
                  
                </div>


                 <div class="col-md-6 col-lg-3">
                  <div class="panel panel-primary tag2">
                    <div class="panel-heading">
                      <div class="row">
                            <div class="col-3">
                              
                              <i class="fa fa-file-text fa-4x"></i>
                            </div>
                            <div class="col-9">

                              <div class="text-right huge">
                                
                                 <?php
                                echo $post_rows;

                                ?>
                              </div>
                              <div class="text-right">New Posts</div>
                            </div>
                      </div>
                    </div>
                    <hr>
                    <a href="posts.php">
                      <div class="panel-footer">
                        <span class="pull-left">Views All Posts </span>
                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                         <div class="clearfix"></div>
                      </div>
                    </a>
                  </div>
                  
                </div>

                 <div class="col-md-6 col-lg-3">
                  <div class="panel panel-primary tag3">
                    <div class="panel-heading">
                      <div class="row">
                            <div class="col-3">
                              
                              <i class="fa fa-users fa-4x"></i>
                            </div>
                            <div class="col-9">

                              <div class="text-right huge">
                                
                                 <?php
                                echo $user_rows;

                                ?>
                              </div>
                              <div class="text-right">New Users</div>
                            </div>
                      </div>
                    </div>
                    <hr>
                    <a href="users.php">
                      <div class="panel-footer">
                        <span class="pull-left">Views All Users </span>
                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                         <div class="clearfix"></div>
                      </div>
                    </a>
                  </div>
                  
                </div>


              <div class="col-md-6 col-lg-3">
                  <div class="panel panel-primary tag4">
                    <div class="panel-heading">
                      <div class="row">
                            <div class="col-3">
                              
                              <i class="fa fa-folder-open fa-4x"></i>
                            </div>
                            <div class="col-9">

                              <div class="text-right huge">
                                
                                 <?php
                                echo $cat_rows;

                                ?>
                              </div>
                              <div class="text-right">All Categories</div>
                            </div>
                      </div>
                    </div>
                    <hr>
                    <a href="categories.php">
                      <div class="panel-footer">
                        <span class="pull-left">Views All Categories </span>
                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                         <div class="clearfix"></div>
                      </div>
                    </a>
                  </div>
                  
                </div>
              </div>

                <hr>

<?php

$get_users_query="SELECT * FROM users ORDER BY id DESC LIMIT 5";
$get_users_run=mysqli_query($con,$get_users_query);
if(mysqli_num_rows($get_users_run)>0){


?>

<h3>New Users</h3>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr#</th>
      <th scope="col">Date</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($get_users_row=mysqli_fetch_array($get_users_run)){
      $users_id=$get_users_row['id'];
       $users_date=getdate(strtotime($get_users_row['date']));
       $day=$users_date['mday'];
        $month=substr($users_date['month'],0,3);
        $year=$users_date['year'];

      //  $date=getdate(strtotime($row['date']));
        $users_firstname=$get_users_row['first_name'];
         $users_lastname=$get_users_row['last_name'];
         $users_fullname="$users_firstname $users_lastname";
          $users_username=$get_users_row['username'];
          $users_role=$get_users_row['role'];

    

    ?>
    <tr>
      <td><?php echo $users_id;?></td>
      <td><?php echo "$day $month $year";?></td>
      <td><?php echo $users_fullname;?></td>
        <td><?php echo ucfirst($users_username);?></td>
      <td><?php echo ucfirst($users_role);?></td>
    </tr>
    <?php }?>
    </tbody>
</table>

<a href="users.php" class="btn btn-primary">View All users</a>
<?php }?>

<?php

$get_posts_query="SELECT * FROM posts ORDER BY id DESC LIMIT 5";
$get_posts_run=mysqli_query($con,$get_posts_query);
if(mysqli_num_rows($get_posts_run)>0){


?>

<h3>New Posts</h3>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sr#</th>
      <th scope="col">Date</th>
      <th scope="col">Post Title</th>
      <th scope="col">Categories</th>
      <th scope="col">Views</th>
    </tr>
  </thead>
  <tbody>
     <?php
    while($get_posts_row=mysqli_fetch_array($get_posts_run)){
      $posts_id=$get_posts_row['id'];
       $posts_date=getdate(strtotime($get_posts_row['date']));
       $day=$posts_date['mday'];
       $month=substr($posts_date['month'],0,3);
      $year=$posts_date['year'];

        $posts_title=$get_posts_row['title'];
         $posts_categories=$get_posts_row['categories'];
          $posts_views=$get_posts_row['views'];
    ?>
    <tr>
      <th><?php echo $posts_id;?></th>
      <td><?php echo "$day $month $year";?></td>
      <td><?php echo $posts_title;?></td>
      <td><?php echo $posts_categories;?></td>
      <td><i class="fa fa-eye"></i> <?php echo $posts_views;?></td>
    </tr>
      <?php }?>
     </tbody>
</table>  
  <a href="posts.php" class="btn btn-primary">View All Posts</a>
  <?php }?>
  <hr> 

  </div>
  </div>
</div>
<?php require_once('inc/footer.php')?>