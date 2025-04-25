<?php
session_start();
include('../../config/db.php');
if(empty($_SESSION["email"]) && empty($_SESSION["identifier"])){
    header("location: ../../auth/login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view events</title>
</head>
<body>
<nav>
<ul>
            <li>KG EVENTS</li>
        </ul>
        <ul>
            <li>
               <a href="../index.php"> HOME</a>
            </li>
            <?php
            if(is_null($_SESSION["email"] && is_null($_SESSION["identifier"]))){
                echo"
                 <li>
                 <a href='./register.php'> signup</a>
                 </li>
                 <li>
               <a href='./auth/login.php'> login</a>
            </li>
                ";
            }else{
                echo" <li>   
                <a href='../auth/logout.php'> logout</a>
            </li>";
            }
            ?>
            
           
        </ul>
</nav>

</body>
</html>