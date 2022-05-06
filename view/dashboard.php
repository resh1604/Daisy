<?php

session_start();

require  __DIR__ .'/../vendor/autoload.php';
include 'templates/header.html.twig';

use Product\mod\data\database;

//include 'templates/home.html.twig';

$dash = new dashboard();

if(isset($_GET['request']))
{  
    $req = $_GET['request'];
    if($req == 'userprofile')    
    {
        $dash->displayuserprofile();
    }  
    elseif($req == 'users')    
    {
        $dash->openuserlist();
    }  
    elseif($req == 'documents')    
    {
        $dash->opendocumentlist();
    }
}


class dashboard
{
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/templates/');
        $this->twig = new \Twig\Environment($this->loader);
    }
    public function displayuserprofile()
    {
        $email = $_SESSION['user']['email'];
        $password = $_SESSION['user']['password'];

        $dbobject = new database();
        $sqlquery = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $return = $dbobject->selectQueryWithRows($sqlquery);

        echo $this->twig->render('userprofile.html.twig', ['arr' => $return] );
    }
    public function openuserlist()
    {
        $dbobject = new database();
        $sqlquery = "SELECT * FROM users";
        $return = $dbobject->selectQueryWithRows($sqlquery);

        echo $this->twig->render('userlist.html.twig', ['arr' => $return]);

    }
    public function opendocumentlist()
    {
        $dbobject = new database();
        $sqlquery = "SELECT * FROM documents";
        $return = $dbobject->selectQueryWithRows($sqlquery);

        echo $this->twig->render('documentlist.html.twig', ['arr' => $return]);

    }
}

?>



