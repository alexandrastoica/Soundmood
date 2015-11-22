<?php
include("general/initialize.php");
if(empty($_POST) === false){
	$username = $_POST["username"];
	$password = $_POST["password"];

	if(empty($username) === true || empty($password) === true) {
		$errors[] = 'Fill in username and password';
	} else if(user_exists($username) === false){
		$errors[] = 'User does not exist';
	} else {
		$login = login($username, $password);

		if($login === false){
			$errors[] = 'Wrong combination';
		}

	}

	if(empty($errors) === false){
		echo output_errors($errors);
	} else {
		$_SESSION['id'] = $login;
		header('Location: ../main.php');
		exit();
	}

}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Soundmood - Login</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/animated.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" />

</head>

<body>
<div id="wrapper" style="overflow:hidden" class="centered">

<form class="login-form animated bounceInUp" action="login.php" method="post">
<input class="login-input" type="text" name="username" placeholder="Username">
<input class="login-input" type="password" name="password" placeholder="Password">
<input class="login-submit" type="submit" value="Log in">
</form>
<p class="animated fadeIn"> Not a member? Register <a href="register.php">here</a> </p>

</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/backstretch.min.js"></script>
<script> $.backstretch("../img/cover.jpeg"); </script>

</html>
