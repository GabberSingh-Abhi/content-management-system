<?php require_once('inc2/top.php');?>
  </head>
    <body>
    <?php require_once('inc2/header.php');?>   
  
  <?php
  if(isset($_GET['post_id'])){
  $post_id=$_GET['post_id'];
  $views_query="UPDATE posts SET views = views + 1 WHERE id = $post_id";
  mysqli_query($con,$views_query);

  $query="SELECT * FROM posts WHERE status='publish' and id=$post_id";
  $run=mysqli_query($con,$query);

  if(mysqli_num_rows($run)>0){
    $row=mysqli_fetch_array($run);
    $id=$row['id'];
    $date=getdate($row['date']);
     $date=getdate(strtotime($row['date']));

    $day=$date['mday'];
    $month=$date['month'];
    $year=$date['year'];
    $title=$row['title'];
    $image=$row['image'];
    $author_image=$row['author_image'];
    $author=$row['author'];
    $categories=$row['categories'];
    $post_data=$row['post_data'];



  }
  else{ 
    header('Location:index.php');
    //if post ke page me koi diff id jo exist hi nakrti hai wo enter kiya to index page pe la dega
  }
}

?>


<div class="jumbotron">
    <div class="container">
         <div id="details" class="animated fadeInLeft">>
              <h1 class="animate__animated animate__swing">Custom<span>  Posts</span></h1>
              <p>Here you can put your own tag line to make it more attractive</p>

          </div>
    </div>
        <img src="img/3.jpeg" width ="50px"alt="top-image">
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post">
                     <div class="row">
                          <div class="col-md-2 post-date">
                             <div class="day"><?php echo "$day $month $year";?></div>
                          </div>
            
            
                          <div class="col-md-8 post-title">
                                <a href="post.php?post_id=<?php echo $id;?>"><h2><?php echo $title;?></h2></a>
                                <p>Wrtiten By: <span><?php echo ucfirst($author);?></span></p>
                          </div>

                           <div class="col-md-2 profile-picture">
                              <img src="img/<?php echo $author_image;?>" alt="Profile Picture" class="img-circle">
                           </div>
                     </div>
           <a href="img/<?php echo $image;?>"><img src="img/<?php echo $image;?>"alt="Post Image"></a>
          <div class="desc">
              <?php
               echo $post_data;
              ?>
          </div>
       

            <div class="bottom">
              <span class="first">
                <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                <a href="#"> <?php echo ucfirst($categories);?></a>
              </span>

              <span class="second"><i class="fa fa-comment" aria-hidden="true"></i>
                <a href="#">  Comment</a>
              </span>
            </div>

      </div>

<div class="related-posts">
   <h3>Related Posts</h3>
   <hr>
  <div class="row">
    <?php 
    $r_query="SELECT * FROM posts WHERE status='publish' and title like '%title%' limit 3";
     $r_run=mysqli_query($con,$r_query);
    while($r_row=mysqli_fetch_array($r_run)){
      $r_id=$r_row['id'];
      $r_title=$r_row['title'];
      $r_image=$r_row['image'];
      
    
    ?>
      <div class="col-sm-4">
      <a href="post.php?post_id=<?php echo $r_id;?>">
        <img src="img/<?php echo $r_image;?>" alt="Slider 1">
        <h4><?php echo $r_title;?></h4>
      </a>
      </div>
      <?php }?>
       
  </div>
</div>






<div class="author">
  <div class="row">
    <div class="col-sm-3">
       <img src="img/<?php echo $author_image;?>" alt="Profile Picture" class="img-circle">
    </div>
      <div class="col-sm-9">
        <h4><?php echo ucfirst($author);?></h4>
          <?php 
          
          $bio_query="SELECT * FROM users WHERE username='$author'";
          $bio_run=mysqli_query($con,$bio_query);
          if(mysqli_num_rows($bio_run)>0){
            $bio_row=mysqli_fetch_array($bio_run);
            $author_details=$bio_row['details'];


          ?>
          <p>
           <?php echo $author_details;?>
          </p>
        <?php }?>

      </div>
  </div>
</div>


















     

<?php
$c_query="SELECT * FROM comments WHERE status='approve' and post_id=$post_id ORDER BY id DESC";
$c_run=mysqli_query($con,$c_query);
if(mysqli_num_rows($run)>0){

?>
      <!---kuch part delet kiya gya hai--> 
    <?php 
  }

  if(isset($_POST['submit'])){

$cs_name=$_POST['name'];
$cs_email=$_POST['email'];
$cs_website=$_POST['website'];
$cs_comment=$_POST['comment'];
//$cs_date=time();

if(empty($cs_name) or empty($cs_email) or empty($cs_comment)){
$error_msg="ALL (*) fields are Required";
}
else{

$cs_query="INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES (NULL,''$cs_date', '$cs_name', 'user', '$post_id', '$cs_email', '$cs_website', '$image', '$cs_comment', 'pending');";

if(mysqli_query($con,$cs_query)){
$msg="Comment submitted and waiting for Approval";
}
else{
$error_msg="Comment has not be submitted";
}

}



}


    ?>
      
      <div class="comment-box">
        <div class="row">
          <div class="col-12">
             <form action="" method="post"> 
        <div class="form-group">
          <label for="full-name">Full Name * :</label>
          <input type="text" name="name"class="form-control" id="full-name" placeholder="Full-Name">
        </div>


        





    <div class="form-group">
          <label for="email">Email *:</label>
          <input type="text" name="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="website">Website :</label>
          <input type="text" name="website" class="form-control" id="website" placeholder="Website">
        </div>
        <div class="form-group">
          <label for="comment">Comment *:</label>
          <textarea cols="30" rows="10" name="comment" class="form-control" id="comment" placeholder="Your comments should be here..."></textarea>
        </div>

        <input type="submit" name="submit" value="Submit Comment " class="btn btn-primary">
     <?php
     if(isset($error_msg)){
      echo "<span style='color:red;' class='pull-right'>$error_msg</span>";
     }
     elseif(isset($msg)){
      echo "<span style='color:green;' class='pull-right'>$msg</span>";
     }
     ?>
      </form>
          </div>
        </div>
      </div>
      








    </div>
    <div class="col-md-4">
      <?php
        require_once('inc2/sidebar.php');

      ?>
    </div>
</div>
</div>
</section>

 <?php
        require_once('inc2/footer.php');

  ?>
