<?php 
require("connection.php");
$id=$_GET['id'];
if(!isset($_COOKIE['view']))
{
  $arr = array();
  $arr[] = $id;
    setcookie('view', serialize($arr));

 }
else
{
  
  
   $arr = unserialize($_COOKIE['view']);
   

   if(in_array($id, $arr))
   {

    
}
else
{
  $arr[] = $id;

  setcookie('view', serialize($arr));
}


}
?>       
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Animal Shelter | Home Page</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/design.css">
<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
body{
	background:url(image/g1.jpg);
}
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

</head>
<body >

  <!-- banner -->
  <div class="">
    <div class="banner-info">
      <!-- header -->
      <div class="header">
        <div class="container-fluid">
          <div class="ban-header">
            <div class="ban-logo">
              <h1>
                <a href="user.php">S<span>A</span>S</a>
                <hr>
                <p><span>Spencer Animal</span> Shelter</p>

              </h1>
            </div>

              <?php
require("connection.php");

$sql=mysqli_query($con,"select * from pet where id=$id");
$result=(mysqli_fetch_array($sql));
?>



 <div class="container-fluid" id="cabindetail" style="margin-top: 1%;">
  <div class="col-md-12">
<!--details of luxury cabins-->
    <section>
        <div class="container-fluid"  style="margin-top: 4%; padding-bottom: 2%;  ">
            <h1 class="text-center" style="margin-bottom: 5%; font-family: times;"><?php echo$result['name']; ?></h1>
          <div class="col-sm-6">
            
            
            <img id="myImg" src="images/<?php echo $result['image'] ?>" style="width: 100%; height: 400px;">

          </div>



        <div class="col-sm-6">
          <h2>Details</h2>
          <label for="descp">Description :</label>
          <p>
            <?php echo $result['description'];?>
          </p>
          <label for="facility">Age :</label>
          <p>
              <?php echo $result['age'];?>
          </p>
          <label for="price">Weight :</label>
          <p>
         <?php echo $result['weight'];?>
          </p>
          <label for="price">Type :</label>
          <p>
         <?php echo $result['type'];?>
          </p>         
        
        </div>
        
      </div>
    </section>

  </div>

</div>

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<script type="text/javascript">
  
  // Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

</script>