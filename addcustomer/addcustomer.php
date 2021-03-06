<!DOCTYPE html>
<html lang="en">
<head>
<?php 
ob_start();
    include_once "../navigation/navbar.php";
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style type="text/css"> 
          
      
      
      <?php 
      include "addcustomer.css";
      
      
      ?>
  </style>
  
    <title>Air Asia | Add Customer</title>
    <?php 
if(!isset($_SESSION['user'])){
  header("Location: ../login/login.php");
}

?>
</head>
<body>
    <form class="col-lg-6 offset-lg-3 " action="addcustomer.php" method="post" id='form'>
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
          <select class="form-control" id="exampleFormControlSelect1" name='role'>
          <option value="none" selected disabled hidden>-Select-</option>
      <option value="Admin">Admin</option>
      <option value="Customer">Customer</option>
    </select>
          </div>
        </div>
        
        <button type="submit" class="btn btn-danger" >Submit</button>
      </form>
</body>
</html>

<?php 


$connection = new mysqli($host,$us,$pw,$db);
if($connection->connect_error) die("Connection not made");
if (isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['role'])){
  $userName = $_POST['userName'];
  $password = $_POST['password'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $role = $_POST['role'];
  $token = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO user (userName,password,firstName,lastName,role) VALUES('$userName','$token','$firstName','$lastName','$role')";
  $result = $connection->query($query);
  if(!$result) echo "Insert failed <br>";
  if($result){

    header("Location: ../cardlist/card-list.php");
  }
  

}
ob_end_flush();
$connection->close();


?>