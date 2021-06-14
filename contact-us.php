<?php require_once('inc2/top.php');?>
  </head>
    <body>
    <?php require_once('inc2/header.php');?>


              <div class="jumbotron">
                <div class="container">
                 
                  <div id="details" class="animated fadeInLeft">>
                      <h1 class="animate__animated animate__swing">Contact<span>  us</span></h1>
                      <p>We are available 24*7 .So feel free to Contact Us</p>

                  </div>
                </div>
              <img src="img/3.jpeg" alt="top-image">
              </div>



              <section>
              <div class="container">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                  <div class="col-md-12">
                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCSlO1z4T0DNoeu-oqw_W_2BXVmGK8EVpQ'></script><div style='overflow:hidden;height:500px;width:700px;'><div id='gmap_canvas' style='height:400px;width:700px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://add-map.com/'>google maps iframe embed</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=9a72753b35f9356602f606d1fb1709a040c85747'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(20,77),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(20,77)});infowindow = new google.maps.InfoWindow({content:'<strong>Location Address</strong><br>Home 61,st #2,Khusrupur, Miyantoli<br>803202, Patna<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                      </div>
                    </div>
                      <div class="row">
                  <div class="col-md-12 contact-form">

                    <?php
                    if(isset($_POST['submit'])){
                      $name=mysqli_real_escape_string($con,$_POST['name']);
                      $email=mysqli_real_escape_string($con,$_POST['email']);
                      $website=mysqli_real_escape_string($con,$_POST['website']);
                      $comment=mysqli_real_escape_string($con,$_POST['comment']);

                      //mail send krne ke liye
                      $to="dkdheeraj794@gmail.com";
                      $header="From: $name<$email>";//from: Placement CUSAT <cpocusat@gmail.com>
                      $subject="Message From $name";

 $message="Name: $name \n\n Email: $email \n\n Website: $website\n\n Message:\n $comment";






                      if(empty($name) or empty($email) or empty($comment)){
                        $error="All (*) fields are Required";
                      }else{
                    if(mail($to,$subject,$message,$header)){
                          $msg="Message has been Sent";
                          }
                          else{
                            $error="Message has not been Sent";
                          }
                      }
                    }


                    ?>








                    <h2>Contact- Form </h2>
                    <hr>
                    <form action="" method="post"> 
                      <div class="form-group">
                        <label for="full-name">Full Name :</label>

                  <?php
                  if(isset($error)){
                    echo "<span style='color:red;' class='pull-right'>$error</span>";
                  }
                  else if(isset($msg)){
                     echo "<span style='color:green;' class='pull-right'>$msg</span>";
                  }
                  ?>





                        <input type="text" class="form-control" id="full-name" placeholder="Full-Name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email *:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="website">Website :</label>
                        <input type="text" class="form-control" id="website" placeholder="Website" name="website">
                      </div>
                      <div class="form-group">
                        <label for="message">Messages:</label>
                        <textarea cols="30" rows="10" class="form-control" id="message" name="comment" 
                         placeholder="Your messages should be here..."></textarea>
                      </div>
                      <input type="submit" name="submit" value="submit" class="btn btn-primary">
                    </form>

                  </div>
                </div>
                         
                     
                  </div>
                  <div class="col-md-4">
                  <?php require_once('inc2/sidebar.php');?>

                  </div>
              </div>
              </div>
              </section>
              <?php require_once('inc2/footer.php');?>