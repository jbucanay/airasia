<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cardlist.css">
    <title>Air Asia | Card List</title>
</head>
<body id='main'>

    <br>
    
    <br>
    <div class="btn-group">
        <a href="../addcustomer/addcustomer.php" class="btn btn-primary" aria-current="page">Add Customer</a>
        <pre>Next card</pre>
        <a href="../addcard/addcard.php" class="btn btn-primary">Add Card</a>
      </div>
    <br>
    <?php 
require_once "../server/auth.php";

$connection = new mysqli($host, $us, $pw, $db);

if($connection->connect_error) die ("Connection not made");
$query = "SELECT * FROM giftcard";
$result = $connection->query($query);
if(!$result) die ("Database access failed");
$rows = $result->num_rows;

for ($i=0;$i<$rows;++$i){
 
  $row = $result->fetch_array(MYSQLI_ASSOC);
  
  $cardImage = $row['cardImage'];
  $cardName = $row['cardName'];
  $cardType = $row['cardType'];
  $points = $row['points'];
  $cardId = $row['cardId'];
  
  echo <<<_END
  
   <div id="cardlist">
        <a href="../carddetails/card-details.php?cardId=$cardId">
    <div class="card" style="width: 18rem;" class="card">
        <img src="$cardImage" class="card-img-top" alt="gift card">
        <div class="card-body">
          <h5 class="card-title">$cardName</h5>
          <p class="card-text">$points</p>
        </div>
      </div></a>
     
  _END;
}

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $connection->query("DELETE FROM giftcard where cardId= $id");
  header("Location: ../cardlist/card-list.php");
  
      
      
}

if(isset($_GET['update'])){
  $id = $_POST['cardId'];
  $cardImage = $_GET['cardImage'];
  $cardName= $_POST['cardName'];
  $cardType= $_POST['cardType'];
  $points = $_POST['points'];
  $qry = "UPDATE giftcard SET cardImage='$cardImage',cardName='$cardName',cardType='$cardType',points=$points";
  $res = $connection->query($qry);
  if(!$res) die ($connection->error);
  

  
  
      
      
}

$connection->close();
?>

</body>
</html>

