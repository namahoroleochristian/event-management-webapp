<?php
session_start();
include('../config/db.php');


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
               <a href=""> HOME</a>
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
                <?php
                if(!empty($_SESSION["identifier"])){
                        echo"
                        <button><a href='./create/event.php'>create new event<a/> </button>
                        ";
                }
                ?>
            <table border=2 cellspacing=3>
                <thead >
               
                    <tr>
                        <th>Event ID</th>
                        <th>Event name</th>
                        <th>Event location</th>
                        <th>Event category</th>
                        <th>Event date</th>
                        <th>Event description</th>
                        <th>contac info</th>
                        <?php
                if(!empty($_SESSION["identifier"])){
                        echo"
                       <th colspan=2>action</th>
                        ";
                }
                ?>
                        
                    </tr>
                  
                
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM events";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo"
                              <tr>
                        <td>".$row['event_id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['location']."</td>
                        <td>".$row['category']."</td>
                        <td>".$row['date_time']."</td>
                        <td>".$row['description']."</td>
                        <td>".$row['contact_info']."</td>
                       ";if(!empty($_SESSION["identifier"])){
                        echo " 
                        <td><a href='./update/event.php?eventid=".$row['event_id']."'>update<a/></td>
                        <td><a href='./delete/event.php?eventid=".$row['event_id']."'>delete<a/></td>
                    </tr>
                            ";}
                        }
                    ?>
                </tbody>

            </table>
</body>
</html>