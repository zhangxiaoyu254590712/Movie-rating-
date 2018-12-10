<?php
session_start();
$movieID = $_GET["fmovieId"];
?>
<html>
<body>
<?php

$uname = $_SESSION['login_user'];
$con   = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$con) {
	die('Could not connect: '.mysqli_error());
}
$user = mysqli_query($con, "SELECT * FROM `users` WHERE `uname`='$uname'");
$u    = mysqli_fetch_array($user);
$uID  = $u['uID'];

// mysqli_query($con, "INSERT INTO favorites ( uID, movieID ) VALUES ( '$uID', '$movieID' )");

$result = mysqli_query($con, "SELECT * FROM `favorites` WHERE `uID`='$uID' AND `movieID`='$movieID' AND `showFlag`=1");

if (mysqli_fetch_array($result)) {
	echo "This movie was in your Favorites list";
} else {
	mysqli_query($con, "UPDATE  favorites SET showFlag = 1 WHERE `uID`='$uID' AND `movieID`='$movieID'");
		mysqli_query($con, "INSERT INTO favorites ( uID, movieID, showFlag) VALUES ( '$uID', '$movieID', 1)");
	$row = mysqli_query($con, "SELECT * FROM `favorites` WHERE `uID`='$uID' AND `movieID`='$movieID'");
	if (mysqli_fetch_array($row)) {
		echo "Added to your Favorites list";
	}
}

mysqli_close($con);
?>
</body>

</html>