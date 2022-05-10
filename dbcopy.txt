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

    public function selectQueryWithRows($sqlQuery)
    {
        $data = [];
        $sql  = $sqlQuery;
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return [];
        }
    }
    public function selectQueryWithRow($sqlQuery)  
    {
        $data = [];
        $sql  = $sqlQuery;
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row =  mysqli_fetch_assoc($result);
            return $row;
        } else {
            return 0;
        }
    }
    public function DeleteQueryWithUserNo(string $sqlQuery) : bool
    {
        $sql = $sqlQuery;
        if(mysqli_query($this->conn,$sql)){
            return true;
        }else {
            return false;
        }
    }
    public function InsertQuery($sqlQuery)
    {
        $sql = $sqlQuery;
        mysqli_query($this->conn,$sql);
    }
    public function getConn(){
        return $this->conn;
    }
    public function updateQuery($sqlQuery)
    {
        $sql = $sqlQuery;
        mysqli_query($this->conn,$sql);
    }
}
