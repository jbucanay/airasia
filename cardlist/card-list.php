

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <style type="text/css">
      <?php
      include 'cardlist.css'
      ?>

    </style>
    <?php 
    include_once "../navigation/navbar.php"
    
    ?>
    
    <title>Air Asia | Card List</title>
    <?php 
if(!isset($_SESSION['user'])){
  header("Location: ../login/login.php");
}

?>
</head>
<body id='main'>

    <br>
    
    <br>
    
   
      
    <br>
    <div class='cardcont'>
    <?php 

$connection = new mysqli($host,$us,$pw,$db);


if($connection->connect_error) die ("Connection not made");
$query = "SELECT * FROM giftcard";
$result = $connection->query($query);
if(!$result) die ("Database access failed");
$rows = $result->num_rows;


for ($i=0;$i<$rows;++$i){
 
  $row = $result->fetch_array(MYSQLI_ASSOC);
  
  $cardValue = $row['cardValue'];
  $cardName = $row['cardName'];
  $cardType = $row['cardType'];
  $points = $row['points'];
  $cardId = $row['cardId'];
  
  echo <<<_END
 
   <div class='card'>
        <a href="../carddetails/card-details.php?cardId=$cardId" id='cards'>
    <div class="card" style="width: 18rem;" class="card">
        <img src="https://images.unsplash.com/photo-1512916206820-bd6d503c003e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="gift card">
        <div class="card-body">
          <h5 class="card-title">$cardName</h5>
          <p class="card-text">$cardType</p>
          <h5 class="card-title">$$cardValue</h5>
          <p class="card-text">$points</p>
        </div>
      </div></a>
    </div> 
    
  
  _END;
}






?>
</div>
</body>
</html>

