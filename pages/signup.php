<?php
include_once('../controllers/userController.php');
$userController= new UserController();
$userController->signupUser();
// if(isset($_POST['signup'])){
//   $userController->signupUser();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- BEGIN parsley css-->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css"> -->
<!-- END parsley css-->  
</head>

<body class="bgstyle">
<section class="vh-100 bg-image">
  <!-- style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');"> -->
  
 
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card bg-white text-dark" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase fw-light text-center mb-5">Create an account</h2>
              <?php if(isset($_SESSION['error'])){?>
                <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']);
              
                ?>
                
                </div>
              <?php }?>
              
              <form  method="POST" id="signUp">
              

                <div class="form-floating mb-4">
                  <input type="text" id="userName" name="userName" class="form-control form-control-lg " placeholder="Your Name"/>
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                  <div class="errormsg"></div>
                </div>

                <div class="form-floating mb-4">
                  <input type="text" id="email" name="email" class="form-control form-control-lg" placeholder="Your Email"/>
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                  <div class="errormsg"></div>
                </div>

                <div class="form-floating mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" onkeypress="signupValide()"/>
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <div class="errormsg"></div>
                </div>

                <div class="form-floating mb-4">
                  <input type="password" id="passwordCheck" name="passwordCheck" class="form-control form-control-lg" placeholder="Repeat your password"/>
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  <div class="errormsg"></div>
                </div>


                <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="signup">Register</button>
              </div>

                <p class="text-center mt-4 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold "><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
 
    
</section>
<!-- <script src="../assets/js/formaValidation.js"> </script>    -->
</body>



</html>