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
    <script src="https://cdn.tailwindcss.com" defer></script>
</head>
<body class="bg-lime-100 ">
<?php
    include "./header.php";
    ?>
    
<div class="min-h-screen flex flex-col items-center justify-center">
    <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-lg">
        <h3 class="text-2xl font-bold mb-6 text-lime-800">Publish New Announcement</h3>

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" placeholder="Announcement title"
                class="shadow appearance-none border border-lime-700 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="announcement" class="block text-gray-700 text-sm font-bold mb-2">Announcement</label>
            <textarea name="announcement" id="announcement" placeholder="Write announcement here"
                class="shadow appearance-none border border-lime-700 rounded w-full py-2 px-3 text-lime-700 leading-tight focus:outline-none focus:shadow-outline" rows="5" required></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" name="publish"
                class="bg-lime-600 hover:bg-lime-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Publish
            </button>
        </div>
    </form>
    </div>
</body>
</html>
