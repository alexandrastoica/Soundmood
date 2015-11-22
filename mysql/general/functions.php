<?php

function is_loggedin(){
	return (isset($_SESSION['id'])) ? true : false;
}

function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		$output[] = '<h3>' . $error . '</h3>';
	}
	return "<div class='message'>" . implode('', $output) . "</div>";
}

function validate($data){
	return mysql_real_escape_string($data);
}

function array_validate(&$item){
	return mysql_real_escape_string($item);
}

function user_exists($username){

	$username = validate($username);
	$sql = mysql_query("SELECT COUNT(`UserID`) FROM `user` WHERE `Username` = '$username'");

	return (mysql_result($sql, 0) == 1) ? true : false;
}

function usersong_exists($user_id, $song_id){

	$user_id = validate($user_id);
	$song_id = validate($song_id);
	$sql = mysql_query("SELECT COUNT(1) FROM `usersongs` WHERE `UserID` = '$user_id' AND `SongID` = '$song_id'");

	return (mysql_result($sql, 0) == 1) ? true : false;
}

function get_id($username){
	$username = validate($username);
	$sql = mysql_query("SELECT `UserID` FROM `user` WHERE `Username` = '$username'");

	return mysql_result($sql, 0, 'UserID'); 
}

function get_name($user_id){
	$user_id = validate($user_id);
	$sql = mysql_query("SELECT `Name` FROM `user` WHERE `UserID` = '$user_id'");

	return mysql_result($sql, 0, 'Name'); 
}

function get_username($user_id){
	$user_id = validate($user_id);
	$sql = mysql_query("SELECT `Username` FROM `user` WHERE `UserID` = '$user_id'");

	return mysql_result($sql, 0, 'Username'); 
}

function like_percentage($song_id){

	$song_id = validate($song_id);

	$number_of_playlists = mysql_query("SELECT @np:=COUNT(1) FROM `user`");
	$number_of_app = mysql_query("SELECT @na:=COUNT(1) FROM `usersongs` WHERE `SongID` = '$song_id'");
	$like_percentage = mysql_query("SELECT ROUND(@na*100/@np) as 'Likes'");

	return mysql_result($like_percentage, 0, 'Likes');;
}

function login($username, $password){
	$id = get_id($username);

	$username = validate($username);
	$password = md5($password);
	$sql = mysql_query("SELECT COUNT(`UserID`) FROM `user` WHERE `Username` = '$username' AND `Password` = '$password'");

	return (mysql_result($sql, 0) == 1) ? $id : false;
}

function change_password($user_id, $newpass){
	$user_id = validate($user_id);
	$newpass = md5($newpass);
	
	$sql = mysql_query("UPDATE `user` SET `Password` = '$newpass' WHERE `UserID` = '$user_id'");	
}

function register_user($register_data){
	array_walk($register_data, 'array_validate');
	$register_data['password'] = md5($register_data['password']);

	$fields = '`'. implode('`,`', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';

	mysql_query("INSERT INTO `user` ($fields) VALUES ($data)");
}

?>