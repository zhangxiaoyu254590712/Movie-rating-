<?php
$name     = $_POST['moviename'];
$year     = $_POST['year'];
$ratings  = $_POST['ratings'];
$director = $_POST['director'];
$actor    = $_POST['actor'];
$category = $_POST['category'];
$nation   = $_POST['nation'];
var_dump($_FILES); 
$file = $_FILES["img"];
?>
<html>
<body>
	<?php
	$con = mysqli_connect("localhost", "root", "root", "movierate",8889);
	if (!$con) {
		die('Could not connect: '.mysqli_error());
	}
#search actor
	$findactor = mysqli_query($con,"SELECT * FROM `actor` WHERE `aName`='$actor'");
	if(empty($findactor)){
		echo("add actor first");
	}
	else{
#get category id
		$cate  = mysqli_query($con, "SELECT * FROM `category` WHERE `caName`='$category'");
		$row   = mysqli_fetch_array($cate);
		$catID = $row['caID'];
#insert a new movie
		$query = mysqli_query($con, "INSERT INTO `movies` (`movieName` ,`movieDate` ,`mrates`,`director`,`mnation`)
			VALUES ('$name', '$year', '$ratings', '$director','$nation')");
#get movie id
		$movies = mysqli_query($con, "SELECT * FROM `movies` WHERE `movieName`='$name'");
		$row2   = mysqli_fetch_array($movies);
		$mID    = $row2['movieID'];
#insert relation to movie and category
		$mcate = mysqli_query($con, "INSERT INTO `mcate`(`caID`, `movieID`) VALUES ('$catID','$mID')");
#search actor


#get actor id
		$actor   = mysqli_query($con, "SELECT * FROM `actor` WHERE `aName`='$actor'");
		$row3    = mysqli_fetch_array($actor);
		$actorID = $row3['actorID'];
#inter relation to movie and actor
		$mactor = mysqli_query($con, "INSERT INTO `mactor`(`actorID`, `movieID`) VALUES ('$actorID','$mID')");
		echo "insert movie success!<br>";
		echo '<a href="admin.html">back</a>';
		// $mID
		if ($file["error"] == 0) {

			$typeArr = explode("/", $file["type"]);
			if($typeArr[0]== "image"){
				$imgType = array("png","jpg","jpeg");
				if(in_array($typeArr[1], $imgType)){ 
					$imgname = "images/details/".$mID.".jpg";
					$bol = move_uploaded_file($file["tmp_name"], $imgname);
					if($bol){
						echo "Success!";
					} else {
						echo "Fail!";
					};
				};
			} else {
				echo "Error";
			};
		} else {
			echo $file["error"];
		};
	}
	?>
</body>
</html>