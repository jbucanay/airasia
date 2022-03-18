<?php

require_once "../server/auth.php";

$conn = new mysqli($host, $us, $pw, $db);
if($conn->connect_error) die ($conn->connect_error);

if(!empty($_POST['username']) && !empty($_POST['password'])){
    print_r($_POST);

} else {
    header("Location: login.php");
}







?>