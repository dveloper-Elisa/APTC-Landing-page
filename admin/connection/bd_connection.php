<?php

$host = "localhost";
$user="root";
$password = "";
$database = "aptc";

$connection = mysqli_connect($host,$user,$password, $database);

if (mysqli_connect_error()) {
    echo "Error in Connection";
}
?>