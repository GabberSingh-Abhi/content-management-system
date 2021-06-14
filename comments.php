<?php require_once('inc/top.php');
session_start();
if(!isset($_SESSION['username'])){
 header("Location:login.php");
}elseif (isset($_SESSION['username']) && $_SESSION['role']=='author'){
  header("Location:index.php");
}



//for taking all data on comments page
$session_username=$_SESSION['username'];

if(isset($_GET['del'])){
$del_id=$_GET['del'];

$del_check_query="SELECT * FROM comments WHERE id =$del_id";
$del_check_run=mysqli_query($con,$del_check_query);
if(mysqli_num_rows($del_check_run)> 0)
{     
$del_query="DELETE FROM `comments` WHERE `comments`.`id` = $del_id";

if (isset($_SESSION['username']) && $_SESSION['role']=='admin'){

if(mysqli_query($con,$del_query)){
  $msg="Comments has been Deleted";
}
else{
  $error="Comments has not been removed ";
  }
 }
}else
{
  header("Location:index.php");
}
}




if(isset($_GET['approve'])){
$approve_id=$_GET['approve'];

$approve_check_query="SELECT * FROM comments WHERE id =$approve_id";
$approve_check_run=mysqli_query($con,$approve_check_query);
if(mysqli_num_rows($approve_check_run)> 0)
{     
$approve_query="UPDATE `comments` SET `status` = 'approve' WHERE `comments`.`id` = $approve_id";

if (isset($_SESSION['username']) && $_SESSION['role']=='admin'){

if(mysqli_query($con,$approve_query)){
  $msg="Comments has been Approveed";
}
else{
  $error="Comments has not been Approveed";
  }
 }
}else
{
  header("Location:index.php");
}
}



if(isset($_GET['unapprove'])){
$unapprove_id=$_GET['unapprove'];

$unapprove_check_query="SELECT * FROM comments WHERE id =$unapprove_id";
$unapprove_check_run=mysqli_query($con,$unapprove_check_query);
if(mysqli_num_rows($unapprove_check_run)> 0)
{     
$approve_query="UPDATE `comments` SET `status` = 'pending' WHERE `comments`.`id` = $unapprove_id";

if (isset($_SESSION['username']) && $_SESSION['role']=='admin'){

if(mysqli_query($con,$approve_query)){
  $msg="Comments has been Unapproved";
}
else{
  $error="Comments has not been Unapproveed";
  }
 }
}else
{
  header("Location:index.php");
}
}
























