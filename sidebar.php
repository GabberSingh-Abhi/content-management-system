 <div class="widgets">
      <form action="index.php" method="post">
            <div class="input-group">
                  <input type="text" class="form-control" name="search-title" placeholder="Search for...">
                  <span class="input-group-btn">
                        <input type="submit" name="search" value="Go!" class="btn btn-default">
                  </span>
            </div>
      </form>
</div><!--widgets close-->

<h1><a href="https://covid-56592.web.app">Tracker</a><h1>

          <div class="widgets">
            <div class="popular">
              <h4>Popular Posts</h4>
              



                 <?php
         $p_query="SELECT * FROM posts where status='publish' ORDER BY views DESC LIMIT 5";
              $p_run=mysqli_query($con,$p_query);
              if(mysqli_num_rows($p_run)>0){
                  while($p_row=mysqli_fetch_array($p_run)){
                      $p_id=$p_row['id'];
                      $p_date=getdate($p_row['date']);
                     // $date=getdate(strtotime($row['date']));

                      $p_day=$p_date['mday'];
                       $p_month=$p_date['month'];
                        $p_year=$p_date['year'];
                      $p_title=$p_row['title'];
                      $p_image=$p_row['image'];
                  

              ?>
<hr>
              

               <div class="row">
                  <div class="col-4">
                      <a href="post.php?post_id=<?php echo $p_id;?>"><img src="img/<?php echo $p_image;?>"alt="Image 1"></a>
                  </div>
                    <div class="col-8">
                          <a href="post.php?post_id=<?php echo $p_id;?>"><h6 ><?php echo $p_title;?></h6></a>
                          <p>     <i class="fa fa-clock-o" aria-hidden="true"></i>
                                  <?php echo "$p_day $p_month $p_year";?>
                           </p>
                    </div>
               </div>

                  <?php

             }
              }
              else{
              echo "<h3>No post availabe</h3>";

              }
               ?>



             
      </div>




    </div><!--widgets close-->

               

                

          <div class="widgets">
            <div class="popular">
              <h4>Recent Posts</h4>
               
               <?php
         $p_query="SELECT * FROM posts where status='publish' ORDER BY id DESC LIMIT 5";
              $p_run=mysqli_query($con,$p_query);
              if(mysqli_num_rows($p_run)>0){
                  while($p_row=mysqli_fetch_array($p_run)){
                      $p_id=$p_row['id'];
                      $p_date=getdate($p_row['date']);
                      $p_day=$p_date['mday'];
                       $p_month=$p_date['month'];
                        $p_year=$p_date['year'];
                      $p_title=$p_row['title'];
                      $p_image=$p_row['image'];
                  

              ?>
              <hr>

               <div class="row">
                   <div class="col-4">
                     <a href="post.php?post_id=<?php echo $p_id;?>"><img src="img/<?php echo $p_image;?>"alt="Image 1"></a>
                   </div>
                    <div class="col-8 ">
                      <a href="post.php?post_id=<?php echo $p_id;?>"><h6><?php echo $p_title;?></h6></a>
                      <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                     <?php echo "$p_day  $p_month $p_year";?>
                    </p>
                     </div>
               </div>
               <?php
             }
              }
              else{
              echo "<h3>No post availabe</h3>";

              }
               ?>

</div>
</div><!--widgets close-->

               


<div class="widgets">
      <div class="popular">
              <h4>Categories</h4>
              
       <div class="row">
        <div class="col-6">
          <ul>
           <?php
           $c_query="SELECT * FROM categories";
           $c_run=mysqli_query($con,$c_query);
           if(mysqli_num_rows($c_run)>0)
           {
            $count=2;
            while($c_row=mysqli_fetch_array($c_run))
            {
              
              $c_id=$c_row['id'];
               $c_category=$c_row['category'];
               $count=$count+1;
               if(($count%2)==1)
               {
        echo "<li><a href='index.php?cat=".$id."'>".(ucfirst($c_category))."</a></li>";
            }
          }
           }
           else{
              echo "<p>No Category availabe</p>";
           }

           ?>
          </ul>
        </div>
        <div class="col-6">
           <ul>
             <?php
           $c_query="SELECT * FROM categories";
           $c_run=mysqli_query($con,$c_query);
           if(mysqli_num_rows($c_run)>0)
           {
            $count=2;
              
            while($c_row=mysqli_fetch_array($c_run))
            {
              $c_id=$c_row['id'];
               $c_category=$c_row['category'];
               $count=$count+1;
               if(($count%2)==0)
               {
        echo "<li><a href='index.php?cat=".$id."'>".(ucfirst($c_category))."</a></li>";
            }
          }
           }
           else{
              echo "<p>No Category availabe</p>";
           }

           ?>
            
             </ul>
        </div>

            

            


        

    </div>
    </div>
</div><!--widgets close-->








          

    <div class="widgets">
      <div class="popular">
              <h4>Social Icons</h4>
              <hr>
              <div class="row">
                <div class="col-4">
                  <a href="https://touch.facebook.com/home.php?refsrc=https%3A%2F%2Ftouch.facebook.com%2Fcheckpoint%2F&_rdr"><img src="img/1.jpeg" alt="Facebook"></a>
                </div>
                 <div class="col-4">
                    <a href="https://twitter.com/home"><img src="img/5.png" alt="Twitter"></a>
                 </div>
                  <div class="col-4">
                      <a href="https://aboutme.google.com/u/0/?referer=gplus"><img src="img/10.png" alt="Google Plus"></a>
                  </div>
              </div>


              <hr>
              <div class="row">
                <div class="col-4">
                  <a href="https://www.linkedin.com/feed/"><img src="img/2.jpeg" alt="Linkedin"></a>
                </div>
                 <div class="col-4">
                    <a href="https://www.skype.com/"><img src="img/4.jpeg" alt="Skype"></a>
                 </div>
                  <div class="col-4">
                      <a href="https://www.youtube.com/"><img src="img/6.png" alt="Youtube"></a>
                  </div>
              </div>

       </div>  
      
  </div><!--widgets close-->

   

