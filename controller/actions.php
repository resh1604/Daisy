<?php
namespace Product\control\act;

require  __DIR__ .'/../vendor/autoload.php';
use Product\control\actc\actionscontroller;


$actionobj = new actionscontroller;

if(isset($_POST['loginsubmit'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $actionobj->login($email, $password);
}

if(isset($_POST['registersubmit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $company = $_POST['company'];
    $contact = $_POST['contact'];

    $actionobj->registeruser($name, $email, $password, $company, $contact);
}

if(isset($_GET['updateuserid']))
{  
    $id = $_GET['updateuserid'];
    $ob = new actionscontroller();
    $ob->callUserToUpdate($id);
}

if(isset($_POST['updateusersubmit'])) 
{
    $userno = $_POST['userno'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $company = $_POST['company'];
    $contact = $_POST['contact'];

    $actionobj->updateruser($userno, $name, $email, $password, $company, $contact);
}


if(isset($_GET['deleteuserid']))
{  
    $id = $_GET['deleteuserid'];
    $ob = new actionscontroller();
    $ob->callUserToDelete($id);
}

if(isset($_POST['documentsubmit']))
{  
    $filename = $_FILES['file']['name'];
    $tmpfilename = $_FILES['file']['tmp_name'];
    $filepath = "../view/uploads/" . $filename;

    $actionobj->uploadDocument($filepath);
    
}

if(isset($_GET['updatedocid']))
{  
    $id = $_GET['updatedocid'];
    // echo $id;
    $ob = new actionscontroller();
    $ob->callDocToUpdate($id);
}

if(isset($_POST['newdocumentsubmit']))
{  
    $docid =  $_POST['docid'];
    $filename = $_FILES['newfile']['name'];
    $tmpfilename = $_FILES['newfile']['tmp_name'];
    $filepath = "../view/uploads/" . $filename;

    $actionobj->updateDocument($docid,$filepath);   
}

if(isset($_GET['deletedocid']))
{  
    $id = $_GET['deletedocid'];
    $ob = new actionscontroller();
    $ob->callDocToDelete($id);
}



?>
