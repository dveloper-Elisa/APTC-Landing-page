
<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


session_start();

if(!isset($_SESSION['email'])){
    header('Location: ./');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
<?php
 include "./header.php";
?>
<div class="container">
<h2>Welcome to dashboard</h2>
    
</body>
</html>
