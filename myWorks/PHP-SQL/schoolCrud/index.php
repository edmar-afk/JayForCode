<?php

    include_once("connections/connection.php");

    $con = connection();



    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['UserLogin'])){
        echo "welcome ".$_SESSION['UserLogin']; //display text when i logged in as admin
    } else{
        echo "Welcome Guest";
    }
 

    
    $sql = "SELECT * FROM student_list ORDER BY id DESC";
    $students = $con->query($sql) or die($con->error);
    $row = $students->fetch_assoc();

    

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
    <h1>STUDENT CRUD</h1><br><br>
    <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>


    <?php if(isset($_SESSION['UserLogin'])){ ?>
    <a href="logout.php">Logout</a>
    <?php } else{ ?>
        <a href="login.php">Login</a>
    <?php }?>
    <a href="add.php">Add New</a>
    
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>             
                <th>Gender</th>
                <th></th>
            </tr>
        </thead>
        <tbody>  
        <?php do{ ?>      
            <tr>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><a href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
            </tr>
        <?php }while($row = $students->fetch_assoc()) ?>    
        </tbody>
    </table>
    
</body>
</html>