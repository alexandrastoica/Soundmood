<?php
include('mysql/general/initialize.php');
if(is_loggedin() === true){
  $user_id = $_SESSION["id"];
}
include('mysql/get.php');
?>