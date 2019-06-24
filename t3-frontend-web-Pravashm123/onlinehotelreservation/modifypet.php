
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Animal Shelter | Update Animal Info</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/design.css">
<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>







<div class="container" style="margin-top: 4%;">
    <h1 class="text-center" style="margin-bottom: 2%; padding: 5px;">Update Pets</h1>
    <div class="row">   
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="jumbotron" style=" background: -webkit-linear-gradient(white,grey,white);">
              <?php
require("connection.php");
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from pet where id=$id");
$result=(mysqli_fetch_array($sql));
?>
<form method="post" action="query.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div class="form-group">
          <label for="id">id :</label>
              <input type="text" name="id" class="form-control" value="<?php echo $result['id'];?>">
              </div>
            
          <div class="form-group">
          <label for="name">Name :</label>
              <input type="text" name="name"  class="form-control" value="<?php echo $result['name'];?>">
              </div>
              <div class="form-group">
              <label for="name">Description :</label>
              <textarea class="form-control" name="desc"><?php echo $result['description'];?></textarea>
            </div>
              <div class="form-group">
              <label for="name">Age :</label>
              <input type="text" name="age" class="form-control" value="<?php echo $result['age'];?>">
            </div>
               <div class="form-group">
              <label for="name">Weight :</label>
              <input type="text" name="weight" class="form-control" value="<?php echo $result['weight'];?>">
            </div>
              <div class="form-group">
              <label for="name">Type :</label>
              <input type="text" name="type" class="form-control" value="<?php echo $result['type'];?>">
            </div>
                             <div class="form-group">
          <label for="image">Image :</label>
          <?php echo $result['image'];?>
          <input class="form-control" type="file" name="image" required="plz Update image">
        </div>

            
             
             



            <div class="row">
          <div class="col-md-6">
            <input type="submit" name="modify" class="btn btn-success form-control" value="Update">
          </div>
          
        </div>

           

          </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>