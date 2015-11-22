<?php
include("general/initialize.php");
$user_id = $_SESSION['id'];

if(empty($_POST) === false){
	$newpass = $_POST["newpass"];
	$cnewpass = $_POST["cnewpass"];

	if(empty($newpass) === true || empty($cnewpass) === true) {
		$errors[] = 'Fill in both fields';
	} else if($newpass !== $cnewpass){
		$errors[] = "Your passwords do not match";
	} else if(strlen($newpass) < 6){
		$errors[] = "Your password must be at least 6 characters";
	}

	if(empty($errors) === false){
		echo output_errors($errors);
	} else {
		change_password($user_id, $newpass);
		header('Location: logout.php');
		exit();
	}
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Soundmood - Change Password</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/animated.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" />

</head>

<body>
<div id="wrapper" style="overflow:hidden" class="centered">
<?php   echo "<h5> Hello, " . get_name($user_id) . "!</h5>"; ?>
<form class="login-form animated bounceInUp" action="change.php" method="post">
<input class="login-input" type="password" name="newpass" placeholder="New password">
<input class="login-input" type="password" name="cnewpass" placeholder="Confirm new password">
<input class="login-submit" type="submit" value="Change Password">
</form>
<p class="animated fadeIn"> Return to the <a href="../main.php">main</a> page</p>

</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/backstretch.min.js"></script>
<script> $.backstretch("../img/cover.jpeg"); </script>

</html>