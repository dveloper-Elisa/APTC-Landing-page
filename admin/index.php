<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>
    <div id="conatiner">
        <form action="./controllers/loginserver.php" method="POST">
            <p>Admin Login Page</p>
            <div class="loginform">
                <input type="email" name="email" placeholder="Username / Email" id="">
                <input type="password" name="password" placeholder="Password" id="">
                <input type="submit" name="loginBtn" value="Login">
            </div>

        </form>
    </div>
    
</body>
</html>