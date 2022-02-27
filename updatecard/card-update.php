<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cardupdate.css">
    <title>Air Asia | Card Update</title>
</head>
<body>
<?php 

require_once "../server/auth.php";

$connection = new mysqli($host, $us, $pw, $db);
$cardId = $_GET['cardId'];
if($connection->connect_error) die ("Connection not made");
$query = "SELECT * FROM giftcard WHERE cardId = $cardId";
$result = $connection->query($query);
if(!$result) die ("Database access failed");

$row = $result->fetch_array(MYSQLI_ASSOC);


for($i = 0; $i < count($row); ++$i)
    $cardImage = $row['cardImage'];
    $cardName= $row['cardName'];
    $cardType= $row['cardType'];
    $points = $row['points'];
    $cardId = $row['cardId'];
    echo <<<_END
      <form class="col-lg-6 offset-lg-3 " action="card-update.php" method="post">
      <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Card Image</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="cardImage" placeholder="paste image url here" value='$cardImage'>
          </div>
        </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Card Name</label>
        <div class="col-sm-10">
          <input class="form-control" id="inputEmail3" name="cardName" value='$cardName'>
        </div>
      </div>
      <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Card Type</label>
          <div class="col-sm-10">
            <input class="form-control" name="cardType" value='$cardType'>
          </div>
        </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Points</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="points" value='$points'>
        </div>
      </div>
      
      <button type="submit" class="btn btn-primary" >Submit</button>
    </form>

    _END;
?>

</body>
</html>

