<?php
session_start();
include('../../config/db.php');
if(empty($_SESSION["identifier"])){
    header("location: ../../auth/login.php?error=403");
    exit();
}
if(isset($_GET['eventid'])){
    $eventid=trim($_GET["eventid"]);  
    $sql = "DELETE FROM events where event_id=$eventid";
    $result = mysqli_query($conn,$sql);
    echo $result;
    if($result){
        header("location: ../index.php?error=none");
        exit();
    }
    else{
        echo die(mysqli_error($conn));
    }
}
else{
    echo "not gotten";
}
?>