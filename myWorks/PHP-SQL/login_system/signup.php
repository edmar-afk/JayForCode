<?php

    session_start();

    include("connection.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST"){

        //something was posted

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];

        if(!empty($user_name) && !empty($user_password) && !is_numeric($user_name)){

            //save to database
            $user_id = random_num(20);
            $query = "INSERT INTO `users`(`user_id`,`user_name`, `user_passwrod`) VALUES ('$user_id','$user_name', '$user_password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        } 
        else{
            echo "Please enter some valid information!";
        }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="box">
        <div class="login-head">Signup</div>
        <form action="" method="post">
            <input id="text" type="text" name="user_name"> <br><br>
            <input id="text" type="text" name="user_password"> <br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Login</a>
        </form>
    
    
    </div>
</body>
</html>