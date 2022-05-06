<?php
namespace Product\start;

require 'vendor/autoload.php';
use Product\control\actc\actionscontroller;

$actobj = new actionscontroller();
$actobj->displayloginform();




?>