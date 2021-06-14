<?php require_once('inc/top.php');
//session check
session_start();
if(!isset($_SESSION['username'])){
 header("Location:login.php");}
$session_username=$_SESSION['username'];

$query="SELECT * FROM users WHERE username='$session_username'";
$run=mysqli_query($con,$query);
$row=mysqli_fetch_array($run);
$image=$row['image'];
$id=$row['id'];
  $date=getdate(strtotime($row['date'])); 

   $day=$date['mday'];
    $month=substr($date['month'],0,3);
    $year=$date['year'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$username=$row['username'];
$email=$row['email'];
$role=$row['role'];
$details=$row['details'];

?>
  </head>

  <body id="profile">
  <div id="wrapper">
    <?php require_once('inc/header.php');?>

 <div class="container-fluid body">
    <div class="row">
<?php require_once('inc/sidebar.php')?>

  <div class="col-md-9">

                <h1><i class="fa fa-tachometer"></i>Profile <small> Personal Details</small></h1><hr>



                <ol class="breadcrumb">
                  <li> <a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                   <li class="active"> <i class="fa fa-user"></i> profile</li>
                </ol>


  <div class="row">  
    <div class="col-12">
      <center><img src="img/<?php echo $image;?>" width="200px" class="rounded-circle img-thumbnail" id="profile-image"></center><br>

                <a href="edit-profile.php?edit=<?php echo $id;?>" class="btn btn-primary pull-right value="edit">Edit Profile</a><br><br>


              <center>
                
                <h3>Profile Details</h3>

              </center>
              <br>
<table class="table  table-bordered">
 
    <tr>
      <th scope="col" width="20%">User ID:</th>
      <th scope="col" width="30%"><?php echo $id;?></th>
      <th scope="col" width="20%">Signup Date:</th>
      <th scope="col" width="30%"><?php echo "$day $month $year";?></th>
    </tr>
   

   <tr>
      <th scope="col" width="20%">First Name:</th>
      <th scope="col" width="30%"><?php echo $first_name;?> </th>
      <th scope="col" width="20%">Last Name:</th>
      <th scope="col" width="30%"><?php echo $last_name;?></th>
    </tr>
   

   <tr>
      <th scope="col" width="20%">Username</th>
      <th scope="col" width="30%"><?php echo $username;?></th>
      <th scope="col" width="20%">Email:</th>
      <th scope="col" width="30%"><?php echo $username;?></th>
    </tr>
   

   <tr>
      <th scope="col" width="20%">Role</th>
      <th scope="col" width="30%"><?php echo $role;?></th>
    
    </tr>
   
 
</table>

<div class="row">
  <div class="col-lg-8 col-sm-12">
    <b>Details</b>
    <div><?php echo $details;?> </div>
   
  </div>
</div>

<br>

    </div>
  </div>

  </div>
  </div>
</div>
     


 
<?php require_once('inc/footer.php')?>