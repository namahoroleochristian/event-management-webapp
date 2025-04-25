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
            if(empty($_SESSION["email"])){
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
            <table>
                <th>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </th>
            </table>
</body>
</html>