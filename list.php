<?php
?>
<html>
<body>
<?php

$con = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$con) {
	die('Could no connect: '.mysqli_error());
}

$result = mysqli_query($con, "SELECT * FROM `movies` ");
echo ' <table>
    <tr>
    <th>image</th>
    <th>movie ID</th>
    <th>Title</th>
    <th>Year</th>
    <th>Rating</th>
    <th>Nation</th>
    <th>director</th>
    <th colspan="2">operation</th>
  </tr>';
while ($row = mysqli_fetch_array($result)) {
	echo "<tr>";

	echo '<td><a  href="show.html?mID='.$row['movieID'].'">';
	echo ' <img  class="image" src="images/details/'.$row['movieID'].'.jpg" width="20px" height="40px"/>';
	echo '  </a></td>';
	echo '<td>'.$row['movieID'].'</td>';
	echo '<td>'.$row['movieName'].'</td>';
	echo '<td>'.$row['movieDate'].'</td>';
	echo '<td>'.$row['mrates'].'</td>';
	echo '<td>'.$row['mnation'].'</td>';
	echo '<td>'.$row['director'].'</td>';
	echo '<td><a  href="edit.html?mID='.$row['movieID'].'" >';
	echo ' edit';
	echo '</a></td>';
	echo '<td><a  href="delete.php?mID='.$row['movieID'].'">';
	echo ' delete';
	echo '</a></td>';

}
echo "</tr></table>";
mysqli_close($con);
?>
</body>
</html>