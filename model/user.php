<?php

include_once('database.php');  // Path to the DataBase

class User extends Database{

    /* ============================== Signup ============================== */
    public function signUp($name, $email, $password){
        $stmt = $this->connect()->prepare('INSERT INTO admins(username,email,password) value (?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt -> execute([$name, $email, $hashedPwd])){
            $stmt = null;
            header("location : ../pages/signup.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkEmailSignupBD($email){

        $stmt = $this->connect()->prepare('SELECT email FROM admins Where email = ?;');


        if(!$stmt -> execute(array($email))){
            $stmt = null;
            header("location : ../pages/signup.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0){
            $resultCheck = true;
        }else{
            $resultCheck = false;
        }

        return $resultCheck;
    }

    /* ============================== Login ============================== */
    protected function login($email, $password){
        $stmt = $this->connect()->prepare('SELECT * FROM admins WHERE email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location : ../pages/login.php?error=stmtfailed");
            exit();
        }


        if ($stmt->rowCount() == 0) { 
            // $stmt = null;
            // $_SESSION["email"] = $email;
            // $_SESSION["password"] = $password;
            $_SESSION['error'] = 'password or email is wrong';
            // header("location: ../pages/signup.php");
            // header('location: ../pages/post.php');

            header("location: ../pages/login.php?error=wronglogin");
            exit();
        }
        //check password if its the same
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // $stmt = null;
        
        $checkPwd = password_verify($password, $result["password"]);
        // echo 'checkPwd: ' . $checkPwd;

        if ($checkPwd == false) {
            

            $stmt = null;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            header("location: ../pages/login.php?error=wronLLLglogin");
            exit();
        } else {
           
            $_SESSION["name"] = $result["username"];
            $_SESSION["id"] =  $result["id"];
            $_SESSION["email"] = $email;
            $_SESSION['good'] = true;
            header('location:../pages/post.php');
        }
    }

/* ==============================get Admins ============================== */

protected function getAdminsDB(){

    $sql = "SELECT * FROM admins ";
    $stmt = $this ->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;

}
 /* ============================== Logout ============================== */
 protected function logoutDB(){
    session_destroy();
    header("location: ../pages/login.php");
}


}
