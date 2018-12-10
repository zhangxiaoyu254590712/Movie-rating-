<?php
session_start();
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

$comm = mysqli_query($con, "SELECT * FROM `favorites` WHERE `uID`='$uID' AND `showFlag`=1 ");

echo '<hr>';
while ($row = mysqli_fetch_array($comm)) {
	$mId   = $row['movieID'];
	$movie = mysqli_query($con, "SELECT * FROM `movies` WHERE `movieID`='$mId'");
	$row2  = mysqli_fetch_array($movie);
	echo '<table width="100%">';
	echo "<tbody>";
	echo '<tr class="item">';
	echo '<td width="100" valign="top">';
	echo '<a href="#" title="pic"><img id="1" src="images/details/'.$row['movieID'].'.jpg" width="100px" height="150px" alt="movie pic"/></a>';
	echo "</td>";
	echo '<td valign="top">
							<div class="mcontent">';
	echo '<p>Name: '.$row2['movieName'].'</p>';
	echo '<p>Director: '.$row2['director'].'</p>';
	echo '<p>Nation: '.$row2['mnation'].'</p>';
	// echo '<p>'.$row['time'].'</p>';
	// echo '<div class="rating">';

	// echo '<p><button type="submit" value="" id="DELETE" onclick="cdelete('.$row['comID'].')" />DELETE</p>';
	echo "<form action='deleteFavorite.php' method='post'>";
	echo "<div>";
	echo '<input type="hidden" value='.$row['movieID'].' name="movieID">';
	echo '<input type="submit" value="DELETE" name="delete">';
	echo "</div>";
	echo "</form>";

	echo "</div></div></td>";
	echo "</tr>";
	echo "</tbody>";
	echo '</table>';
	echo "<hr>";
}
mysqli_close($con);
?>
</body>

</html>