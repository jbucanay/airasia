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
    include 'cart.css';
    ?>
</style>
    <title>Air asia | Cart</title>
    <?php 
if(!isset($_SESSION['user'])){
  header("Location: ../login/login.php");
}

?>
</head>
<body >
    
<div id='cart_main'>
<?php
if(isset($_GET['cardId'])){
$cardId = $_GET['cardId'];

$connection = new mysqli($host, $us, $pw, $db);
if($connection->connect_error) die ("Connection not made");
$query = "SELECT * FROM giftcard WHERE cardId = $cardId";
$result = $connection->query($query)->fetch_assoc();
if(!$result) die ("Database access failed");

array_push($_SESSION['cart'], $result);
array_unique($_SESSION['cart'], SORT_REGULAR);


}

$cart = $_SESSION['cart'];
$len = count($cart);


foreach($cart as $card){
    $cardName = $card['cardName'];
    $cardType = $card['cardType'];
    $cardValue = $card['cardValue'];
    $points = $card['points'];
    

    echo <<<_END
    <div id='cart_card'>
    <div class="card" style="width: 15rem;" >
    <img src="https://images.unsplash.com/photo-1512916206820-bd6d503c003e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="gift card">
    <div class="card-body">
    <h5 class="card-title">$cardName</h5>
    <p class="card-text">$cardType</p>
    <p class="card-text">$$cardValue</p>
    <p class="card-text">$points</p>
    </div>
    </div>
   

_END;


}






?>

</div>
<section id='section'>
		<?php 
		if(!empty($_SESSION['cart'])){
		echo <<<_end
		<br>
		<div><small>Thank you for chopping with us</small></div>
		<a href='../payment/Payment.php'><button  class="btn btn-warning" type='Submit' >Checkout</button></a>
		
		
		_end;
		} else {
			echo "<strong>You have an empty cart</strong>";
		}
		
		
		?>
</section>

</body>
</html>