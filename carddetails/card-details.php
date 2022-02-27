<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="carddetails.css">
    <title>Air Asia | Card Details</title>
</head>
<body class="main">
    <br>
    <br>
    <br>
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
    $points = $row['points'];
    $cardId = $row['cardId'];
    
    
    echo <<<_END
        <div class="card" style="width: 50rem;">
            <img src="$cardImage" class="card-img-top" alt="gift card">
        <div class="card-body">
        <h5 class="card-title">$cardName</h5>
        <p class="card-text">$points</p>
        </div>
        <div>
        <button type="submit" class="btn btn-primary" ><a href="../updatecard/card-update.php?cardId=$cardId">Update</a></button>
        <button type="submit" class="btn btn-primary" ><a href="../cardlist/card-list.php?delete=$cardId">Delete</a></button>
      
        </div>

    _END;








?>
    </div>
</body>
</html>

