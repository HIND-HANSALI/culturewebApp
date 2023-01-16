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
            header("location: ../pages/login.php?error=wronglogin");
            exit();
        }
        //check password if its the same
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($password, $result["password"]);

        if ($checkPwd == false) {
            $stmt = null;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            header("location: ../pages/login.php?error=wronglogin");
            exit();
        } elseif ($checkPwd == true) {
            $_SESSION["name"] = $result["username"];
            // $_SESSION["id"] =  $result["id_user"];
            // $_SESSION["role"] =  $result["id_role"];
            $_SESSION["email"] = $email;
            // $_SESSION["good"] = "goode";
        }
        $stmt = null;
    }
 


}
