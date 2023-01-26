<?php
include_once('../controllers/userController.php');
session_start();
$userController=new UserController();
$userController->loginUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap Font Icon CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body class="overflow-hidden">
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
            <?php if(isset($_SESSION['error'])){?>
                <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
                </div>
              <?php }?>
           
            <form  method="post" action="login.php"  id="Login">
              <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="emailLogin" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                <div class="errormsg"></div>
              </div>


              <div class="form-floating mb-4">
                <input type="password" class="form-control" id="passwordLogin" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <div class="errormsg"></div>
              </div>

             
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" name="login" type="submit">Sign in</button>
              </div>
              
             <hr class="my-4">
             
             <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-dark"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-dark"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-dark"><i class="fab fa-google fa-lg"></i></a>
              </div>

              
            </form>
            <div>
              <p class="mb-0 mt-5 text-center">Don't have an account? <a href="signup.php" class=" fw-bold">Sign Up</a>
              </p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/formaValidation.js"></script>   
</body>
</html>