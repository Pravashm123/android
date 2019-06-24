
   <?php
      require("connection.php");
      session_start();
if(isset($_POST['submit'])){
// $id=$_POST['id'];
	$id=$_SESSION['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$code=$_POST['code'];
$email=$_POST['email'];
$username=$_POST['username'];
  mysqli_query($con,"update user set  fname='$fname',lname='$lname',postaladdress='$address',postcode='$code',email='$email',username='$username' where id='$id' ")or die("error");
  echo "Updated";
  
}

      ?>