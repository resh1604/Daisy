<?php
namespace Product\mod\userdata;

use Product\mod\data\database;

class userdatabase
{
    public function retrieveAllUsers($sqlQuery)
    {
        $db = new database();

        $data = [];
        $sql  = $sqlQuery;
        $result = mysqli_query($db->getConn(), $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return [];
        }
    }

    public function retrieveOneUser($sqlQuery)  
    {
        $db = new database();

        $data = [];
        $sql  = $sqlQuery;
        $result = mysqli_query($db->getConn(), $sql);
        if (mysqli_num_rows($result) > 0) {
            $row =  mysqli_fetch_assoc($result);
            return $row;
        } else {
            return 0;
        }
    }

    public function deleteUser(string $sqlQuery) : bool
    {
        $db = new database();

        $sql = $sqlQuery;
        if(mysqli_query($db->getConn(),$sql)){
            return true;
        }else {
            return false;
        }
    }

    public function insertUser($sqlQuery)
    {
        $db = new database();

        $sql = $sqlQuery;
        mysqli_query($db->getConn(),$sql);
    }
    
    public function updateUser($sqlQuery)
    {
        $db = new database();

        $sql = $sqlQuery;
        mysqli_query($db->getConn(),$sql);
    }
}