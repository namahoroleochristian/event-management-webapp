<?php
include('../config/db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<nav>
        <ul>
            <li>KG EVENTS</li>
        </ul>
        <ul>
            <li>
               <a href="../app/index.php"> HOME</a>
            </li>
            <?php
            if(empty($_SESSION["email"])){
                echo"
                 <li>
                 <a href='./register.php'> signup</a>
                 </li>
                 <li>
               <a href='./login.php'> login</a>
            </li>
                ";
            }else{
                echo" <li>   
                <a href='./auth/logout.php'> logout</a>
            </li>";
            }
            ?>
        </ul>
    <form method="post">
        <input  name="email" type="email">
        <input  name="password" type="password">
        <button name="submit" >Submit</button>
    </form>


    <?php
     if(isset($_POST['submit'])){
        $email=trim($_POST["email"]);
        $password=trim($_POST["password"]);
        if( empty($email) || empty($password) ){
            header("location: login.php?error=emptyFields");
            exit();
        }
        $sql = "SELECT * from users where Email='$email'";
        $result = mysqli_query($conn,$sql);
        $userFromDB = mysqli_fetch_assoc($result);
        
        if(empty($userFromDB["Email"])){
            header("location: login.php?error=invalidcredentials");
            exit();
        }
        $passwordMatch = password_verify($password,$userFromDB["Password"]);
        if ($passwordMatch) {
            header("location: ../app/view/event.php?error=none");
            $_SESSION["email"]=$email;
            exit();
        }
        else{
            header("location: login.php?error=invalidcredentials");
            exit();

        }

     }
    ?>
</body>
</html>