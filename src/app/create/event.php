<?php
session_start();
include('../../config/db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create event</title>
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
        <section>
        <form method="post">
        <input  name="name" type="text" placeholder="enter event name">
        <input  name="location" type="location" placeholder="enter event location">
        <select name="category" >
            <option value="fashion">fashion</option>
            <option value="wedding">wedding</option>
            <option value="festival">festival</option>
            <option value="party">party</option>
            <option value="birthday">birthday</option>
            <option value="show">show</option>
        </select>
        <input  name="date"  type="date" placeholder="enter event date">
        <input  name="info" type="text" placeholder="enter event contact info">
        <input  name="description" type="text" placeholder="enter event description">
        <button name="submit" >Submit</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $name=trim($_POST["name"]);    
        $category=trim($_POST["category"]);
        
        $date=trim($_POST["date"]);
        $description=trim($_POST["description"]);
        $location=trim($_POST["location"]);
        $info=trim($_POST["info"]);
        if(empty($name) || empty($category) || empty($description) || empty($date) || empty($info)|| empty($location)  ){
            header("location: event.php?error=emptyFields");
            exit();
    }
    $sql="INSERT INTO events VALUES(Null,'$name','$category','$date','$location','$description','$info')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("location: ../index.php?error=none");
        exit();
    }
    else{
      echo  mysqli_error($conn);
    }
}


?>
        </section>
</body>
</html>