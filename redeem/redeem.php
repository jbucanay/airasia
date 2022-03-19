<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php 

include_once "../navigation/navbar.php"

?>
<style type="text/css">
    <?php
    include 'redeem.css';
    ?>
</style>
    <title>Air asia | redeem</title>
    <?php 
if(!isset($_SESSION['user'])){
  header("Location: ../login/login.php");
}

?>
</head>
<body >
    
<div id='redeem_main'>
<?php

if(isset($_GET['cardId'])){
$cardId = $_GET['cardId'];
$connection = new mysqli($host, $us, $pw, $db);
if($connection->connect_error) die ("Connection not made");
$userID = $_SESSION['user']['userId'];

//card query
$card_q = "SELECT * FROM giftcard WHERE cardId = $cardId";
$card_results = $connection->query($card_q)->fetch_assoc();

//account query
$account_q = "SELECT * FROM account WHERE userID = $userID";
$account_results = $connection->query($account_q)->fetch_assoc();

$balance = $account_results['points'];

if($account_results['points'] > $card_results['points'] && $account_results['points'] > 0){

    //update account
    $remaining = $account_results['points'] - $card_results['points'];
    $account_id = $account_results['accountId'];
    $update_account = "UPDATE account SET points = $remaining WHERE userID = $userID AND accountId = $account_id";
    $connection->query($update_account);


    //update redemption 
    //	redeemId	date	accountId	cardId	pointsRedeemed
    $redeemed = $card_results['points'];
    $timestamp = date("Y-m-d");
   
    $redemption_q = "INSERT INTO redemption (date,accountId,cardId,pointsRedeemed)VALUES('$timestamp',$account_id,$cardId, $redeemed)";
    $res = $connection->query($redemption_q);
    print_r($res);

   
    

}



}










?>

</div>


</body>
</html>