<?php
include("general/initialize.php");
if(empty($_POST) === false){
	$required = array('username', 'password', 'cpassword', 'name', 'email');
	foreach($_POST as $key=>$value){

		if(empty($value) && in_array($key, $required) === true){
			$errors[] = 'All fields must be completed';
			echo output_errors($errors);
			break;	
		}
	}
	if(empty($errors) === true) {
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		$cpassword = $_POST["cpassword"];
		$name = $_POST["name"];
		$email = $_POST["email"];

		if(user_exists($username) === true){
			$errors[] = "Sorry, the username already exists";
		}

		if(preg_match("/\\s/", $username) || preg_match("/[^A-Za-z0-9]+/", $username)){
			$errors[] = "Username must contain only letters and numbers";
		}

		if(strlen($password) < 6){
			$errors[] = "Your password must be at least 6 characters";
		}

		if($password !== $cpassword){
			$errors[] = "Your passwords do not match";
		}

		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$errors[] = "Invalid e-mail address";
		}

		if(empty($errors) === true){

			$register_data = array(
				'username' 	=> $username,
				'password' 	=> $password,
				'name' 		=> $name,
				'email'		=> $email
			);
			register_user($register_data);
			header('Location: login.php');
			exit();

		} else {
			echo output_errors($errors);
		}
	} 

}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Soundmood - Register</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/animated.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" />

</head>

<body>
<div id="wrapper" style="overflow:hidden" class="centered">

<form class="login-form animated bounceInUp" action="register.php" method="post">
<input class="login-input" type="text" name="username" placeholder="Username">
<input class="login-input" type="password" name="password" placeholder="Password">
<input class="login-input" type="password" name="cpassword" placeholder="Password">
<input class="login-input" type="text" name="name" placeholder="Name">
<input class="login-input" type="text" name="email" placeholder="E-mail">
<input class="login-submit" type="submit" value="Register">

</form>

<p class="animated fadeIn"> Already a member? Login <a href="login.php">here</a> <p>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/backstretch.min.js"></script>
<script> $.backstretch("../img/cover.jpeg"); </script>
</html>

