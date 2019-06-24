<?php
require("connection.php");
header("content-type:application/xml;");
echo "<?xml version='1.0'?>";

echo "<shelter>";

 $sql="select * from pet";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result)){  
 //   $img_path='images/'.['image'];
  	echo "<animal>";
  	echo "<Id>" . $row['id'] . "</Id>";
  	echo "<name>" . $row['name'] . "</name>";
  	echo "<description>" . $row['description'] . "</description>";
  	echo "</animal>";
  	echo "<image>" . $row['image'] . "</image>";
  	echo "<age>" . $row['age'] . "</age>";
  	echo "<type>" . $row['type'] . "</type>";

  }
echo "</shelter>";

?>