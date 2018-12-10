<?php 
$mID=$_GET["mID"];
?>
<html>
<body>
<?php

$con = mysqli_connect("localhost","root","root", "movierate",8889);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

echo $mID;
$query1 = mysqli_query($con, "DELETE FROM `mcate` WHERE `movieID` = $mID");
$query2 = mysqli_query($con, "DELETE FROM `mactor` WHERE `movieID` = $mID");
$query3 = mysqli_query($con, "DELETE FROM `movies` WHERE `movieID` = $mID");
echo 'You already delete this movie';
echo '<br><a href="Admin.html">back</a>';

mysqli_close($con);
?>
</body>
</html>