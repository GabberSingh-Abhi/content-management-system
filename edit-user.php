<?php require_once('inc/top.php');
session_start();
if(!isset($_SESSION['username'])){
 header("Location:login.php");}

  elseif (isset($_SESSION['username']) && $_SESSION['role']=='author'){
  header("Location:index.php");
}
//edit id jb url me jayega to usse query chla ke db se value fetch krr lenge...
if(isset($_GET['edit'])){

$edit_id=$_GET['edit'];
$edit_query="SELECT * FROM users WHERE id = $edit_id";
$edit_query_run=mysqli_query($con,$edit_query);
if(mysqli_num_rows($edit_query_run) >0){
  $edit_row=mysqli_fetch_array($edit_query_run);
  $e_first_name=$edit_row['first_name'];
  $e_last_name=$edit_row['last_name'];
  $e_role=$edit_row['role'];
  $e_image=$edit_row['image'];
  $e_details=$edit_row['details'];
//echo $e_first_name;
}else{
header("Location:index.php");
}

}
else{
header("Location:index.php");
}

?>
</head>
    <body>

      <div id="wrapper">
          <?php require_once('inc/header.php');?>

<div class="container-fluid body">
  <div class="row">
    
         <?php require_once('inc/sidebar.php');?>
    
    <div class="col-md-9">
      <h1><i class="fa fa-user" aria-hidden="true"></i> Edit User <small>Edit User Details</small></h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a></li>
          
        </ol>

 <?php
        if(isset($_POST['submit'])){

        // $date=getdate($row['date']);
//$date=date();
          $first_name=mysqli_real_escape_string($con,$_POST['first_name']);
          $last_name=mysqli_real_escape_string($con,$_POST['last_name']); 
          $password=mysqli_real_escape_string($con,$_POST['password']);
          $role=$_POST['role'];
          $image=$_FILES['image']['name'];
          $image_tmp=$_FILES['image']['tmp_name'];

           $details=mysqli_real_escape_string($con,$_POST['details']);


          if(empty($image)){
            $image=$e_image;
          }

$salt_query="SELECT * from users order by id desc limit 1";

$salt_run=mysqli_query($con,$salt_query);

$salt_row=mysqli_fetch_array($salt_run);
 $salt=$salt_row['salt'];
  $insert_password=crypt($password,$salt);

  if(empty($first_name) or empty($last_name) or empty($image)){
 $error="All(*) fields are required";
  }

else{

$update_query="UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `image` = '$image', `role` = '$role', `details` = '$details'";
//echo $first_name;

  if(isset($password)){
    $update_query .=",`password`='$insert_password'";
  }
  $update_query .=" WHERE `users`.`id` = $edit_id";
  if(mysqli_query($con,$update_query)){
    $msg="users has been updated";
    //for refreshing page
    header("refresh:1;url=edit-user.php?edit=$edit_id");

  }else{
     $error="users has not been updated"; 
  }

}

   
}
        ?>


       
  <div class="row">
       <div class="col-md-8">
         <form action=""method="post" enctype="multipart/form-data">
             
             <div class="form-group">
                <label for="first_name">First_Name*:</label>

                <?php 
                if(isset($error)){
                  echo "<span class='pull-right' style='color:red;'>$error</span>";
                }
                else if(isset($msg))
                {
                echo "<span class='pull-right' style='color:green;'>$msg</span>";
                }
                ?>





                <input type="text" class="form-control" id="first_name" name="first_name" 
                value="<?php echo $e_first_name?>" 
                placeholder="first_Name">
              </div>

              <div class="form-group">
                    <label for="last_name">Last_Name*:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                    value="<?php echo $e_last_name;?>"
                    placeholder="last_Name">
              </div>



              <div class="form-group">
                <label for="Password">Password*:</label>
                <input type="password" class="form-control" id="password" name="password"placeholder="Password">
              </div>

              <div class="form-group">
                <label for="role">Role*:</label>
                <select name="role" id="role" class="form-control" name="role">
                  <option value="author"<?php if($e_role=='author'){echo "Selected";}
                  ?>>Author</option>
                  <option value="admin" <?php if($e_role=='admin'){echo "Selected";}
                  ?>>Admin</option>
                </select>
              </div>

              <div class="form-group">
                <label for="image">Profile Picture*</label>
                <input type="file"  name="image" id="image" >
              </div>


              <div class="form-group">
                <label for="details">Details:*</label>
        <textarea name="details" id="details" cols="30" rows="10" class="form-control">
          <?php echo $e_details;?>
        </textarea>
              </div>


               <input type="submit" name="submit" value="Edit user" class="btn btn-primary">

        </form>
       </div>
         <div class="col-md-4">
         <?php
//not working 
        
            echo "<img src ='img/$e_image' width ='100%'>";
         
         ?>

        </div>
    </div>
  </div>
</div>
</div>


 

<!--?php require_once('inc/footer.php');?-->


