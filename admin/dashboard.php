
<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


session_start();

if(!isset($_SESSION['email'])){
    header('Location: ./');
}

include "./connection/bd_connection.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com" defer></script>
</head>
<body class="bg-gray-100">

    <?php
    include "./header.php";
    ?>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-green-800 text-white lg:w-64 md:w-42 sm:w-32 w-50 space-y-6 px-6 py-4">
            <div class="text-2xl font-bold text-center">Admin Panel</div>
            <nav class="space-y-4">
                <a href="dashboard.php" class="block py-2 px-4 rounded hover:bg-green-700">Dashboard</a>
                <a href="signup.php" class="block py-2 px-4 rounded hover:bg-green-700">Manage Users</a>
                <a href="./updates/blogs.php" class="block py-2 px-4 rounded hover:bg-green-700">Blogs</a>
                <a href="./updates/logout.php" class="block py-2 px-4 rounded hover:bg-red-600">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <header class="flex items-center justify-between bg-white shadow px-6 py-4 rounded-md">
                <h1 class="text-xl font-bold text-lime-700">Admin Dashboard</h1>
                <p class="text-sm text-gray-500">Welcome, Admin!</p>
            </header>
            
            <section class="mt-6">
                <div class="bg-white p-6 rounded-md shadow">
                    <h2 class="text-lg font-semibold text-lime-700 mb-4">Welcome to the Dashboard</h2>
                    <p class="text-gray-600">Here you can manage your application, monitor statistics, and access administrative tools.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Card 1 -->
                    <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold">Total Users</h3>
                        <p class="mt-2 text-2xl font-bold">
                        <?php
                        $sql = "SELECT COUNT(*) as totalUsers FROM users";

                        $result = mysqli_query($connection, $sql);
                        if($row = mysqli_fetch_assoc($result)){
                            echo $row['totalUsers'];
                        }

                        ?>
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold">Total Blogs</h3>
                        <p class="mt-2 text-2xl font-bold"> 
                            <?php
                        $sql = "SELECT COUNT(*) as totalBlogs FROM blogs";

                        $result = mysqli_query($connection, $sql);
                        if($row = mysqli_fetch_assoc($result)){
                            echo $row['totalBlogs'];
                        }

                        ?>
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold">Total Announcement</h3>
                        <p class="mt-2 text-2xl font-bold">
                        <?php
                        $sql = "SELECT COUNT(*) as totalNews FROM announcement";

                        $result = mysqli_query($connection, $sql);
                        if($row = mysqli_fetch_assoc($result)){
                            echo $row['totalNews'];
                        }

                        ?>
                        </p>
                    </div>
                </div>
            </section>
        </main>
    </div>

</body>
</html>
