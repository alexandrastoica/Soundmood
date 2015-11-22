<?php
include("mysql/general/initialize.php");
$i = 0;
$user_id = $_SESSION['id'];
//get the playlist names for that user
$sql_playlist = 'SELECT songs.SongID, songs.SongName, artist.ArtistName, album.AlbumName, songs.Link, album.Cover 
                 FROM songs
                 INNER JOIN album
                 ON album.AlbumID = songs.AlbumID 
                 INNER JOIN artist
                 ON artist.ArtistID = songs.ArtistID 
                 INNER JOIN usersongs
                 ON songs.SongID = usersongs.SongID
                 WHERE usersongs.UserID = "'. $user_id .'"';
$result_playlist = mysql_query($sql_playlist);

if (mysql_num_rows($result_playlist) > 0) {
    // output data of each row
    echo "<h5> Here are your songs: </h5>";
    while($row = mysql_fetch_assoc($result_playlist)) {
                echo "<div class='music animated fadeIn' id='" . $i . "'>";
                echo "<div class='song-details'>";
                echo "<div class='cover'><img src='" . $row["Cover"] . "' alt='cover'><span class='overlay'></span></div>";
                echo "<h4>" . $row["ArtistName"] . "</h4><h5> " . $row["AlbumName"]. " </h5><h3> " . $row["SongName"] . "</h3>" ;
                $song_id = $row["SongID"];
                echo "<a name='song' onclick='delete_song(" . $song_id . ");'>Delete from your playlist</a>";
                echo "<div id='". $i . "link' class='link'>" . $row["Link"] . "</div>";
                $like = like_percentage($song_id);
                echo "<div class='like-bar'><div class='like' style='width:" .$like. "%'></div></div>";
                echo "</div></div>";
                $i++; //use this variable to give each div a separate id
            }
} else {
    echo "<p> You have no songs in your playlist </p>";
}

echo "<div class='settings ion-ios-arrow-right centered'></div>";
?> 

