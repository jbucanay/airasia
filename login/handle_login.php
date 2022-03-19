<?php

require_once "../server/auth.php";

$conn = new mysqli($host, $us, $pw, $db);
if($conn->connect_error) die ($conn->connect_error);

if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $token = password_hash($password, PASSWORD_DEFAULT);
    $qry = "SELECT * FROM user WHERE userName = '$username'";
    $result = $conn->query($qry)->fetch_assoc();
    

    if(password_verify($password,$token)){
        session_start();
        $_SESSION['redeem'] = [];
        $_SESSION['user'] = $result;

        header('Location: ../cardlist/card-list.php');
        
    
    
    } else {
        header("Location: login.php");
    }

} else {
    header("Location: login.php");
}







?>