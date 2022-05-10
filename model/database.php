<?php
namespace Product\mod\data;


class database
{
    public function __construct()
    {
        $dbhost = "localhost";
        $dbname = "jasmine";
        $dbusername = "root";
        $dbpassword = "";

        $this->conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
        if ($this->conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
    }

    
    public function getConn(){
        return $this->conn;
    }
   
}
