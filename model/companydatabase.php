<?php
namespace Product\mod\companydata;

use Product\mod\data\database;

class companydatabase
{
    public function retrieveAllCompanies($sqlQuery)
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
    public function updateCompany($sqlQuery)
    {
        $db = new database();

        $sql = $sqlQuery;
        mysqli_query($db->getConn(),$sql);
    }
    
}