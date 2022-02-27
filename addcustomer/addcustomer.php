<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="addcustomer.css">
    <title>Air Asia | Add Customer</title>
</head>
<body>
    <form class="col-lg-6 offset-lg-3 " action="addcustomer.php" method="post">
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="userName">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="password">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="firstName">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label" >Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="lastName">
          </div>
        </div>
        <div class="row mb-3">
          <label  class="col-sm-2 col-form-label">Role</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="role">
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary" >Submit</button>
      </form>
</body>
</html>

<?php 
require_once "../login/login.php";

$connection = new mysqli($host,$us,$pw,$db);
if($connection->connect_error) die("Connection not made");
if (isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['role'])){
  $userName = $_POST['userName'];
  $password = $_POST['password'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $role = $_POST['role'];

  $query = "INSERT INTO user (userName,password,firstName,lastName,role) VALUES('$userName','$password','$firstName','$lastName','$role')";
  $result = $connection->query($query);
  if(!$result) echo "Insert failed <br>";
  if($result){

    header("Location: ../cardlist/card-list.php");
  }
  

}

$connection->close();


?>