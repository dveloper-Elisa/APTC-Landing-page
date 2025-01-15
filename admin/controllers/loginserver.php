<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

include_once "../connection/bd_connection.php";

if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if(empty($email) || empty($password)){
        ?>

        <script>
            alert("All fields must be field")
            location="../index.php"
        </script>
        <?php
        return;
    }


    $sql = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");


    $result = mysqli_num_rows($sql);
    if($result > 0){
        while($row = mysqli_fetch_assoc($sql)){
        if(!password_verify($password,$row['password'])){
            echo"<script>
            alert('Login Failure')
            location='../index.php'
        </script>";
        return;
        }
        }
        $_SESSION['email'] = $email;
        

        echo"<script>
            alert('Login success')
            location='../dashboard.php'
        </script>";
        return;

    }else{
        ?>

        <script>
            alert("Login Failure")
            location="../index.php"
        </script>
        <?php
        return; 
    }

}

?>