<?php 
require_once ('Authentication.php');
class Authenticator{
    private $users;

    public function __construct()
    {
        $this->users = [];
    }

    public function register(User $user){
        $this->users[$user->getUsername()] = $user;
    }
}


?>