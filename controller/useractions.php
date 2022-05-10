<?php
namespace Product\control\useract;


require  __DIR__ .'/../vendor/autoload.php';
use Product\control\useractc\useractionscontroller;

$useractionsobj = new useractionscontroller();



if(isset($_GET['updateuserid']))
{  
    $id = $_GET['updateuserid'];
    //$ob = new actionscontroller();
    $useractionsobj->callUserToUpdate($id);
}

if(isset($_POST['updateusersubmit'])) 
{
    $userno = $_POST['userno'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $company = $_POST['company'];
    $contact = $_POST['contact'];

    $useractionsobj->updateruser($userno, $name, $email, $password, $company, $contact);
}


if(isset($_GET['deleteuserid']))
{  
    $id = $_GET['deleteuserid'];
    //$ob = new actionscontroller();
    $useractionsobj->callUserToDelete($id);
}

?>