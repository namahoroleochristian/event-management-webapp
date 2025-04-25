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
        <button name="submit" >login</button>
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
      
        $isAdminsql="SELECT * from admin where identifier='$email'";
        
        
        $AdminResult = mysqli_query($conn,$isAdminsql);
        $result = mysqli_query($conn,$sql);

        $userFromDB = mysqli_fetch_assoc($result);
        $AdminFromDB = mysqli_fetch_assoc($AdminResult);
        
        if(empty($userFromDB["Email"]) && empty($AdminFromDB["identifier"])){

            header("location: login.php?error=invalivfgxgxdcredentials345345'");
            exit();      
            
        } 
        $passwordMatch = password_verify($password,$userFromDB["Password"]);
        $AdminPasswordMatch =  password_verify($password,$AdminFromDB["password"]);
        if ($passwordMatch) {
            header("location: ../app/view/event.php?error=none");
            $_SESSION["email"]=$email;
            $_SESSION["identifier"]=null;
            exit();
        }
        elseif ($AdminPasswordMatch) {
            header("location: ../app/view/event.php?error=none");
            $_SESSION["identifier"]=$email;
            $_SESSION["email"]=null;
                exit();
        }  
        else{
            header("location: login.php?error=invalidcredentialsforall");
            exit();

        }
   
    
       
     }
    // else{
    //     echo "form can't be submitted";
    // };

    ?>
</body>
</html>