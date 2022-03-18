<?php 
include_once "../server/auth.php";

$connection = new mysqli($host,$us,$pw,$db);


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $connection->query("DELETE FROM giftcard where cardId= $id");
    header("Location: ../cardlist/card-list.php");
    
        
        
  }


?>