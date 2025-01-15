<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if(!isset($_SESSION['email'])){
    header('Location: ../');
}


include "../connection/bd_connection.php";

if (isset($_POST['publish'])) {
    $title = $_POST['title'];
    $announcement = $_POST['announcement'];

    $errors = [];
    if (empty($title)) {
        $errors[] = "Title is required";
    } elseif (strlen($title) <= 3) {
        $errors[] = "Invalid title format. Title must be longer than 3 characters.";
    }

    if (empty($announcement)) {
        $errors[] = "Announcement is required";
    } elseif (strlen($announcement) <= 10) {
        $errors[] = "Announcement length should be greater than 10 characters.";
    }

    // Checking for errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo "<script>location='./announcement.php';</script>";
        return;
    }

    // Retrieve user email from session
    $email = $_SESSION['email'];

    // Use prepared statements to avoid SQL injection
    $stmt = $connection->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $userId = $user['id'];

        // Insert the announcement
        $stmt = $connection->prepare("INSERT INTO announcement (id, userId, title, announcement, `date`) VALUES (NULL, ?, ?, ?, NOW())");
        $stmt->bind_param("iss", $userId,  $title, $announcement);
        if ($stmt->execute()) {
            echo "<script>alert('Announcement published successfully');</script>";
            echo "<script>location='./announcement.php';</script>";
        } else {
            echo "<script>alert('Failed to publish announcement');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}

// CHANGING TEAM


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php
    include "./header.php";
    ?>

<form action="" method="POST">
    <h3>Publish new announcement</h3>
    <input type="text" name="title" id="" placeholder="announcement" required>
    <textarea name="announcement" id="" placeholder="Write announcement here" required row='20'></textarea>
    <button type="submit" name="publish">Publish</button>
</form>

</body>
</html>