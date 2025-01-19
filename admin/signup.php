
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if(!isset($_SESSION['email'])){
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <script src="https://cdn.tailwindcss.com" defer></script>
</head>
<?php
    include "./header.php";
    ?>
<body class="bg-green-400 ">

    <div id="container" class="text-lime-700 rounded-lg flex items-center justify-center min-h-screen">
        <form action="./controllers/signupserver.php" method="post" class="space-y-6 bg-white p-3 lg:w-[25%] md:w-[50%] sm:w-[50%] w-[50%]">
            <p class="text-2xl font-bold text-center">Create Account Here</p>

            <div class="space-y-4">
                <input
                    placeholder="Type full names"
                    type="text"
                    name="names"
                    class="w-full p-2 rounded-md border border-green-400 text-white focus:ring focus:ring-green-400 outline-none"
                >
                <input
                    placeholder="Enter email"
                    type="email"
                    name="email"
                    class="w-full p-2 rounded-md border border-green-400 text-white focus:ring focus:ring-green-400 outline-none"
                >
                <input
                    placeholder="Enter Phone number"
                    type="number"
                    name="phone"
                    class="w-full p-2 rounded-md border border-green-400 text-white focus:ring focus:ring-green-400 outline-none"
                >
                <input
                    placeholder="Password"
                    type="password"
                    name="password1"
                    class="w-full p-2 rounded-md border border-green-400 text-white focus:ring focus:ring-green-400 outline-none"
                >
                <input
                    placeholder="Confirm password"
                    type="password"
                    name="password2"
                    class="w-full p-2 rounded-md border border-green-400 text-white focus:ring focus:ring-green-400 outline-none"
                >
            </div>

            <div class="text-center">
                <input
                    type="submit"
                    value="Signup"
                    name="signupBtn"
                    class="w-full bg-green-800 text-white font-bold p-2 rounded-md hover:bg-green-600 focus:ring focus:ring-green-800 cursor-pointer transition tracking-wider"
                >
            </div>
        </form>
    </div>
</body>

</html>
