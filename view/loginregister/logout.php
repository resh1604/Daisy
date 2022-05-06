<?php
require  __DIR__ .'/../../vendor/autoload.php';
use Product\control\actc\actionscontroller;


$actionobj = new actionscontroller();
$actionobj->logout();
exit;


?>