<?php
session_start();
include('../../config/db.php');
if(empty($_SESSION["email"])){
    header("location: ../../auth/login.php?error=invalidcredentials");
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
            if(empty($_SESSION["email"])){
                echo"
                 <li>
                 <a href='../../auth/register.php'> signup</a>
                 </li>
                 <li>
               <a href='../../auth/login.php'> signup</a>
            </li>
                ";
            }else{
                echo" <li>   
                <a href='../../auth/logout.php'> logout</a>
            </li>";
            }
            ?>
            
           
        </ul>
</nav>

</body>
</html>