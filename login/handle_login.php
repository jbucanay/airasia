<?php

require_once "../server/auth.php";

$conn = new mysqli($host, $us, $pw, $db);
if($conn->connect_error) die ($conn->connect_error);

if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $qry = "SELECT * FROM user WHERE userName = '$username'";
    $result = $conn->query($qry)->fetch_assoc();

    if($result){
        print_r($result);
    } else {
        header("Location: login.php");
    }

} else {
    header("Location: login.php");
}







?>