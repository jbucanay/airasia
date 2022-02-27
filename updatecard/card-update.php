<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style rel="stylesheet" href="cardupdate.css"> </style>
    <title>Air Asia | Card Update</title>
</head>
<body>
<?php 

require_once "../login/login.php";

$connection = new mysqli($host, $us, $pw, $db);
if($connection->connect_error) die ("Connection not made");
if(isset($_GET['cardId'])){
$cardId = $_GET['cardId'];
$query = "SELECT * FROM giftcard WHERE cardId = $cardId";
$result = $connection->query($query);
if(!$result) die ("Database access failed");
$rows = $result->num_rows;


for($i = 0; $i < $rows; ++$i){

  $row = $result->fetch_array(MYSQLI_ASSOC);
    
    echo <<<_END
        <form class="col-lg-6 offset-lg-3 " action='card-update.php' method='post'>
        <img src="https://images.unsplash.com/photo-1512916206820-bd6d503c003e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="gift card">
        <br>
        <br>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Card Name</label>
          <div class="col-sm-10">
            <input class="form-control" id="inputEmail3" name="cardName" value='$row[cardName]'>
          </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Card Type</label>
            <div class="col-sm-10">
              <input class="form-control" name="cardType" value='$row[cardType]'>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Card Value</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputEmail3" name="cardValue"  value='$row[cardValue]' step='any'>
            </div>
          </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Points</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="points" value='$row[points]'>
          </div>
        </div>
        <input type='hidden' name='update' value='yes'>
        <input type='hidden' name='cardId' value=$row[cardId]>
        <button type="submit" class="btn btn-primary" value='Update'> Update</button>
      </form>
      _END;

    }
    
  }

  if(isset($_POST['update'])){
    $cardValue = (double)$_POST['cardValue'];
    $cardName= $_POST['cardName'];
    $cardType= $_POST['cardType'];
    $points = (int)$_POST['points'];
    $cardId = (int)$_POST['cardId'];
    
    echo gettype($cardValue). "<br>";
    echo $cardValue ."<br>";
    echo "$cardName <br>";
    echo "$cardType <br>";
    echo "$points <br>";
    echo gettype($cardId) ."<br>";

    $qry = "UPDATE giftcard SET cardvalue=$cardValue, cardName='$cardName', cardType='$cardType', points=$points WHERE cardId = $cardId";
    $res = $connection->query($qry);
    if(!$res) die ("update failed");

    if($res){
      header("Location: ../cardlist/card-list.php");
    }
    
    
    
    
  
  
  }
    
    

  
   
$connection->close();
    



?>

</body>
</html>

