<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style rel="stylesheet" href="login.css"></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <title>Air Asia</title>
</head>
<body>
  <br>
  <br>
 
      <form class="col-lg-6 offset-lg-3 " action="handle_login.php" method="post" id='form'>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label" id='label_un'>User Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name='username' id='username'>
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name='password' >
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary" >Sign in</button>
      </form>
    
</body>
</html>
