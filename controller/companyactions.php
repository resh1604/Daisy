<?php
namespace Product\control\comact;


require  __DIR__ .'/../vendor/autoload.php';

use Product\control\comactc\companyactionscontroller;


$companyactionsobj = new companyactionscontroller();



if(isset($_GET['updatecid']))
{  
    $id = $_GET['updatecid'];
    $companyactionsobj->callCompanyToUpdate($id);
}

if(isset($_POST['updatecompanysubmit'])) 
{
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $ccity = $_POST['ccity'];
    $cemp = $_POST['cemp'];

    $companyactionsobj->updatecompany($cid, $cname, $ccity, $cemp);
}

if(isset($_GET['loadcid']))
{  
    $id = $_GET['loadcid'];    
    $companyactionsobj->displaycompanyprofile($id);
}


?>