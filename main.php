<?php
include("mysql/general/initialize.php");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Soundmood</title>
    <link rel="stylesheet" type="text/css" href="css/reset.min.css">
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animated.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<?php 
if(is_loggedin() === true){
  $user_id = $_SESSION["id"];
?>
  <nav>
      <ul>
          <li><p> You are logged in. </p>
          <li><a class="nav-link" href="mysql/logout.php">Logout</a>
          <li><a class="nav-link" id="profilelink" href="profile.php">Profile</a>
          <li><a class="nav-link search" href="#">Search</a>
      </ul>
  </nav>
<?php
} else {
?>
<nav> 
    <ul>
        <li><a class="nav-link" href="mysql/register.php">Register</a>
        <li><a class="nav-link" href="mysql/login.php">Log in</a>
        <li><a class="nav-link search" href="#">Search</a>
    </ul>
</nav>

<?php
}
?>

<section id="search-overlay">
<div id='exit-search'><img src='img/exit-search.svg'></div>
<form class='search-form' action='content.php' method='post'>
    <input class='search-input' type='text' name='mood' autocomplete='off' placeholder='Mood...'>
    <button class='search-submit' type='submit'></button>
<div class="search-error"><p>This mood has not been found or you haven't submited anything.</p>
<?php
  echo "<h5 style='padding: 10px 0;'> Some suggestions: </h5>";
  $sql_mood = mysql_query("SELECT Mood FROM mood");
  echo "<ul style='text-align: center; color: #111'>";
  while($row = mysql_fetch_assoc($sql_mood)){
      
      echo "<li style='padding-right: 2em'><h4 style='color: #A9A9A9'>" . $row["Mood"] . "</h4></li>" ; 
  }
  echo "</ul>";
?>
</div>
</form>
</section>

<section id="wrapper" class="normal">
<?php
include("mysql/get.php");
if(empty($_POST["mood"])) {
echo "<p> Search for moods </p>";
echo "<p> Most liked songs: </p>";

    $sql = 'SELECT songs.SongID, songs.SongName, artist.ArtistName, album.AlbumName, songs.Link, album.Cover, mood.Mood 
            FROM songs 
            INNER JOIN album 
            ON album.AlbumID = songs.AlbumID 
            INNER JOIN artist
            ON artist.ArtistID = songs.ArtistID
            INNER JOIN mood 
            ON mood.MoodID = songs.MoodID
            ORDER BY artist.ArtistName ASC';

    $result = mysql_query($sql);
    $i = 1;
    if (mysql_num_rows($result) > 0) {
        // output data of each row
        while($row = mysql_fetch_assoc($result)) {
            $song_id = $row["SongID"];
            $like = like_percentage($song_id);
            if($like >= 50){
                echo "<div class='music' class='animated fadeIn'>";
                echo "<div class='song-details'>";
                echo "<div class='cover'><img src='" . $row["Cover"] . "' alt='cover'><span class='overlay'></span></div>";
                echo "<h4>" . $row["ArtistName"] . "</h4> <h5> " . $row["AlbumName"]. " </h5> <h3> " . $row["SongName"] . "</h3>" ;
                if(is_loggedin() && usersong_exists($user_id, $song_id) === false){    
                    echo "<a name='song' class='alink".$i."' onclick='add(" . $song_id . ", " . $i . ");'>Add this to your playlist</a>";   
                }
                echo "<div id='". $i . "link' class='link'>" . $row["Link"] . "</div>";
                echo "<div class='like-bar'><div class='like' style='width:" .$like. "%'></div></div>";
                echo "</div></div>";
                $i++; //use this variable to give each div a separate id
            }
        }
    }
}
?>
</section>

<?php
if(is_loggedin() === true){
  $user_id = $_SESSION["id"];
  echo "<div class='settings-nav hidenav'>";
  echo "<h5> Hello, " . get_name($user_id) . "!</h5>";
  echo "<p>Username: ". get_username($user_id) . "</p>";
  echo "<h4> SETTINGS </h4>";
  echo "<ul><li><a href='mysql/change.php'> Change password </a>";
  echo "<li><a name='user_id' onclick='delete_username(". $user_id .");'> Delete my username </a></ul></div>";
}
?>

<div class='player'>
  <div class='inplayer'>
      <div class='controls'>
        <button class='play ion-ios-play-outline'></button>     
      </div>

      <div class='info'>
        <div class='title'></div>
        <div class='song'></div>
        <div class='progress'>
          <div class='progress-bar'></div>
        </div>
      </div>  
  </div>
