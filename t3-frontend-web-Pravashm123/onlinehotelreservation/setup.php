<?php
  // import query from database
$conn = mysqli_connect("localhost","root","");
$create = "CREATE database pravash_160452";
mysqli_query($conn,$create);

$con= mysqli_select_db($conn,"pravash_160452");

$query1="CREATE TABLE `adopt` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `pet` varchar(200) NOT NULL
)";

$query2="CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `cmt` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `pid` int(11) NOT NULL
)";
$query3="CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  `emailaddress` varchar(200) NOT NULL,
  `phone` int(100) NOT NULL,
  `payment` varchar(100) NOT NULL
)";
$query4="CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `age` int(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `type` varchar(109) NOT NULL
) ";
$query5="CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(599) NOT NULL,
  `postdate` date NOT NULL
)";

$query6="CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `postaladdress` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `pic` varchar(500) NOT NULL
)";
$query7="CREATE TABLE `user_count` (
  `id` int(11) NOT NULL,
  `count` int(11) NOT NULL
)";

$query8="INSERT INTO `comment` (`id`, `cmt`, `username`, `date`, `pid`) VALUES
(17, 'I love dogs more than anything I have my own he is a chiwwaha mix his name bruce I am a dog person', 'Roshan', '2018-04-11', 0),
(18, 'Nice...\r\n        ', 'pravashm', '2018-04-06', 0)";

$query9="INSERT INTO `donate` (`id`, `amount`, `firstname`, `lastname`, `city`, `country`, `zipcode`, `emailaddress`, `phone`, `payment`) VALUES
(4, 200, 'Pravash', 'Mahato', 'Kathmandu', 'Nepal', 44600, 'pravashm97@gmail.com', 2147483647, 'Credit Card'),
(5, 100, 'Pravash', 'Mahato', 'Kathmandu', 'Nepal', 44600, 'pravashm97@gmail.com', 2147483647, 'Credit Card')";

$query10="INSERT INTO `pet` (`id`, `name`, `description`, `image`, `age`, `weight`, `type`) VALUES
(53, 'Oscar (Adopted)', 'Loyal, curious, and famously amusing, this almost-human toy dog is fearless out of all proportion to his size. As with all great comedians, itâ€™s the Affenpinscher apparent seriousness of purpose that makes his antics all the more amusing.', 'Oscar.jpg', 11, '10 pounds', 'Affenpinscher'),
(54, 'Jack', 'The American Eskimo Dog combines striking good looks with a quick and clever mind in a total brains-and-beauty package. Neither shy nor aggressive, Eskies are always alert and friendly, though a bit conservative when making new friends.\n        ', 'jack.jpg', 5, '9 pounds', 'American Eskimo Dog'),
(55, 'Simba', 'The Bengal could never be called delicate. He is an athlete: agile and graceful with a strong, muscular body, as befits a cat who looks as if he belongs in the jungle.', 'bengalcat.png', 7, '12 pounds', 'Bengal Cat'),
(56, 'Lambert', 'The Dorper is an easy care breed which requires a minimum of labor. Its skin covering which is a mixture of hair and wool, will drop off if not shorn to keep it tidy. The Dorper has a thick skin which is highly prized and protects the sheep under harsh climatic conditions.\r\n\r\nThe Dorper is an easy care breed which requires a minimum of labor. Its skin covering which is a mixture of hair and wool, will drop off if not shorn to keep it tidy. The Dorper has a thick skin which is highly prized and p', 'sheep2.jpg', 20, '25 pounds', 'Dorper'),
(65, 'Pan', 'Because of dwarf they can easily shelter        \r\n        ', 'pygmy-goat-puppies-696x358.jpg', 3, '8 pounds', 'Pygmy ')";
$query11="INSERT INTO `post` (`id`, `username`, `title`, `content`, `postdate`) VALUES
(17, 'pravashm', 'Dog Foot Facts', 'Dogs have soft pads on the bottom of their feet which help them to run quickly and quietly', '2018-04-06'),
(19, 'Roshan', 'Adopting New Pet', 'Adopting New Brand is joy.....           \r\n        ', '2018-04-06')";

$query12="INSERT INTO `user` (`id`, `usertype`, `fname`, `lname`, `dob`, `postaladdress`, `postcode`, `email`, `username`, `password`, `date`, `pic`) VALUES
(19, 'Normal', 'Rohan', 'Sah', '2018-04-04', '789089jgh', '1234', 'rosan@gmail.com', 'Roshan', '1234', '2018-04-09', ''),
(22, 'Admin', 'Admin', 'Admin', '1997-01-20', 'UK', '5556', 'admin@gmail.com', 'admin', 'admin', '2018-04-01', ''),
(37, 'Normal', 'pal', 'cv', '2018-04-18', 'cv', 'po', 'c@gmail.com', 'po', 'po', '2018-04-08', '20150323203824.jpg'),
(39, 'Normal', 'Pravash', 'Mahato', '2018-04-20', ' Kathmandu,Nepal', '1234', 'p@gmail.com', 'pl', 'pl', '2018-04-11', 'p.jpg')";

$query13="INSERT INTO `user_count` (`id`, `count`) VALUES
(1, 633)";

$query14="ALTER TABLE `adopt`
  ADD PRIMARY KEY (`id`)";
$query15="ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`)";
 $query16="ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`)";

$query17="ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`)";
$query18="ALTER TABLE `user`
  ADD PRIMARY KEY (`id`)";
$query19="ALTER TABLE `user_count`
  ADD PRIMARY KEY (`id`)";
$query20="ALTER TABLE `adopt`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3";
$query21="ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19";
$query22="ALTER TABLE `donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6";
$query23="ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66";

$query24="ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20";
$query25="ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40";
$query26="ALTER TABLE `user_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";
  mysqli_query($conn,$query1);
  mysqli_query($conn,$query2);
  mysqli_query($conn,$query3);
  mysqli_query($conn,$query4);
  mysqli_query($conn,$query5);
  mysqli_query($conn,$query6);
  mysqli_query($conn,$query7);
  mysqli_query($conn,$query8);
  mysqli_query($conn,$query9);
  mysqli_query($conn,$query10);
  mysqli_query($conn,$query11);
  mysqli_query($conn,$query12);
  mysqli_query($conn,$query13);
  mysqli_query($conn,$query14);
  mysqli_query($conn,$query15);
  mysqli_query($conn,$query16);
  mysqli_query($conn,$query17);
  mysqli_query($conn,$query18);
  mysqli_query($conn,$query19);
  mysqli_query($conn,$query20);
  mysqli_query($conn,$query21);
  mysqli_query($conn,$query22);
  mysqli_query($conn,$query23);
  mysqli_query($conn,$query24);
  mysqli_query($conn,$query25);
  mysqli_query($conn,$query25);
  mysqli_query($conn,$query26);

  
  header("location:index.php");

?>