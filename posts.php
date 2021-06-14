<?php require_once('inc/top.php');
session_start();
if(!isset($_SESSION['username'])){
 header("Location:login.php");
}
//
$session_username=$_SESSION['username'];
echo $session_username;
//$session_role= $_SESSION['role'];


if(isset($_GET['del'])){
$del_id=$_GET['del'];

//echo $del_id;
//sb users url se id ko pass kra ke kisi bhi post ko delete n kree....

if($_SESSION['role']=='admin'){

$del_check_query="SELECT * FROM posts WHERE id =$del_id";
$del_check_run=mysqli_query($con,$del_check_query);
}
else if($_SESSION['role']=='author'){
$del_check_query="SELECT * FROM posts WHERE id =$del_id and author='$session_username'";
$del_check_run=mysqli_query($con,$del_check_query);
}
if(mysqli_num_rows($del_check_run)> 0)
{     

$del_query="DELETE FROM `posts` WHERE `posts`.`id` = $del_id";

if(mysqli_query($con,$del_query)){
  $msg="Post has been Deleted";
}
else{

  $error="Post has not been removed ";
  
 }
}else
{
   header("Location:index.php");
}
}




if(isset($_POST['checkboxes'])){
  foreach($_POST['checkboxes'] as $user_id){
   echo $bulk_option=$_POST['bulk-options'];

   if($bulk_option=='publish'){
    $bulk_del_query="DELETE FROM `posts` WHERE `posts`.`id` =$user_id";
    mysqli_query($con,$bulk_del_query);
   }
   else if ($bulk_option=='author'){
    $bulk_author_query="UPDATE `posts` SET `status` = 'publish' WHERE `posts`.`id` = $user_id";
    mysqli_query($con,$bulk_author_query);

   }
    else if ($bulk_option=='draft'){
    $bulk_admin_query="UPDATE `posts` SET `status` = 'draft' WHERE `posts`.`id` = $user_id";
    mysqli_query($con,$bulk_admin_query);

   }
   
  }
}

?>
    <body>
      <div id="wrapper">
     <?php require_once('inc/header.php');?>

<div class="container-fluid body">
  <div class="row">
    
         <?php require_once('inc/sidebar.php');?>
   
    <div class="col-md-9">
      <h1><i class="fa fa-file" aria-hidden="true"></i> Posts <small>View All Posts </small></h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard /</li>
          <li class="active"> <i class="fa fa-file" aria-hidden="true"></i> Posts</li>
        </a>
        </ol>





          <?php
         // echo $_SESSION['role'];
         // echo $session_role;
          echo $_SESSION['role'];

          if($_SESSION['role']=='admin'){

            


        $query="SELECT * FROM posts order by id DESC";
        $run=mysqli_query($con,$query);
      }else if($_SESSION['role']=='author'){

        echo "no";

         $query="SELECT * FROM posts WHERE author='$session_username' order by id DESC";
        $run=mysqli_query($con,$query);

      }

        if(mysqli_num_rows($run)> 0)
         {     

          ?>





        <form action="" method="post">
            
        <div class="row">
          <div class="col-sm-8">
              <div class="row">
                  <div class="col-xs-4">
                    <div class="form-group">
                      <select name="bulk-options" id="selectallboxes" class="form-control">
                            <option value="delete">Delete</option>
                            <option value="publish">Change to Publish</option>
                            <option value="draft">Change to Draft</option>
                      </select>
                    </div>
                    </div>
                  <div class="col-xs-8">
                  <input type="submit" class="btn btn-success" value="Apply">
                  <a href="add-post.php" class="btn btn-primary">Add new</a>
                </div>

              </div>
            
          </div>

        </div>
                  <?php
                  if(isset($error)){
                    echo "<span style='color:red;' class='pull-right'>$error</span>";
                  }
                  else if(isset($msg)){
                     echo "<span style='color:green;' class='pull-right'>$msg</span>";
                  }
                  ?>


       <table class="table table-hover table-bordered striped">
            <thead>
              <tr>
                <th> <input type="checkbox" id="selectallboxes"></th>
                <th >Sr #</th>
                <th>Date</th>
                <th>Title</th>
                <th>Author</th>
                 <th>Image</th>
                <th>Categories</th>
                <th>Views</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Del</th>
                
              </tr>
            </thead>
            <tbody>
            <?php

              while($row=mysqli_fetch_array($run)){
                $id=$row['id'];
                $title=$row['title'];
                $author=$row['author'];
                $views=$row['views'];
                $status=$row['status'];
                $categories=$row['categories'];
               
                $image=$row['image'];
                $date=getdate(strtotime($row['date']));
               // $date=getdate($row['date']);
                
                $day=$date['mday'];
                $month=substr($date['month'],0,3);
                $year=$date['year'];
                // echo $image;
             
              ?>
                <tr>
<td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>

                
                <td><?php echo $id;?></td>
                <td><?php echo "$day $month $year";?></td>
                <td><?php echo $title;?></td>
                <td><?php echo ucfirst($author);?></td>
                  
               
        <td><img src="img/<?php echo $image;?> "width="50px" alt="Post Image"></td>

                <td><?php echo $categories;?></td>
                <td><?php echo $views;?></td>
                <td><sapn style="color: <?php 
                  if($status=='publish'){
                      echo 'green';
                  }else if($status=='draft'){
                      echo 'blue';

                  }

                  ?>;" > <?php echo ucfirst($status);?></sapn>
                </td>

              
              
                <td><a href="edit-post.php?edit=<?php echo $id;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                <td><a href="posts.php?del=<?php echo $id;?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>

              </tr>
             <?php }?>
            </tbody>
          </table>


          <?php

           }
          else{
          echo "<center><h2>No Posts Availbale</h2></center>";
          }
        

          ?>

         </form>

    </div>
  </div>
</div>


<?php require_once('inc/footer.php');?>


