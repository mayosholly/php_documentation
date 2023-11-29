<?php 

class User{

    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password_hash($password);
    }

    public function getUsername(){
        return $this->username;
    }

    public function getEmail(){
        return $this->password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function verifyPassword($password){
        return password_verify($password,$this->password);
    }


}


?>