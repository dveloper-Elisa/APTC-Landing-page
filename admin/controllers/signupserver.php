<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once "../connection/bd_connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../mail/src/Exception.php';
require '../mail/src/PHPMailer.php';
require '../mail/src/SMTP.php';

if (isset($_POST["signupBtn"])) {
    $names = $_POST["names"];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $errors = [];

// VALIDATION FOR EMAIL
if(empty($names)){
    $errors[]= "Name id required";
}elseif(!strlen($names) > 3){
    $errors[] = "Invalid email format";
}

// VALIDATION FOR EMAIL
if(empty($email)){
    $errors[] = "Email is required";
}

// VALIDATION OF PHONE NUMBER
    if(empty($phone)){
        $errors[] = "Phone number is required";
    }elseif(!preg_match('/^\d{10,15}$/',$phone)){
        $errors[] = "Phone number must be numeric and be between 10-15 digits";
    }

// VALIDATION FOR PASSWORD
    if (empty($password1) || empty($password2)) {
        $errors[] = "Both password fields are required.";
    } elseif ($password1 !== $password2) {
        $errors[] = "Passwords must match.";
    } elseif (strlen($password1) < 8 || !preg_match('/[A-Z]/', $password1) || !preg_match('/[0-9]/', $password1)) {
        $errors[] = "Password must be at least 8 characters, include an uppercase letter and a number.";
    }

    // Check for errors before proceeding
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo "<script>location='../signup.php';</script>";
        return;
    }

    $isExist = mysqli_query($connection,"SELECT email FROM users WHERE email = '$email'");

    $result = mysqli_num_rows($isExist);
    if($result > 0){
        ?>
        <script>
            alert("User Arleady Exit, Please login")
            location="../signup.php"
        </script>
        <?php 
        return;
    }


    $hashedPassword = password_hash($password1, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (`id`, `names`, `email`, `phone`, `password`) VALUES (null, '$names', '$email', '$phone', '$hashedPassword')";

    if(mysqli_query($connection, $sql)){
        echo "<script>
            alert('Account created successfull')
            location='../index.php'
        </script>";
        

        // SETTUP MAILING
        $mailers = new PHPMailer(true);
        $mailers -> isSMTP();

        $mailers -> Host = 'smtp.gmail.com';
        $mailers -> SMTPAuth = true;
        $mailers -> Username = 'kwizeraelissa369@gmail.com';
        $mailers -> Password = 'yecyhxpyxgujrubh';
        $mailers -> SMTPSecure = 'ssl';
        $mailers -> Port = 465;

        $mailers -> setFrom('kwizeraelissa369@gmail.com');
        $mailers -> addAddress($_POST['email']);
        
        $mailers -> isHTML(true);
        $mailers -> Subject = "Smart attendance Account credentials";
        $mailers -> Body = "Dear $names this is to inform you That your account is created successfull <br> Bellow is your account credentials:<br> Username: <br> $email <br>Password: $password1 <br> 
        
        Thank you";
        $mailers -> send();

        echo "
        <script>
            alert('Emails Sent, so check the email')
            location='../index.php'
        </script>
        ";

        return;
    }else{
       echo "<script>
            alert('Account created successfull')
            location='../index.php'
        </script>";
    }


}

?>