<?php 

include_once '../model/user.php';

class UserController extends User{




      /* ============================== SignUp ============================== */
    public function signupUser(){
        // echo 'hiii';
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['signup'])){
                echo 'hiii';

                // extract($_POST);

                // echo $_SESSION["name"] = $userName;
                // echo $_SESSION["email"] = $email;
                // echo $_SESSION["password"] = $password;
                // echo $_SESSION["Rpassword"] = $passwordCheck;
                // $this->validateSignup($userName,$email,$password,$passwordCheck);
                // echo "hhh";

            }
        // }
    }

    public function validateSignup($name,$email,$password,$RepeatPassword){
        if(!$this->emptyInputSignup($name, $email, $password, $RepeatPassword)){
            header("location: ../pages/signup.php?error=emptyinput");
            exit();
        }
        elseif(!$this->invalidName($name)){
            header("location: ../pages/signup.php?error=Errorusername");
            exit();
        }
        elseif(!$this->invalidEmail($email)){
            header("location: ../pages/signup.php?error=Erroremail");
            exit();
        }
        elseif(!$this->passwordMatch($password, $RepeatPassword)){
            header("location: ../pages/signup.php?error=Matchpassword");
            exit();
        }
        elseif(!$this->checkEmailSignup($email)){
            header("location: ../pages/signup.php?error=emailtaken");
            exit();
        }else{
            $this->signUp($name, $email, $password);
            header('location: ../pages/login.php');
        }


    }
     /* ============================== Login ============================== */
     public function loginUser(){
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['login'])){


                extract($_POST);
                $this->validateLogin($email,$password);

            }
        // }
    }

    public function validateLogin($email,$password){

        if(!$this->emptyInputLogin($email, $password)){
            header("location: ../pages/login.php?error=emptyinput");
            exit();
        }elseif(!$this->invalidEmail($email)){
            header("location: ../pages/login.php?error=Erroremail");
            exit();
        }else{
            $this->login($email, $password);
            header('location: ../index.php');
        }
    }




     /* ============================== Validation-signup ============================== */

     function emptyInputSignup($name,$email,$password,$RepeatPassword): bool
     {
         if(empty($name) ||empty($email) ||empty($password) ||empty($RepeatPassword)){
             $result = false;
         }else{
             $result = true;
         }
 
         return $result;
     }
     function invalidEmail($email): bool
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

    function invalidName($name): bool
    {
        if(!preg_match("/^([a-zA-Z0-9]*[ ]{0,1}[a-zA-Z0-9]*)$/",$name )){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }
    function passwordMatch($password,$RepeatPassword): bool
    {
        if($password !== $RepeatPassword){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    function checkEmailSignup($email): bool
    {
        if($this->checkEmailSignupBD($email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
 /* ============================== Validation-login ============================== */   
    
 function emptyInputLogin($email,$password): bool
 {
     if(empty($email) ||empty($password)){
         $result = false;
     }else{
         $result = true;
     }

     return $result;
 }

}

