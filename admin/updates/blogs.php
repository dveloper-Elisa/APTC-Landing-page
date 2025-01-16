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
    <title>Update Blogs</title>
    <script src="https://cdn.tailwindcss.com" defer></script>
</head>
<body class="bg-lime-200">

    <?php
    include "./header.php";
    ?>
    <div class="min-h-screen flex flex-col items-center justify-center">
    <form action="" method="post" enctype="multipart/form-data" 
        class="bg-white shadow-lg rounded-lg p-5 w-md">
        <h3 class="text-2xl font-bold text-lime-700 mb-5">Update Blogs</h3>

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Blog Title</label>
            <input type="text" name="title" id="title" placeholder="Enter blog title"
                class="shadow appearance-none border border-lime-700 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                required>
        </div>

        <div class="mb-4">
            <label for="blog" class="block text-gray-700 text-sm font-bold mb-2">Blog Body</label>
            <textarea name="blog" id="blog" placeholder="Enter full blog body" rows="6"
                class="shadow appearance-none border border-lime-700 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                required></textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Upload Image</label>
            <input type="file" name="image" id="image"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border file:border-gray-300 file:text-lime-700 file:bg-white hover:file:bg-gray-100">
        </div>

        <button type="submit" name="uploadBlogs"
            class="bg-lime-700 text-white font-bold py-2 px-4 rounded hover:bg-lime-800 focus:outline-none focus:shadow-outline">
            Upload
        </button>
    </form>
    </div>
</body>
</html>

</html>