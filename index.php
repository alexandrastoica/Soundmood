<?php 
include("mysql/general/initialize.php"); 
if(is_loggedin() === true){
  header('Location: main.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <!--  Basic  -->
    <meta charset="utf-8">
    <title> Soundmood </title>
    <meta name="description" content="Search songs based on you mood">
    <meta name="author" content="Alexandra Stoica">

    <!--  Mobile Specific Metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Links -->
    <link rel="stylesheet" type="text/css" href="css/reset.min.css">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animated.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="wrapper" style="padding:0; overflow:hidden;" class="centered" aria-role="main">
<h1>Soundmood</h1>
<h2>Search songs based on you mood</h2>

<ul>
<li class="animated bounceInUp"> <a href="mysql/login.php" id="cta-signin" class="cta-wrapper">Sign In</a> 
<li class="animated bounceInUp"> <a href="mysql/register.php" id="cta-register" class="cta-wrapper">Register</a>
</ul>
<div id="cta-search" class="cta-search animated bounceInUp" aria-role="button">Search mood</div>
</div>
<div class='credit'>
	<img src='https://developers.soundcloud.com/assets/powered_by_white-7ee4327cfbe5d678897edf6b6c5dd30f.png' alt='poweredbySoundcloud'>
</div>
<div id="exit"><img src="img/exit.svg"></div>

<form class="search-form hide"action="main.php" method="post">
<input class="search-input" type="text" name="mood" autocomplete="off"  placeholder="Mood...">
<button class="search-submit" type="submit"></button>
</form> 

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/backstretch.min.js"></script>
<script> $.backstretch("img/cover.jpeg"); </script>

</html>