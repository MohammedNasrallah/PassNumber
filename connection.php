<?php

// 1. Link to a database connection
$link = mysqli_connect("localhost", "root", "", "passnumber");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>
