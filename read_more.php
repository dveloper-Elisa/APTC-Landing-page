<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include "./admin/connection/bd_connection.php";

if(isset($_GET['id'])){

    $blogId = $_GET['id'];
    $sql = $connection-> prepare("SELECT * FROM blogs WHERE id = ? ");
    $sql->bind_param('i', $_GET['id']);

        if ($sql->execute()) {
            $result = $sql->get_result();
            if ($row = $result->fetch_assoc()) {
                $img = str_replace("../../", "./", $row['image']);
                $title = htmlspecialchars(strtoupper($row['title']));
                $blog = htmlspecialchars($row['blog']);
                $date = htmlspecialchars($row['date']);
    
                echo "<div class='blog-content'>
                    <img src='$img' alt='Image for blog'>
                    <h1>$title</h1>
                    <p class='date'>$date</p>
                    <p>$blog</p>
                    <a href='index.php' class='back'>Back to Blogs</a>
                </div>";
            } else {
                echo "<p>Blog not found.</p>";
            }
    }

}

?>

<body>
    
<style>
    .blog-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
    }
    .blog-content img {
        width: 100%;
        height: auto;
    }
    .blog-content h1 {
        margin-top: 20px;
        font-size: 28px;
    }
    .blog-content .date {
        color: gray;
        margin-bottom: 20px;
    }
    .blog-content p {
        line-height: 1.6;
    }
    .back {
        display: inline-block;
        margin-top: 20px;
        text-decoration: none;
        color: blue;
    }
</style>
</body>