<?php
if(!empty($_POST["mood"])) {

    $moodinput = $_POST["mood"];
    $i = 1;

    $sql = 'SELECT songs.SongID, songs.SongName, artist.ArtistName, album.AlbumName, songs.Link, album.Cover 
            FROM songs 
            INNER JOIN album 
            ON album.AlbumID = songs.AlbumID 
            INNER JOIN artist
            ON artist.ArtistID = songs.ArtistID
            INNER JOIN mood 
            ON mood.MoodID = songs.MoodID 
            WHERE mood.Mood = "'.$moodinput.'"';

    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
        // output data of each row
        while($row = mysql_fetch_assoc($result)) {
            echo "<div class='music' class='animated fadeIn'>";
            echo "<div class='song-details'>";
            echo "<div class='cover'><img src='" . $row["Cover"] . "' alt='cover'><span class='overlay'></span></div>";
            echo "<h4>" . $row["ArtistName"] . "</h4> <h5> " . $row["AlbumName"]. " </h5> <h3> " . $row["SongName"] . "</h3>" ;
            $song_id = $row["SongID"];
            if(is_loggedin() && usersong_exists($user_id, $song_id) === false){    
                echo "<a name='song' class='alink".$i."' onclick='add(" . $song_id . ", " . $i . ");'>Add this to your playlist</a>";
            }
            $like = like_percentage($song_id);
            echo "<div id='". $i . "link' class='link'>" . $row["Link"] . "</div>";
            echo "<div class='like-bar'><div class='like' style='width:" .$like. "%'></div></div>";
            echo "</div></div>";
            $i++; //use this variable to give each div a separate id
        }

    }
}
?>
