<?php
namespace Product\start;

require 'vendor/autoload.php';
use Product\control\actc\actionscontroller;


if(isset($_SESSION['user']))
{
    header('location: ../view/dashboard.php?request=home');
    exit;
}
else
{
    $actobj = new actionscontroller();
    $actobj->displayloginform();
    
}

// $actobj = new actionscontroller();
// $actobj->displayloginform();

?>