<?php
$conn = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$conn) {
	echo "Connection failed!";
		exit;
}
// echo "sb";
$sql = "SELECT * FROM Category";
$result=mysqli_query($conn,$sql);
$index=0;
while($row=mysqli_fetch_array($result)){
	$array[$index++]=$row["caName"];	
}
// echo $index;
echo encodejson($array);
mysqli_close();
function encodeJson($responseData)
{
	return json_encode($responseData);
}
?>