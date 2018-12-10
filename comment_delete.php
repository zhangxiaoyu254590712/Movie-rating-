<?php
$cID = $_GET["cID"];
?>
<html>
<body>
<?php
echo $cID;
$con = mysqli_connect("localhost", "root", "root", "movierate");
if (!$con) {
	die('Could not connect: '.mysqli_error());
}

$com      = mysqli_query($con, "SELECT * FROM `comment` WHERE `comID` ='$cID'");
$row      = mysqli_fetch_array($com);
$mID      = $row['movieID'];
$query    = mysqli_query($con, "DELETE FROM `comment` WHERE `comID` = $cID");
$comments = mysqli_query($con, "SELECT * FROM `comment` WHERE `movieID` ='$mID'");
while ($row4 = mysqli_fetch_array($comments)) {
	$total += $row4['ratings'];
	$round += 1;
}
//echo $total;

$new   = $total*2/$round;
$mcate = mysqli_query("UPDATE `movies` SET `mrates` = '$new' where `movieID`='$mID'");

mysqli_close($con);
?>
</body>
</html>