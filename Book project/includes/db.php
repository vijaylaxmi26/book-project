<?php

$sever ="localhost";
$user="root";
$pas="";
$database="signup";

$conn = mysqli_connect($sever,$user,$pas,$database);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>