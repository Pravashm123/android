<?php

session_start();
if(!isset($_SESSION['username'])) {
  header("location:userforum.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spencer Animal Shelter</title>

 <link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/design.css">
<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">


<!--NAVIGATION-->
  <nav class="navbar navbar-default navbar-fixed-top" id="nav">
      <div class="container "  >
        <div class="navbar-header">
          <a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-tent"></span></a>
           <a class="navbar-brand" href="#"><b><p> Animal Shelter</p></b></a>
          </div>
          <div class="collapse navbar-collapse" >
            <ul class="nav navbar-nav navbar-right">
            <li><a href="user.php" >Home</a></li>
              <li><a href="#" >Forum</a></li>
              <li ><a href="adopt.php"><span class="glyphicon glyphicon-edit"></span>Adopt Now</a></li>

              <li ><a href="index.php" id="logout"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
            </ul>
          </ul>
        </div>
      </div>
  </nav>
  <div class="gallery">
    <div class="container-fluid">
      <h2>Gallery</h2>
      <p><i>Accessories to the Pets</i></p>
      <ul class="showgallery">
        <li>
          <figure class="gallery1">
            <img src="images/dog+house+bank.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/p1.png" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/p2.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/p3.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/p4.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/p5.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/p6.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
        <li>
          <figure class="gallery1">
            <img src="images/p9.jpg" alt="gallery" style="height: 300px;">
          </figure>
        </li>
      </ul>
    </div>
  </div>
  <br>

   <div class="container-fluid" style="margin-top: 4.5%; " id="header">
    <h1 class="text-center">Community Forum</h1>
    <br>
  </div>

  <div class="container" style="margin-bottom: ;">
    <div class="row" style="margin:20px;">
    <div class="col-md-2">
        
    </div>
    <div class="col-md-8" style="background-color:whitesmoke;">
      <h3> Welcome   <?php echo $_SESSION ['username'];?></h3>
      <div class="col-xs-2">
     
        
      </h3>
      </div>
      <div class="col-xs-8">
      <form method="POST" action="forumquery.php">
          <label for="new-forum">
        <h3>New Forum</h3>
        </label>
        <input type="text" name="title" class="form-control" placeholder="Heading" required="required" style="margin-bottom: 10px" />
        <textarea class="form-control" name="content" rows="3" placeholder="Message" style="margin-bottom: 15px;">
              
        </textarea>
        <button type="submit" class="btn btn-primary pull-right" name="posted" style="margin-bottom: 15px;">
              Post
        </button>

   </form>

          
      </div>
    
      </form>

    </div>
    <div class="col-md-2"></div>
    </div>
    <h6>View Forum</h6>
      <?php

  $con=mysqli_connect("localhost","root","","pravash_160452") or die("Unsucessful");
  $sql="select * from post";
   $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result)){
 ?>
    <div class="row" style="margin-bottom: 50px;">
  <div class="col-md-2"></div>

  <div class="col-md-8" style="background-color:;">
    <!--forum Heading-->
    <div class="row">

      <div class="col-xs-2 text-center" style="margin: 5px; color: grey;">

         <h5 style="margin-top: 25%;"><?php echo $row['postdate']; ?></h5>

      </div>
      <div class="col-xs-8" style="margin: 5px">
      
        <h2><?php echo $row['title']; ?></h2>
      </div>
    </div>
    <!--forum heading ends-->

    <!--forum content-->

    <div class="row">

      <div class="col-xs-2" style="color:grey; margin: 5px">
        <h3 class="text-center" style="padding-top:10px"><?php echo $row['username']; ?></h3>
      </div>
      <div class="col-xs-8" style=" margin-bottom:30px; margin: 5px">
        <p style="margin: 10px">
        <?php echo $row['content']; ?>
            
          </p>
         <form method="post" action="forumquery.php">       
        <div class="row">
          <div class="col-xs-2"></div>
          
          <div class="col-xs-6">
                   <textarea class="form-control" name="comment" rows="3" placeholder="comment" style="margin-bottom: 15px;">
              
        </textarea>
          </div>
          <div class="col-xs-4">
           <button type="submit" class="btn btn-primary pull-right" name="cmt" style="margin-bottom: 15px;">
              Comment
        </button>
            
            </div>
          </div>
            </form>
        </div>
</div></div></div>
  </div>
  <?php
}
?>
     <table border='1px'>
<h3>View Comment</h3>
      
<tr>
<th class="text-center" style="padding: 5px;">Comment</th>
<th class="text-center" style="padding: 5px;">Username</th>
<th class="text-center" style="padding: 5px;">Comment Date</th>
<!-- <th class="text-center" style="padding: 5px;">Edit</th> -->

</tr>
  <?php
  $con=mysqli_connect("localhost","root","","Animal_Shelter") or die("Unsucessful");
  $sql="select * from comment";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result)){
    ?>
<tr>

  <td><?php echo $row['cmt'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['date'];?></td>
</tr>
<?php
}
?>
</table>
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>

