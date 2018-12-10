<?php
$aName     = $_POST['aName'];
$age     = $_POST['age'];
$aNation  = $_POST['aNation'];
$adatebirth = $_POST['adatebirth'];
$ainfo    = $_POST['ainfo'];
?>
<html>
<body>
<?php
$con = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$con) {
	die('Could not connect: '.mysqli_error());
}
#check if the actor is in the db
$sql="SELECT * from Actor where aName=$aName and age=$age";
$result=mysqli_query($con,$sql);
if(!empty($result)){
	echo "The Actor is in the DB";
	
}
else{
	$result = mysqli_query($con, "INSERT INTO Actor (aName,age,aNation,adatebirth,ainfo) VALUES ('$aName','$age','$aNation','$adatebirth','$ainfo')");
	if($result==1)
		echo "insert actor success!<br>";
	else
		echo "error<br>";
}
echo '<a href="admin.html">back</a>'
?>
</body>
</html>