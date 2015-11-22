<?php
require('general/initialize.php');

$user_id = $_SESSION['id'];
$song_id = $_POST['song'];

$user_id = validate($user_id);
$song_id = validate($song_id);

//check if song is already in playlist
if (usersong_exists($user_id, $song_id) === false){
	$sql = "INSERT INTO usersongs (UserID, SongID) VALUES ('$user_id', '$song_id')";
	$result = mysql_query($sql);
}

echo "1";
?>
