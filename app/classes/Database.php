<?php 
namespace App\classes;

class Database{
    public function __construct()
    {
        $this->connect();
    }

    public static function  connect():\mysqli
    {
        $host       = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "tasnim";
        return new \mysqli($host, $username, $password, $dbname);
    }

}