</div>
<iframe class="sc-widget" src=""></iframe>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type='text/javascript' src='js/player.js'></script>
<script>
    var link = null;
    if(!link){
      link = '//w.soundcloud.com/player/?url=//' + $('#1link').text();
      $('.sc-widget').attr("src", link);
    }
    play_song();

    function add(song, i){
      var context = '.alink'+i;
      //alert(context);
      var request = $.post( "mysql/add.php", {song:song})
                    .done(function() {
                      //alert(context);
                      $(context).html('Added!');
                    }).fail(function() {
                       alert("Something went wrong");
                    });
    }


    $('#profilelink').on('click', function(e) {
      var request = $.post("profile.php")
                    .done(function(data) {
                          //alert("Song added!");
                          $('#wrapper').html(data);
                          $('.settings').click(function(){
                          $('.settings-nav').toggleClass('hidenav');
                          if($('.settings-nav').hasClass('hidenav')){
                            $('.settings-nav *').fadeOut(100);
                            $('.settings-nav').animate({ width: '0%' }, 600);
                            $('.settings').animate({ left: '2%' }, 700);
                            $('.settings').removeClass('ion-ios-arrow-left').addClass('ion-ios-arrow-right');
                            $('.music').animate({ left: '0%' }, 700);
                          } else {
                            $('.settings-nav').animate({ width: '20%' }, 600);
                            $('.settings').animate({ left: '23%' }, 600);
                            $('.settings').removeClass('ion-ios-arrow-right').addClass('ion-ios-arrow-left');
                            $('.music').animate({ left: '15%' }, 500);
                            $('.settings-nav *').fadeIn(2000);
                          }
                          }); 
                          play_song2();
                    }).fail(function() {
                          alert("Something went wrong");
                    });

      e.preventDefault();
    });

    $('.search-form').submit(function(event) {

      var mood = $('input[name=mood]').val();

      $.post( "content.php", {mood:mood})
            .done(function(data) {
              if(!data){
                $('.search-error').fadeIn('400'); 
                $('.settings-nav > *').hide();   
                $('.settings-nav').width(0); 
              }
              else { 
                  $('.search-error').hide();
                  $('#wrapper').html(data);
                  if(!link){
                    link = '//w.soundcloud.com/player/?url=//' + $('#1link').text();
                    $('.sc-widget').attr("src", link);
                  }
                  play_song2();
                  $('.settings-nav > *').hide(); 
                  $('.settings-nav').width(0); 
                  $('#search-overlay').slideUp(500);
                  $(".search-form")[0].reset(); 
              }
            }).fail(function() {
                  alert("Something went wrong");
            });


      event.preventDefault();

    });

    function delete_song(song){
      var request = $.post( "mysql/delete.php", {song:song} )
                    .done(function() {
                          //alert("Song deleted.");
                          
                          $.post('profile.php')
                          .done( function(data) {
                              $('.search-error').fadeIn('400'); 
                              $('.settings-nav > *').hide();   
                              $('.settings-nav').width(0); 
                              $('.settings-nav').addClass('hidenav');
                              $('#wrapper').html(data);
                              var width = $('.music').width() - 200;
                              $('.like-bar').css('width', width);
                              $('.settings').click(function(){
                              $('.settings-nav').toggleClass('hidenav');
                              if($('.settings-nav').hasClass('hidenav')){
                                $('.settings-nav *').hide();
                                $('.settings-nav').animate({ width: '0%' }, 600);
                                $('.settings').animate({ left: '2%' }, 700);
                                $('.settings').removeClass('ion-ios-arrow-left').addClass('ion-ios-arrow-right');
                                $('.music').animate({ left: '0%' }, 700);
                              } else {
                                $('.settings-nav').animate({ width: '20%' }, 600);
                                $('.settings').animate({ left: '23%' }, 600);
                                $('.settings').removeClass('ion-ios-arrow-right').addClass('ion-ios-arrow-left');
                                $('.music').animate({ left: '15%' }, 500);
                                $('.settings-nav *').fadeIn(2000);
                              }
                              });  
                          });
                          play_song2();
                    }).fail(function() {
                          alert( "Something went wrong");
                    });
    }

    function delete_username(user_id){
      var request = $.post( "mysql/deleteuser.php", {user_id:user_id} )
                    .done(function() {
                          alert( "User deleted.");
                          window.location.href="mysql/logout.php";
                    }).fail(function() {
                          alert( "Something went wrong");
                    });
    }
</script>

</body>
</html>