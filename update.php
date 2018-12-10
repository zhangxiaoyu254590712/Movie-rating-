<?php
$mID=$_GET["id"];
$mname=$_POST["moviename"];
$mdate=$_POST["movieDate"];
$nation=$_POST["mnation"];
$md=$_POST["director"];
$actor=$_POST["actor"];
$category=$_POST["category"];
?>
<html>
<body>
	<?php
	$con   = mysqli_connect("localhost", "root", "root", "movierate",8889);
	if (!$con) {
		die('Could not connect: '.mysqli_error());
	}
// echo $mID.$mname.$mdate.$nation.$md.$actor.$category;
	$findactor = mysqli_query($con,"SELECT * FROM `actor` WHERE `aName`='$actor'");
	if(empty($findactor)){
		echo("add actor first");
	}
	else{
		$mname = mysqli_real_escape_string($con,$mname);
	// get category id
		$cate = mysqli_query($con,"SELECT * FROM `category` WHERE `caName`='$category'");
		$row = mysqli_fetch_array($cate);

		$catID = $row['caID'];
#get actor id
		$actor = mysqli_query($con,"SELECT * FROM `actor` WHERE `aName`='$actor'");
		$row3 = mysqli_fetch_array($actor);
		$actorID = $row3['actorID'];

		$result = mysqli_query($con,"UPDATE `movies` SET `movieName`='$mname',`movieDate`='$mdate',`director`='$md',`mnation`='$nation' WHERE `movieID`='$mID'");

		// echo $result;
		$mcate = mysqli_query($con,"UPDATE `mcate` SET `caID`='$catID' WHERE `movieID`='$mID'");
		// echo $mcate;
		$mactor = mysqli_query($con,"UPDATE `mactor` SET `actorID`='$actorID' WHERE `movieID`='$mID'");
		// echo $mactor;
// 	}
// 	echo "re".$result."mc".$mcate."ma".$mactor;
	if($result &&$mcate &&$mactor)
	{
		echo "update success!";
		echo '<br><a href=Admin.html>Back<a/>';
	}
	else
	{
		echo 'Update failed!';
	}
}
?>
</body>
</html>