
<?php
$mname = $_POST["moviename"];
$cate = $_POST["catelist"];
echo $cate;
?>
<html>
<head>
    <title>Cranberry Rating</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/index.css" rel="stylesheet" />
    <link href="css/popover.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/signup.js" type="text/javascript"></script>
    <script src="js/signin.js" type="text/javascript"></script>
     <script src="js/moviesearch.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href="#myPage">Cranberry Rating</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.html">HOME</a></li>
          <li><a href="rankings.html">RANKINGS</a></li>
         <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="usermore1" >CATEGORIES
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
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="usermore" >MORE
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              
              <li><a href="#signin" data-toggle="modal" data-target="#signin" id="uprofile">SIGN IN</a></li>
              <li><a href="#signup" data-toggle="modal" data-target="#signup" id="ulog">SIGN UP</a></li> 
            </ul>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
</br>
</br>
<?php

$con = mysqli_connect("localhost", "root", "root", "movierate",8889);
if (!$con) {
	die('Could not connect: '.mysqli_error());
}

$num_rec_per_page=3;
$records = 0;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

// $movie = mysqli_query($con, "SELECT * FROM `movies` WHERE `movieName` LIKE '%".$mname."%' LIMIT $start_from, $num_rec_per_page");
// SELECT * FROM `movies` WHERE (`movieName` LIKE '%w%') AND (`movieID` IN( SELECT `movieID` FROM `mcate` WHERE caID = 1))

// echo "SELECT * FROM `movies` WHERE (`movieName` LIKE '%".$mname."%') AND (`movieID` IN (SELECT `movieID` FROM `mcate` WHERE `caID` = '$cate')) LIMIT $start_from, $num_rec_per_page";

//$movie = mysqli_query($con, "SELECT * FROM `movies` WHERE (`movieName` LIKE '%".$mname."%') AND (`movieID` IN (SELECT `movieID` FROM `mcate` WHERE `caID` = '$cate')) LIMIT $start_from, $num_rec_per_page");

if ($cate == 0){
	if (empty($mname)){
		$movie = mysqli_query($con, "SELECT * FROM `movies` WHERE `movieID` LIMIT $start_from, $num_rec_per_page");
	}else{
		$movie = mysqli_query($con, "SELECT * FROM `movies` WHERE `movieName` LIKE '%".$mname."%' LIMIT $start_from, $num_rec_per_page");
	}
}else{
	if (empty($mname)){
		$movie = mysqli_query($con, "SELECT * FROM `movies` WHERE `movieID` IN (SELECT `movieID` FROM `mcate` WHERE `caID` = $cate) LIMIT $start_from, $num_rec_per_page");
	}else{
		$movie = mysqli_query($con, "SELECT * FROM `movies` WHERE `movieID` IN (SELECT `movieID` FROM `mcate` WHERE `caID` = $cate) AND `movieName` LIKE '%".$mname."%' LIMIT $start_from, $num_rec_per_page");
	}
}
if(empty($movie)){
	echo "No result!";
}

// mysqli_close($con);

// echo "<script language='javascript'>";
// echo " location='result_search.php/';";

// echo "</script>";

echo '<hr>';
while ($row = mysqli_fetch_array($movie)) {
	echo '<table width="100%" style="margin-left:20px;">';
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
	echo "</div></div></td>";
	echo "</tr>";
	echo "</tbody>";
	echo '</table>';
	echo "<hr>";
	$records = $records + 1;
}

if ($cate == 0){
	if (empty($mname)){
		$sql = "SELECT * FROM `movies` WHERE `movieID`"; 
		$rs_result = mysqli_query($con, $sql); 
		$total_records = 0;
		while ($row = mysqli_fetch_array($rs_result)){
			$total_records = $total_records + 1;
		}
	}else{
		$total_records = $records;
	}
}else{
	if (empty($mname)){
		$sql = "SELECT * FROM `movies` WHERE `movieID` IN (SELECT `movieID` FROM `mcate` WHERE caID = $cate)"; 
		$rs_result = mysqli_query($con, $sql); 
		$total_records = 0;
		while ($row = mysqli_fetch_array($rs_result)){
			$total_records = $total_records + 1;
		}
	}else{
		$total_records = $records;
}
}

$total_pages = ceil($total_records / $num_rec_per_page);  
echo '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">';
echo ' <button type="button" class="btn btn-dark">';
echo "<a href='moviesearch.php?page=1'>".'|<'."</a> "; 
echo '</button>';
for ($i=1; $i<=$total_pages; $i++) { 
	echo '<button type="button" class="btn btn-dark">';
            echo "<a href='moviesearch.php?page=".$i."'>".$i."</a> ";
            echo "</button>"; 
}; 
echo '<button type="button" class="btn btn-dark">';
echo "<a href='moviesearch.php?page=$total_pages'>".'>>'."</a> "; 
echo "</button></div></div></br>";
echo '<button type="button" class="btn btn-dark">';
echo "<a href='index.html'>Return</a> "; 
echo "</button>";
mysqli_close($con);
?>
</body>
</html>
