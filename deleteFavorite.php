<?php
session_start();
$movieID = $_POST["movieID"];

$uname = $_SESSION['login_user'];
$con   = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$con) {
	die('Could not connect: '.mysqli_error());
}
$user = mysqli_query($con, "SELECT * FROM `users` WHERE `uname`='$uname'");
$u    = mysqli_fetch_array($user);
$uID  = $u['uID'];

mysqli_query($con, "UPDATE  favorites SET showFlag = 0 WHERE `uID`='$uID' AND `movieID`='$movieID'");
mysqli_close($con);
header("location: favorites.html");

?>