if(isset($_POST['checkboxes'])){
  foreach($_POST['checkboxes'] as $user_id){
   $bulk_option=$_POST['bulk-options'];

   if($bulk_option=='delete'){
    $bulk_del_query="DELETE FROM `comments` WHERE `comments`.`id` =$user_id";
    mysqli_query($con,$bulk_del_query);
   }
   else if ($bulk_option=='approve'){
    $bulk_author_query="UPDATE `comments` SET `status` = 'approve' WHERE `comments`.`id` = $user_id";
    mysqli_query($con,$bulk_author_query);

   }
    else if ($bulk_option=='pending'){
    $bulk_admin_query="UPDATE `comments` SET `status` = 'pending' WHERE `comments`.`id` = $user_id";
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
      <h1><i class="fa fa-comments" aria-hidden="true"></i> Comments <small>View All Comments </small></h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </li>
          <li class="active"> <i class="fa fa-user" aria-hidden="true"></i> Users</li>
        </a>
        </ol>
<?php
if(isset($_GET['reply'])){

  $reply_id=$_GET['reply'];
 $reply_check="SELECT * FROM comments WHERE post_id=$reply_id";
  $reply_check_run=mysqli_query($con,$reply_check);
  if(mysqli_num_rows($reply_check_run) >0){

    if(isset($_POST['reply'])){
      $comment_data=$_POST['comment'];
     // echo $comment_data;








      if(empty($comment_data)){
        $comment_error="Must fill this  field";
         }
      else{
        $get_user_data="SELECT * FROM users WHERE username='$session_username'";
        $get_user_run=mysqli_query($con,$get_user_data);
        $get_user_row=mysqli_fetch_array($get_user_run);


        $first_name=$get_user_row['first_name'];
        $last_name=$get_user_row['last_name'];
        $full_name="$first_name $last_name";

         $email=$get_user_row['email'];
          $image=$get_user_row['image'];
      

      //echo $first_name;
      //echo $session_username;
      
//$insert_comment_query="INSERT INTO `comments` (`date`, `name`, `username`, `post_id`, `email`, `image`, `comment`, `status`) VALUES (CURRENT_TIMESTAMP, '$full_name', '$session_username', '$reply_id', '$email', 
  //'$image', '$comment_data', 'approve')";


  $insert_comment_query="INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES (NULL, CURRENT_TIMESTAMP, '$full_name', '$session_username', '$reply_id', '$email', '', '$image', '$comment_data', 'approve');";


//$x=mysqli_query($con,$insert_comment_query);

  //print_r($x);
  

if(mysqli_query($con,$insert_comment_query)){
$comment_msg="Comments has been submitted";

}else{
$comment_error="Comments has  not been submitted";

}





      }
    }

?>


        <div class="row">
          <div class="col-12 col-sm-8 col-md-6 col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                  <label for="commnet">Commnets:*-</label>

                  <?php
                  
                  if(isset($comment_error)){
                    echo "<span style='color:red;' class='pull-right'>$comment_error</span>";
                  }


                   else if(isset($comment_msg)){
                    echo "<span style='color:green;' class='pull-right'>$comment_msg</span>";
                  }
        




                  ?>







                  <textarea name="comment" id="comment" cols="30" rows="10" placeholder ="Your Comments Here" class="form-control">
                    
                  </textarea>
                </div>
<input type="submit" name="reply" class="btn btn-primary">
            </form>

          </div>

        </div>

<hr>



          <?php
}

}
        $query="SELECT * FROM comments order by id DESC";
        $run=mysqli_query($con,$query);
        if(mysqli_num_rows($run)> 0)
         {     

          ?>





        <form action="" method="post">
            
        <div class="row">
          <div class="col-sm-8">
              <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <select name="bulk-options" id="selectallboxes" class="form-control">
                          <option value="delete">Delete</option>
                          <option value="approve">Approve</option>
                          <option value="pending">Unapprove</option>
                      </select>
                    </div>
                    </div>
                  <div class="col-8">
                  <input type="submit" class="btn btn-success" value="Apply">
                
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
                <th> <input type="checkbox"  id="selectallboxes"></th>
                <th >Sr #</th>
                <th>Date</th>
          
                <th>Username</th>
                <th>Comments</th>
                <th >Status</th>
                <th>Approve</th>
                <th>UnApprove</th>
              <th>Reply</th>
                <th>Del</th>
                
              </tr>
            </thead>
            <tbody>
            <?php

              while($row=mysqli_fetch_array($run)){
                $id=$row['id'];
                $date=getdate(strtotime($row['date']));
               // $date=getdate($row['date']);
                 $username=$row['username'];
                  $status=$row['status'];
                   $comment=$row['comment']; 
                   $post_id=$row['post_id'];
                $day=$date['mday'];
                $month=substr($date['month'],0,3);
                $year=$date['year'];
              
               
               
                
               
              ?>
                
              <tr>
                <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php

                echo $id;?>"></td>
                <td><?php echo $id;?></td>
                <td><?php echo "$day $month $year";?></td>
                
                  <td><?php echo $username;?></td>
                 
                  <td><?php echo $comment;?></td>
                  <td><sapn style="color: <?php 
                  if($status=='approve'){
                      echo 'green';
                  }else if($status=='pending'){
                      echo 'blue';

                  }

                  ?>;" > <?php echo ucfirst($status);?></sapn>
                </td>
                  <td><a href="comments.php?approve=<?php echo $id;?>">Approve</a></td>
                  <td><a href="comments.php?unapprove=<?php echo $id;?>">Unpprove</a></td>
                  
                                 
                  

               
              
                <td><a href="comments.php?reply=<?php echo $post_id;?>"><i class=" fa   fa-reply" aria-hidden="true"></i></a></td>
                <td><a href="comments.php?del=<?php echo $id;?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>

              </tr>
             <?php 
           }

           ?>
            </tbody>
          </table>


  <?php

           }
          else{
          echo "<center><h2>No Users Availbale</h2></center>";
          }
        

          ?>
          <br>
          <br>
          
         </form>
    </div>
  </div>
</div>



<?php require_once('inc/footer.php');?>


