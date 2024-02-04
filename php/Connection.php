<?php

class Connection
{
    private static $instance = null;
    private $conn;

    private $host = 'db';
    private $dbn = 'php-app';
    private $user = 'USER';
    private $pass = 'PASS';
    private function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbn", $this->user, $this->pass);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance ()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }


    public function getConnection()
    {
        return $this->conn;
    }

}
