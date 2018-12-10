<?php 
$mID=$_GET["mID"];
?>
<html>
<body>
<?php
$con = mysqli_connect("localhost","root","root", "movierate",8889);
if (!$con)
  {
  die('Could not connect: ' . mysqlI_error());
  }

$result = mysqli_query($con, "SELECT * FROM `movies` WHERE `movieID` = $mID");
while($row = mysqli_fetch_array($result))
 {
  
  
  echo '<h1>'.$row['movieName'].'</h1>';
   echo ' <div id="mainpic" style="float:left; margin-right: 50px;">';
       $mID=$row['movieID'];
       echo' <img  class="image" src="images/details/'.$row['movieID'].'.jpg" style="height:500px;"/>';
       echo ' </div>';
    echo ' <div id="info">';
    echo ' <p class="pl">Diector: <span class="attrs">'.$row['director'].'</span></p><br/>';
    $mId=$row['movieID'];
    $actor = mysqli_query($con, "SELECT * FROM `actor` WHERE `actorID`IN(SELECT `actorID` FROM `mactor`AS a LEFT JOIN `movies` as m ON a.`movieID` =m.`movieID` WHERE m.`movieID`=$mId)");
    $row2= mysqli_fetch_array($actor);
    $category = mysqli_query($con, "SELECT * FROM `category` WHERE `caID`IN(SELECT `caID` FROM `mcate`AS a LEFT JOIN `movies` as m ON a.`movieID` =m.`movieID` WHERE m.`movieID`=$mId)");
    $row3= mysqli_fetch_array($category);
    $comments = mysqli_query($con, "SELECT * FROM `comment` WHERE `movieID` ='$mID'");
    while($row4 = mysqli_fetch_array($comments)){
    $total+=$row4['ratings'];
    $round +=1;
    }
    //echo $total;

  $new=$total*2/$round;
  $mcate = mysqli_query($con, "UPDATE `movies` SET `mrates` = '$new' where `movieID`='$mID'");
    echo '<p class="pl"> Actor: <span class="attrs"><a href="actor_detail.html?id='.$row2['actorID'].'">'. $row2['aName'].'</a></span></p>';
       # echo ' <p class="pl">Actor: <span ><a class="attrs" href="/" rel="v:starring">Leonardo DiCaprio</a> </span></p><br/>';
       
           echo' <p class="pl">Category: <span class="attrs"property="v:genre">'.$row3['caName'].'</span></p><br/>';
           echo ' <p class="pl">Country: <span class="attrs">'.$row['mnation'].'</span></p><br/>';
           echo  '<p class="pl">Movie Date: <span class="attrs">'.$row['movieDate'].'</span></p><br/>';
        echo '  <p class="pl">Rating: <span class="attrs">'.$row['mrates'].'</span></p><br/>';
        echo ' </div>';

 }
 echo '<table>';

  $comment = mysqli_query($con, "SELECT * FROM `comment` WHERE `movieID` = $mID");
  while($row = mysqli_fetch_array($comment))
 {
  echo '<div class="comment">';
  echo '<h3><span class="comment-info"><p class="users">';
  #query user name to display
  $userID = $row['uID'];
  $user = mysqli_query($con, "SELECT * FROM `users` WHERE `uID` = $userID");
  $row1 = mysqli_fetch_array($user);
  
    echo $row1['uname'].'</p>';
    echo ' <span class="times">';
    echo $row['ratings'].'stars  </span>';
    echo ' <span class="times">';
    echo $row['time'].'</span>';
    
    echo '</span></span></h3>';
    echo'<p class="comcontent">'.$row['content'].'</p>
          </div>
       <div class="comment">';

 }
if (empty($result)){
  echo '<h2>No Result!</h2>';
}
mysqli_close($con);
?>
</body>
</html>