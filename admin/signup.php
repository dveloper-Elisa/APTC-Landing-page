<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
    <link rel="stylesheet" href="./styles/signup.css">
</head>

<body>
    <div id="conatiner">
    <form action="./controllers/signupserver.php" method="post">
        <p class="title">Create account here</p>

        <div class="signupform">
            <input placeholder="Type full names" type="text" name="names" id="">
            <input placeholder="Enter email" type="email" name="email" id="">
            <input placeholder="Enter Phone number" type="number" name="phone" id="">
            <input placeholder="Password" type="password" name="password1" id="">
            <input placeholder="Comfirm password" type="password" name="password2" id="">

            <input type="submit" value="Signup" name="signupBtn">
        </div>
    </form>
    </div>
</body>

</html>