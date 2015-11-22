<?php
require('general/initialize.php');

$user_id = $_SESSION['id'];
$user_id = validate($user_id);

	//delete user info
	mysql_query("DELETE FROM `user` WHERE `UserID` = '$user_id'");
	//delete user playlists
	mysql_query("DELETE FROM `usersongs` WHERE `UserID` = '$user_id'");

?>