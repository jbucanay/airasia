<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php 
        session_start()
    ?>
    <style type="text/css">

    <?php 
    include "navbar.css"
    
    
    ?>

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    
      <div class="navbar-nav">
      <p class="navbar-brand">
      <img src="https://a.staticaa.com/images/logos/airasiacom_logo.svg" alt="" width="100" height="24" class="d-inline-block align-text-top">
     
        </p>
        <?php 
        if(isset($_SESSION['user'])){
            echo <<<_end
            
            <a class="nav-link" href="../cardlist/card-list.php">Gift Cards</a>
            <a class="nav-link" href="../navigation/logout.php">Log out</a>
            

            _end;

            if($_SESSION['user']['role'] == 'Admin'){
                echo <<<_END
                <a class="nav-link" href="../addcustomer/addcustomer.php">Add Customer</a>
                <a class="nav-link" href="../addcard/addcard.php">Add Giftcard</a>

                _END;

            }

            if($_SESSION['user']['role'] == 'Customer'){
                echo <<<_end
                <a class="nav-link" href="../addcustomer/addcustomer.php">Redeem</a>
                            <li class="nav-item">
                    <a id='cart_link' class="nav-link" href="../cart/cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                </svg></a>
                    </li>
                _end;

            }
        }
        
        ?>
        
      </div>
    </div>
  </div>
</nav>
    
</body>
</html>



<?php 

$host = 'localhost:8889';
$db = 'rewards';
$us = 'root';
$pw = 'root';



?>