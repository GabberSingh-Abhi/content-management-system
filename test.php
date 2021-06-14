<?php require_once('inc2/top.php');?>
  </head>
  <body>
<?php require_once('inc2/header.php');


$number_of_posts=3;//no of post for 1 page =3
if(isset($_GET['page'])){
$page_id=$_GET['page'];
}
else{
$page_id=1;
}

if(isset($_GET['cat'])){

$cat_id=$_GET['cat'];
$cat_query="SELECT * FROM categories WHERE id='$cat_id'";
$cat_run=mysqli_query($con,$cat_query);
$cat_row=mysqli_fetch_array($cat_run);
$cat_name=$cat_row['category'];
}

if(isset($_POST['search'])){
$search=$_POST['search-title'];

$all_posts_query="SELECT * FROM posts WHERE status='publish'";

$all_posts_query.="and tags LIKE '%search%'";


$all_posts_run=mysqli_query($con,$all_posts_query);
$all_posts=mysqli_num_rows($all_posts_run);
$total_pages=ceil($all_posts/ $number_of_posts);
$posts_start_from=($page_id-1)*$number_of_posts;
}
else
{

$all_posts_query="SELECT * FROM posts WHERE status='publish'";
if(isset($cat_name)){
$all_posts_query.="and categories='$cat_name'";
}

$all_posts_run=mysqli_query($con,$all_posts_query);
$all_posts=mysqli_num_rows($all_posts_run);
$total_pages=ceil($all_posts/ $number_of_posts);
$posts_start_from=($page_id-1)*$number_of_posts;
}




?>

<div class="jumbotron">
      <div class="container">
            <div id="details" class="animated fadeInLeft">
                  <h1>Ratan Singh<span>  Blog</span></h1>
                    <p>This is my first Blog</p>

            </div>
      </div>
    <img src="img/3.jpeg" alt="top-image">
</div>


<section>
      <div class="container">
             <div class="row">
                    <div class="col-md-8">
                      <?php
                   
                      $slider_query="SELECT * FROM posts WHERE status='publish' ORDER BY id DESC LIMIT 5";
                      $slider_run=mysqli_query($con,$slider_query);
                      if(mysqli_num_rows($slider_run)>0)
                      {
                          $count=mysqli_num_rows($slider_run);
                        //echo $count;
                    ?>


                         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">


                                     <?php

                                 for($i=0;$i< $count;$i++)
                                 {
                                   
                                  if($i==0)
                                  {
         echo "<li data-target='#carouselExampleIndicators' data-slide-to='".$i."'  class='active'></li>";
                                    //echo "<li data-target='#carousel-example-generic' data-slide-to='".$i."' class ='active'></li>";
                                    
                                   }
                                   else{ 
                                echo "<li data-target='#carouselExampleIndicators' data-slide-to='".$i."' ></li>";   
                                 }
                               }
                             // echo "ID valur".$count;
                             
                         ?>
                   



                                     </ol>
                                  <div class="carousel-inner">
                                    <?php
                              $check=0;
                               while ($slider_row=mysqli_fetch_array($slider_run)) {
                                
                                $slider_id=$slider_row['id'];
                               
                                  $slider_image=$slider_row['image'];
                                    $slider_title=$slider_row['title'];
                                $check=$check+1;
                                echo $check;

                                if($check == 1)
                                {
                                  echo "<div class='carousel-item active'>";
                                }
                                else
                                {
                                   echo "<div class='carousel-item '>";
                                 }
                
                
                        ?>
                          
<a href="post.php?post_id=<?php echo $slider_id;?>"><img class="d-block w-100" src="img/<?php echo $slider_image;?>" alt="First slide"></a>
                                                  <div class="carousel-caption d-none d-md-block">
                                    
                                                          <h2><?php echo $slider_title;?></h2>
                                               </div>
                                         </div>
                                       <?php 
                                     }

                                       ?>
                                     </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
    

<div>




<?php

}


                              if(isset($_POST['search'])){
                                $search=$_POST['search-title'];
                                $query="SELECT * FROM posts WHERE status='publish'";
                    $query.="and tags LIKE '%$search%'";//tags  wale seaarch se mileeetee rhee
                                $query.="ORDER BY id DESC LIMIT  $posts_start_from,$number_of_posts";
 
                              
                       
                               }
                           else{
                            $query="SELECT * FROM posts WHERE status='publish'";
                               if(isset($cat_name)){
                                $query.="and categories='$cat_name'";
                               }
                       $query.="ORDER BY id DESC LIMIT  $posts_start_from,$number_of_posts";

                           }

                                $run=mysqli_query($con,$query);

 
                                if(mysqli_num_rows($run)> 0)
                                {

                                  while($row=mysqli_fetch_array($run)){
                                        $id=$row['id'];
                                        $date=getdate(strtotime($row['date']));

                                        //$date=getdate($row['date']);
                                        $day=$date['mday'];
                                        $month=$date['month'];
                                        $year=$date['year'];
                                        $title=$row['title'];
                                        $author=$row['author'];
                                        $author_image=$row['author_image'];
                                        $image=$row['image'];
                                        $categories=$row['categories'];
                                        $tags=$row['tags'];
                                        $post_data=$row['post_data'];
                                        $views=$row['views'];
                                        $status=$row['status'];
                        ?>




                                        <div class="post">
                                            <div class="row">
                                                <div class="col-md-2 post-date">
                                                      <div class="day"><?php echo "$day $month $year";?></div>
                                                      
                                                 </div>

                                                <div class="col-md-8 post-title">
                                                <a href="#"><h2><?php echo $title; ?> </h2></a>
                                                   <p>Written by:<span><?php echo ucfirst($author); ?></span></p>
                                              
                                                </div>
                                         
                                                <div class="col-md-2 profile-picture">
                                                  
                                                    <img src="img/<?php echo $author_image;?>" alt="Profile Picture" class="img-circle">
                                                   </div>
                                         
                                            </div>
                 <div class="item">
                    <div class="row">
                        <div class="col-md-12">
                         <a href="post.php?post_id=<?php echo $id;?>"> <img src="img/<?php echo $image;?>" alt="Post Image"></a>
                        </div>
                    </div>
                </div>


                  <div class="desc">
                  <?php echo substr($post_data,0,100)."....";?>
                  </div>
               
                  <a href="post.php?post_id=<?php echo $id;?>" class="ram btn btn-primary ">Read more...</a>
                  <div class="bottom">
                    <span class="first"><i class="fa fa-folder-open-o" aria-hidden="true"></i><a href="#"><?php echo 
                    ucfirst($categories);?></a></span>
                    <span class="second"><i class="fa fa-comment" aria-hidden="true"></i><a href="#">  Comment</a></span>
                  </div>
              
     
                                      

                                          <?php
                             }
                            }
                           
                            else
                            {
                              echo "<center><h2> No Posts Available </h2></center>";
                            }
                           ?>

                  
                        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
        <?php
                            for($i=1;$i<=$total_pages;$i++)
                            {
   echo " <li class='".($page_id==$i ?'active':' ')."'><a class='page-link' href='index.php?page=".$i."&".(isset($cat_name)?"cat=$cat_id":"")."'>$i</a></li>";    
                            }
                            ?>
                      
    
     </ul>
</nav>
                  







</div>
                  </div>
                            <div class="col-md-4">
                              
                              <?php require_once('inc2/sidebar.php');?>

                             
                            </div>

                          </div>

                       </div>

                    </section>


<?php require_once('inc2/footer.php');?>
