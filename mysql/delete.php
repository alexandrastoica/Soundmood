<?php
require('general/initialize.php');

$user_id = $_SESSION['id'];
$song_id = $_POST['song'];

$user_id = validate($user_id);
$song_id = validate($song_id);

$sql = "DELETE FROM usersongs WHERE UserID = '$user_id' AND SongID = '$song_id'";
$result = mysql_query($sql);


?>
