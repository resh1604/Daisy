<?php
namespace Product\control\act;

require  __DIR__ .'/../vendor/autoload.php';
use Product\control\actc\actionscontroller;


$actionobj = new actionscontroller;

if(isset($_POST['loginsubmit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Hi";
    $actionobj->login($email, $password);
}

?>