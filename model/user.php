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

 
 


}
