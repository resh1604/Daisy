<?php
namespace Product\control\actc;


require  __DIR__ .'/../vendor/autoload.php';
use Product\mod\data\database;
use Product\mod\docdata\documentdatabase;
use Product\mod\userdata\userdatabase;

class actionscontroller
{
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'../../view/templates');
        $this->twig = new \Twig\Environment($this->loader);
    }

    public function login($em, $pass)
    {
        $dbobject = new database();
        $userdbobject = new userdatabase();

        $email = mysqli_real_escape_string($dbobject->getConn(),$em);
        $password = mysqli_real_escape_string($dbobject->getConn(),$pass); 
        
        $sqlquery = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $return = $userdbobject->retrieveOneUser($sqlquery);
        // echo "<pre>";
        // print_r($return);
        if($return == 0)
        {
            echo "Error in Login";
        }
        else
        {           
            session_start();
            $_SESSION['user']=[
                'email'=>$email,
                'password'=>$password
            ];
            header('location: ../view/dashboard.php?request=home');
            exit;
        }
    }

    public function displayloginform()
    {
        $welcome = "welcome";
        echo $this->twig->render('loginform.html.twig', ['arr' => $welcome] );
    }

    public function registeruser($nm, $em, $pass, $com, $cont)
    {
        $userdbobject = new userdatabase();
        $sqlQuery = "INSERT INTO users (name, email, password, company, contact) VALUES ('$nm','$em', '$pass', '$com', '$cont' )";
        $return = $userdbobject->insertUser($sqlQuery);

        session_start();
        $_SESSION['user']=[
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'company'=>$_POST['company'],
            'contact'=>$_POST['contact'],
        ];

        header('location:  ../view/dashboard.php?request=home');
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('location:../../start.php');
    }

    

    
}

?>
