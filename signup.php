
<?php
$con = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$con) {
	die('Could not connect:'.mysql_error());
}

$ru       = 0;
$re       = 0;
$username = $_POST['username'];
$psw      = $_POST['psw'];
$dob      = $_POST['dob'];
$email    = $_POST['email'];
// else not, insert to the table
$user = mysqli_query($con, "SELECT * FROM `users` WHERE `uname` = '$username' ");
while ($row1 = mysqli_fetch_array($user)) {$ru += 1;}
$emailva = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email' ");
while ($row2 = mysqli_fetch_array($emailva)) {$re += 1;}
$query = mysqli_query($con, "INSERT INTO `users` (`uname` ,`psword` ,`email`,`datebirth`)
VALUES ('$username', '$psw', '$email', '$dob')");

if ($ru != 0 && $re != 0) {echo "3";} else if ($ru != 0) {echo "2";} else if ($re != 0) {echo "1";} else {
	echo "0";#0 is succeed
}

?>