<?php
namespace Product\control\actc;

require  __DIR__ .'/../vendor/autoload.php';
use Product\mod\data\database;

class actionscontroller
{
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'../../view/loginregister');
        $this->twig = new \Twig\Environment($this->loader);

    }
    public function login($em, $pass)
    {
        $dbobject = new database();
        $email = mysqli_real_escape_string($dbobject->getConn(),$em);
        $password = mysqli_real_escape_string($dbobject->getConn(),$pass); 
        
        $sqlquery = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        
        
        $dbobject->selectQueryWithRow($sqlquery);
        // if(isset($return))
        // {
        //     session_start();
        //     $_SESSION['user']=[
        //         'email'=>$email,
        //         'password'=>$password
        //     ];
       
   
        header('location: test.php');
        exit;
    }

    public function displayloginform()
    {
        $welcome = "welcome";
        echo $this->twig->render('loginform.html.twig', ['arr' => $welcome] );
    }


}

?>