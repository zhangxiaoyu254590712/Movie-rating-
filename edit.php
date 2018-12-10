<?php 
$mID=$_GET["mID"];
?>

<?php

$con = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$con) {
	die('Could not connect: '.mysqli_error());
}
$result = mysqli_query($con,"SELECT * FROM `movies` WHERE `movieID` = $mID");

echo '<form  method = "POST" action="update.php?id='.$mID.'" >';
while($row = mysqli_fetch_array($result))
 {
    	$movieID=$row['movieID'];
       echo 'movie name:<input type ="text" name = "moviename" value="'.$row['movieName'].'"/><br>';
       echo 'year:<input type ="text" name = "movieDate" value="'.$row['movieDate'].'"/><br>';
       echo 'nation:<input type ="text" name = "mnation" value="'.$row['mnation'].'"/><br>';
       echo 'director:<input type ="text" name = "director" value="'.$row['director'].'"/><br>';
       echo 'actor:<input type ="text" name = "actor"/><br>
		category:<select name="category">
		  <option value ="Animation">Animation</option>
		  <option value ="Comedy">Comedy</option>
		  <option value ="Crime">Crime</option>
		  <option value ="Documentary">Documentary</option>
		  <option value ="Family">Family</option>
		  <option value ="Drama">Drama</option>
		  <option value ="Sci-Fi">Sci-Fi</option>
		  <option value ="Romance">Romance</option>
		  <option value ="War">War</option>
		  <option value ="Action">Action</option>
		</select><br>';
 }
 echo '<button type="submit" >update</button>
		</form>';
echo '<div><img id="1" src="images/details/'.$movieID.'.jpg" width="100px" height="150px" alt="movie pic"/></div>';
mysqli_close($con)
?>