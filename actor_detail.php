<?php 
$aID=$_GET["aID"];
?>
<html>
<body>
<?php

$con = mysqli_connect("localhost","root","root","movierate",8889);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

$result = mysqli_query($con, "SELECT * FROM `actor` WHERE `actorID` = $aID");

while($row = mysqli_fetch_array($result))
 {
  echo "</br></br>";
  echo  '<h1>'.$row['aName'].'</h1>';
  echo "<hr>";
  echo ' <div id="info">';
        echo '<p class="pl">Nation: <span class="attrs" >'.$row['aNation']. '</span></p><br/>';
        echo ' <p class="pl">Date of Birth: <span class="attrs" property="v:genre">'.$row['adatebirth'].'</span></p><br/>';
  echo' </div>';
  echo '<div id="detail">';
        echo '<p class="pl paddingb">Details:</p>';
        echo ' <p class="details">'.$row['ainfo'].'</p>';
  echo ' </div>';
  
 }



mysqli_close($con);
?>
</body>
</html>