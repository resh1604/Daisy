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

if(isset($_GET['userrequest']))
{  
    $req = $_GET['userrequest'];
    if($req == 'update')    
    {
        echo "hi";
    }  
    elseif($req == 'delete')    
    {
       echo "hello";
    }  
}

?>
