<?php

error_reporting(E_ALL);
ini_set("display_errors", "1");

session_start();

if(!isset($_SESSION['email'])){
    header("Location: ./index.php");
}

include "../connection/bd_connection.php";

if(isset($_POST['uploadBlogs'])){
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){


        $image = $_FILES['image'];
        $title = $_POST['title'];
        $blog = $_POST['blog'];


        $uploadDir = "../../gallery/";
        if(!is_dir($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }

        $fileName = basename($image['name']);
        $fileTempPath = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileExtension = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    
        $allowedExtension = ['jpg','jpeg', 'png'];
        if(in_array($fileExtension,$allowedExtension)){
            $newFileName = uniqid('img_', true).'.'.$fileExtension;
            $targetFilePath = $uploadDir . $newFileName;

            if(move_uploaded_file($fileTempPath, $targetFilePath)){
                $sql = $connection -> prepare("INSERT INTO blogs (title, blog, image, date) VALUES (?, ?, ?, now())");
                $sql->bind_param('sss',$title, $blog, $targetFilePath);
                if($sql->execute()){
                    echo "<script>alert('Image uploaded Success full'); window.location = './blogs.php'</script>";
                }else {
                    echo "<script>alert('Error Inserting Image'); window.location = './blogs.php'</script>";

                }
                
            }else{
                echo "<script>alert('Image not uploaded'); window.location = './blogs.php'</script>";
            }
        }else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, and PNG files are allowed.'); window.location = './blogs.php'</script>";
        }
    }else {
        echo "<script>alert('No file uploaded or an error occurred during the upload.'); window.location = './blogs.php'</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update blogs</title>
</head>
<body>
    <?php
    include "./header.php";

    ?>

    <form action="" method="post" enctype="multipart/form-data">
    <h3>Update blogs</h3>
    <input type="text" name="title" placeholder="Enter blog title" required>
    <textarea type="text" name="blog" placeholder="Enter full blog body" required> </textarea>
    <input type="file" name="image">
    <button type="submit" name="uploadBlogs">Upload</button>
    </form>


</body>
</html>