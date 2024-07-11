<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "currente_chats";
$con=mysqli_connect($servername,$username,$password,$db_name);


if(!$con)
{
    die("SORRY!WE FAILED TO CONNECT".mysqli_connect_error());

}

// echo "CONNECTION WAS SETUP and ok";


?>  
