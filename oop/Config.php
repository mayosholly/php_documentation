<?php
class Config {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "php_class";

    protected function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $conn;
    }
}
?>
