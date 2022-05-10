<?php
namespace Product\mod\docdata;

use Product\mod\data\database;

class documentdatabase
{
    public function retrieveAllDocs($sqlQuery)
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
    public function retrieveOneDoc($sqlQuery)  
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
    public function deleleDoc(string $sqlQuery) : bool
    {
        $db = new database();

        $sql = $sqlQuery;
        if(mysqli_query($db->getConn(),$sql)){
            return true;
        }else {
            return false;
        }
    }
    public function insertDoc($sqlQuery)
    {
        $db = new database();

        $sql = $sqlQuery;
        mysqli_query($db->getConn(),$sql);
    }
    
    public function updateDoc($sqlQuery)
    {
        $db = new database();
        
        $sql = $sqlQuery;
        mysqli_query($db->getConn(),$sql);
    }
}