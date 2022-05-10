<?php
namespace Product\view\dash;

session_start();


if(!isset($_SESSION['user']))
{
    header('location:../start.php');
    exit;
}

require  __DIR__ .'/../vendor/autoload.php';
include 'templates/header.html.twig';


use Product\mod\docdata\documentdatabase;
use Product\mod\userdata\userdatabase;

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
    elseif($req == 'home')    
    {
        $dash->displayhomepage();
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

        $userdbobject = new userdatabase();
        $sqlquery = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $return = $userdbobject->retrieveAllUsers($sqlquery);

        echo $this->twig->render('userprofile.html.twig', ['arr' => $return] );
    }
    public function openuserlist()
    {
        $userdbobject = new userdatabase();
        $sqlquery = "SELECT * FROM users";
        $return = $userdbobject->retrieveAllUsers($sqlquery);

        echo $this->twig->render('userlist.html.twig', ['arr' => $return]);
    }
    public function opendocumentlist()
    {
        $docdbobject = new documentdatabase();
        $sqlquery = "SELECT * FROM documents";
        $return = $docdbobject->retrieveAllDocs($sqlquery);

        echo $this->twig->render('documentlist.html.twig', ['arr' => $return]);
    }
    public function displayhomepage()
    {
        $welcome = "hi";
        echo $this->twig->render('home.html.twig', ['arr' => $welcome]);
    }
}

?>



