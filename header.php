    <?php require_once('inc2/db.php');?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark fixed-top">

     

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <a href="index.php"><img src="img/7.png" alt="Logo" width="30px">  My Blog</a>  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav ml-auto ">

      <li class="nav-item">
        <a href="index.php" class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-list-ol" aria-hidden="true"></i>Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
             //require_once('inc2/db.php');
            $query="SELECT * FROM categories ORDER BY id DESC";
            $run=mysqli_query($con,$query);
            if(mysqli_num_rows($run)>0)
            {
              while($row=mysqli_fetch_array($run)){
                $category=ucfirst($row['category']);
                $id=$row['id'];
                //echo "<a class='dropdown-item'href='index.php?cat=".$id."'>$category'</a>";
                 echo "<a  class='dropdown-item' href='index.php?cat=".$id."'>$category'</a>";
              }
            }
            else{
              echo "<a class='dropdown-item 'href='#'>No categories yet</a>";
            }
            ?>
             </div>
      </li>
       <li class="nav-item">
        <a href="contact-us.php" class="nav-link"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> Contact</a>
      </li>
      </ul>
     </div>
</nav>
