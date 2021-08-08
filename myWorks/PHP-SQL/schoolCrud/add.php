<?php

    include_once("connections/connection.php");

    $con = connection();

    if(isset($_POST['submit'])){

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        
        $gender = $_POST['gender'];

        $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender`) 
        VALUES ('$fname','$lname','$gender')";

        $con->query($sql) or die($con->connect_error);

        echo header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School CRUD</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>


    <form action="" method="post">

        <label>First Name:</label>
        <input type="text" name="firstname" id="firstname"> <br><br>
        
        <label>Last Name:</label>
        <input type="text" name="lastname" id="lastname"><br><br>

        <label>Gender:</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <input type="submit" name="submit" value="Submit">
    
    </form>
    
</body>
</html>