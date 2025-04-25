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
    </nav>
    <form method="post">
        <input  name="name" type="name">
        <input  name="email" type="email">
        <input  name="password" type="password">
        <button name="submit" >Submit</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $name=trim($_POST["name"]);
        $email=trim($_POST["email"]);
        $password=trim($_POST["password"]);
        if(empty($name) || empty($email) || empty($password) ){
            header("location: register.php?error=emptyFields");
            exit();
    }
    $hashedPassword=password_hash($password,PASSWORD_BCRYPT);
    $sql="INSERT INTO users VALUES(Null,'$name','$email','$hashedPassword')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location: login.php?error=none");
        exit();
    }
    else{
      echo  die(mysqli_error($conn));
    }
}


?>
</body>
</html>