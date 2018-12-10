<?php

?>
<html>
<head>
	<link href="css/rankings.css" rel="stylesheet" />
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="css/index.css" rel="stylesheet" />
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/footer.js" type="text/javascript"></script>
    <script src="js/signup.js" type="text/javascript"></script>
    <script src="js/signin.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/result.js" type="text/javascript"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href="#myPage">MOVIE RANKINGS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.html">HOME</a></li>
          <li><a href="rankings.html">RANKINGS</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="usermore" >CATEGORIES
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a  href="category_detail.html?id=1" target="_blank" class="line">Animation</a></li>
                <li><a  href="category_detail.html?id=2" target="_blank" class="line">Comedy</a></li>
                <li><a  href="category_detail.html?id=3" target="_blank" class="line">Crime</a></li>
                <li><a  href="category_detail.html?id=4" target="_blank" class="line">Documentary</a></li>
                <li><a  href="category_detail.html?id=5" target="_blank" class="line">Family</a></li>
                <li><a  href="category_detail.html?id=6" target="_blank" class="line">Drama</a></li>
                <li><a  href="category_detail.html?id=7" target="_blank" class="line">Sci-Fi</a></li>
                <li><a  href="category_detail.html?id=8" target="_blank" class="line">Romance</a></li>
                <li><a  href="category_detail.html?id=9" target="_blank" class="line">War</a></li>
                <li><a  href="category_detail.html?id=10" target="_blank" class="line">Action</a></li>
              </ul>
            </li>
          
          <!-- <li><a href="#search"><span class="glyphicon glyphicon-search"></span></a></li> -->
        </ul>
      </div>
    </div>
  </nav> 
  </br> 

<?php

$num_rec_per_page=3;

$con = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$con) {
	die('Could not connect: '.mysqli_error());
}

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

$movie = mysqli_query($con, "SELECT * FROM `movies` ORDER BY `mrates` DESC LIMIT $start_from, $num_rec_per_page");

echo '<hr>';
while ($row = mysqli_fetch_array($movie)) {
	echo '<table width="100%" style="margin-left: 50px;">';
	echo "<tbody>";
	echo '<tr class="item">';
	echo '<td width="100" valign="top">';
	echo '<a href="#" title="pic"><img id="1" src="images/details/'.$row['movieID'].'.jpg" width="100px" height="150px" alt="movie pic"/></a>';
	echo "</td>";
	echo '<td valign="top">
							<div class="mcontent">';
	echo '<a href="movie_detail.html?id='.$row['movieID'].'">'.$row['movieName'].'</a>';
	$mId   = $row['movieID'];
	$actor = mysqli_query($con, "SELECT * FROM `actor` WHERE `actorID`IN(SELECT `actorID` FROM `mactor`AS a LEFT JOIN `movies` as m ON a.`movieID` =m.`movieID` WHERE m.`movieID`=$mId)");
	$row2  = mysqli_fetch_array($actor);
	echo '<p class="info">Actor: <a href="actor_detail.html?id='.$row2['actorID'].'">'.$row2['aName'].'</p></a>';
	echo '<div class="rating">';
	if ($row['mrates'] > 0 && $row['mrates'] <= 1) {
		echo '<img id="1" src="images/rating/ic_rating_0.5star.jpg" alt="star"  />';
		# code...
	} else if ($row['mrates'] > 1 && $row['mrates'] <= 2) {
		echo '<img id="1" src="images/rating/ic_rating_1star.jpg" alt="star"  />';
	} else if ($row['mrates'] > 2 && $row['mrates'] <= 3) {
		echo '<img id="1" src="images/rating/ic_rating_1.5star.jpg" alt="star"/>';
	} elseif ($row['mrates'] > 3 && $row['mrates'] <= 4) {
		echo '<img id="1" src="images/rating/ic_rating_2star.jpg" alt="star"/>';
	} else if ($row['mrates'] > 4 && $row['mrates'] <= 5) {
		echo '<img id="1" src="images/rating/ic_rating_2.5star.jpg" alt="star"/>';
	} else if ($row['mrates'] > 5 && $row['mrates'] <= 6) {
		echo '<img id="1" src="images/rating/ic_rating_3star.jpg" alt="star"/>';
	} else if ($row['mrates'] > 6 && $row['mrates'] <= 7) {
		echo '<img id="1" src="images/rating/ic_rating_3.5star.jpg" alt="star"/>';
	} else if ($row['mrates'] > 7 && $row['mrates'] <= 8) {
		echo '<img id="1" src="images/rating/ic_rating_4star.jpg" alt="star"/>';
	} else if ($row['mrates'] > 8 && $row['mrates'] <= 9) {
		echo '<img id="1" src="images/rating/ic_rating_4.5star.jpg" alt="star"/>';
	} else if ($row['mrates'] > 9 && $row['mrates'] <= 10) {
		echo '<img id="1" src="images/rating/ic_rating_5star.jpg" alt="star" />';
	} else {
		echo '<img id="1" src="images/rating/ic_rating_0star.jpg" alt="star"/>';
	}
	echo "</br><span class='rating_nums'>".'Rating: '.$row['mrates']."</span>";

	echo '</br><a href="movie_detail.html?id='.$row['movieID'].'">Details >> </a>';
  echo "<script src='js/addFavorite.js' type='text/javascript'></script>";

  echo '</br><button onclick=addFavorite(this) value='.$row['movieID'].'>Add to My Favorites</button>';

  echo '<p id=favoriteStatus'.$row['movieID'].'></p>';
	echo "</div></div></td>";
	echo "</tr>";
	echo "</tbody>";
	echo '</table>';
	echo "<hr>";
}

$sql = "SELECT * FROM movies"; 
$rs_result = mysqli_query($con, $sql); 
$total_records = 0;
while ($row = mysqli_fetch_array($rs_result)){
	$total_records = $total_records + 1;
}

// $total_records = mysqli_num_rows($rs_result);  
$total_pages = ceil($total_records / $num_rec_per_page);  

echo '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">';
echo ' <button type="button" class="btn btn-secondary">';
echo "<a href='ranking_search.php?page=1'>".'<<'."</a> "; 
echo '</button>';

for ($i=1; $i<=$total_pages; $i++) { 
	echo '<button type="button" class="btn btn-dark">';
            echo "<a href='ranking_search.php?page=".$i."'>".$i."</a></li> "; 
           echo "</button>";
}; 
echo '<button type="button" class="btn btn-secondary">';
echo "<a href='ranking_search.php?page=$total_pages'>".'>>'."</a> "; 
echo "</button></div></div></br>";
echo '<button type="button" class="btn btn-dark">';
echo "<a href='index.html'>Return</a> "; 
echo "</button>";
mysqli_close($con);
?>
</body>

</html>