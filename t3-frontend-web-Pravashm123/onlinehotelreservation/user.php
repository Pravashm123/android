
<?php

session_start();
if(!isset($_SESSION['username'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Animal Shelter | User Page</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/design.css">
<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

  <!-- banner -->
  <div class="userbanner">
    <div class="banner-info">
      <!-- header -->
      <div class="header">
        <div class="container-fluid">
          <div class="ban-header">
            <div class="ban-logo">
              
              <h1>
                <a href="index.php">S<span>A</span>S</a>
                <hr>
                <p><span>Spencer Animal</span> Shelter</p>
                <h3> Welcome   <?php echo $_SESSION ['username'];?></h3>
                <?php
                $_SESSION['pic'];
                ?>



              <h1>Dogs are often called "man's best friend"</h1>


              </h1>
            </div>

          </div>
            <!-- navigation -->
            <div class="header-nav">
              <nav class="navbar navbar-inverse navbar-fixed-default" id="nav">
                <div class="collapse navbar-collapse">
                  <ul>
                    <li><a href="user.php">Home</a></li>
                     <li><a href="donate.php">Donate Us</a></li>
                   
                 <!--   <li><a href="#">About Us</a></li> -->
                   <!--  <li><a href="#">Features</a></li> -->
                    <li><a href="adopt.php">Adopt</a></li>
                    <li><a href="userforum.php">Forum</a></li>
                    <li><a href="logout.php">Log Out</a></li>


  <?php
   $con=mysqli_connect("localhost","root","","pravash_160452") or die("Unsucessful");
  //$id=$_GET['id'];
  $sql="select * from user";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($result);
   // $id=$row["id"];
     // $fname=$row["fname"];
   // $session_start;
  //  $_SESSION["id"]=$id;
  ////     $_SESSION["fname"]=$fname;
    ?>
                    <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Setting
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu" id="toogle">

    
           <li><a href="editprofile.php?id=<?php echo $_SESSION['id'];?>">Edit Profile</a></li>
                            <li><a href="pwd.php">Change Password</a></li>


                          </ul>
                      </li>

                      <li>
                       
                      <!-- <span class="glyphicon glyphicon-log-in"></span>
                        <input type="button" name="login" value="Login" class="loginbtn" data-toggle="modal" data-target="#myModal"> -->
                      
                    </li>
                  </ul>
                </div>
              </nav>
              
            </div>
            <!-- end of navigation -->
          </div>
        </div>s
      </div>
      <!-- end of header -->
      <!-- banner-text -->
      <div class="banner-text"> 
        <div class="container">
          <div class="banner-text1">
            <div class="banner-text2">
              <h2>Welcome To <i>Spencer Animal Shelter</i></h2> <br>
              <marquee behavior="alternate"><h3>Visit Us <i> For</i> Share Love TO <i> Animal</i>..</h3></marquee>
            </div>
          </div>  
        </div>
      
      <!-- //banner-text -->  
    </div>
  </div>
  <!-- end of banner -->


  <div class="About" id="about">
    <div class="container-fluid">
      <div class="col-md-6 about1">
        <img src="images/g1.jpg">
      </div>
      <div class="col-md-4 about1">
        <h1>About Us</h1>
        <p>  <b>Spencer Animal Shelter</b> (SAS) is a leading animal care shelter that looks for different types of shapes and sizes of  animal.They mainly look cats and dogs ,hence they also looks to rehome chickens,rabbits,sheep,goatsmice and many more!</p>
      </div>
    </div>
  </div>

  <div class="container-fluid">
  <h2>Our Services</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="images/DogTrainingSlide3.jpg" alt="Los Angeles" style="width:100%; height: 600px;">
        <div class="carousel-caption">
          <h3>We provided Traning to pets</h3>
          <p>We offer a diverse selection superior serices and products,Our staff member trained your pets quilcky to becmone part of your family</p>
        </div>
      </div>

      <div class="item">
        <img src="images/S15-Vet-Banner-Slide1.jpg" alt="Chicago" style="width:100%; height: 600px;">
        <div class="carousel-caption">
          <h3>We provide veterinary Serivces</h3>
          <p>Veterinary Services of Aiken provides quality veterinary care for dogs and cats in Aiken, Edgefield, and Barnwell, South Carolina, as well as the surrounding communities of the Central Savannah River Area (CSRA). We are the oldest established veterinary hospital in Aiken.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="images/clinic_logo_new-712.png" alt="New York" style="width:100%; height: 600px;">
        <div class="carousel-caption">
          <h3 style="background-color: black">Emergency Care</h3>
          <p style="background-color: black">We offer animal emergency care services. If you're concerned about your pet, never feel embarrassed about contacting us (803-648-5489). A simple phone call could save your pet's life. A local Answering Service will call one of our doctors immediately, and you will receive a call back quickly. Please do not email or leave a message on our voicemail, because we do not screen these systems frequently during the day.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

  <div class="gallery">
    <div class="container-fluid">
      <h2>Gallery</h2>
      <p><i>Our Latest Animals Collections</i></p>
      <ul class="showgallery">
        <li>
          <figure class="gallery1">
            <img src="images/g0.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/g2.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/g3.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/g4.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/g5.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/g6.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/g7.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/g1 (2).jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
      </ul>
    </div>
  </div>

  <div class="contact">
    <div class="container contact-bg">
      <h2><span>Contact</span> Us</h2>
      <div class="contact1">
        <div class="row">
          <div class="col-xs-4 cont">
            <span class="glyphicon glyphicon-home effect1" aria-hidden="true"></span>
            <h5>Visit Us</h5>
            <p>Manchester,UK</p>
          </div>
          <div class="col-xs-4 cont">
            <span class="glyphicon glyphicon-envelope effect1"></span>
            <h5>Mail Us</h5>
            <p>sas67@gmail.com</p>
          </div>
          <div class="col-xs-4 cont">
            <span class="glyphicon glyphicon-earphone effect1"></span>
            <h5>Call Us</h5>
            <p>+977-989856712</p>
          </div>
        </div>
        <div class="row">
            <form method="" action="">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Full Name :</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email :</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone :</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter Your Phone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="comment">Comment :</label>
                      <textarea class="form-control" rows="5" placeholder="Your Comments..."></textarea>
                    </div>
                    <button class="btn btn-primary form-control" >Send Message</button>
                </div>
              </form>
          </div>
      </div>
    </div>
  </div>

  <!-- newsletter -->
  <div class="subscribe">
    <div class="subscribe1">
      <div class="container">
        <h3>Subscribe To Our <span> NewsLetter</span></h3>
        <form>
          <input type="email" name="email" placeholder="Enter Email Address" class="subs" required="required">
          <input type="submit" name="subscribe" value="Subscribe">
        </form>
      </div>
    </div>
  </div>
  <!-- end of newsletter -->
  <!-- footer -->
  <div class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="col-md-4 col-sm-6 footer1">
          <div class="logo">
            <h2><a href="index.php"><span>Spencer</span> Animal<span>Shelter</span></a></h2>
          </div>
          
        </div>
        <div class="col-md-4 col-sm-6 footer2">
          <h3>Need Help</h3>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">User Manual</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-6 footer3">
          <h3>Social Networks</h3>
          <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
          <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
          <a class="pinterest" href="#"><i class="fa fa-google-plus"></i></a>
          <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <p>copyright &copy; 2018 <span>Spencer Animal Shelter</span> | All Rights Reserved | Designed by: <i>Pravash Mahato</i></p>
      </div>
    </div>
  </div>

  <!-- login and registration modal -->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>