<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style rel="stylesheet" href="addcard.css"> 
  <?php 
  include "addcard.css";
  
  ?>
  
  </style>
    <title>Air Asia | Add Card</title>
</head>
<body>
    <form class="col-lg-6 offset-lg-3 " action="addcard.php" method="post">
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Card Name</label>
          <div class="col-sm-10">
            <input class="form-control" id="inputEmail3" name="cardName">
          </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Card Type</label>
            <div class="col-sm-10">
              <input class="form-control" name="cardType">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Card Value</label>
            <div class="col-sm-10">
              <input class="form-control" name="cardValue" type="number" step="any">
            </div>
          </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Points</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="points" >
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary" >Submit</button>
      </form>
</body>
</html>

<?php 
require_once "../login/login.php";

$connection = new mysqli($host,$us,$pw,$db);
$res = $connection->query("SELECT * FROM giftcard");

if($connection->connect_error) die("Connection not made");
if(isset($_POST['cardValue']) && isset($_POST['cardName']) && isset($_POST['cardType']) && isset($_POST['points'])){
  $cardValue = $_POST['cardValue'];
  $cardName = $_POST['cardName'];
  $cardType = $_POST['cardType'];
  $points = $_POST['points'];
 

  $query = "INSERT INTO giftcard (cardName,cardType,cardValue,points) VALUES('$cardName','$cardType','$cardValue',$points)";
  $result = $connection->query($query);
  if(!$result) echo "Insert failed <br>";
  if($result){

    header("Location: ../cardlist/card-list.php");
  }
  
  
}

$connection->close()


?>