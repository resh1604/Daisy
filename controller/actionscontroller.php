<?php
namespace Product\control\actc;


require  __DIR__ .'/../vendor/autoload.php';
use Product\mod\data\database;

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
        $email = mysqli_real_escape_string($dbobject->getConn(),$em);
        $password = mysqli_real_escape_string($dbobject->getConn(),$pass); 
        
        $sqlquery = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $return = $dbobject->selectQueryWithRow($sqlquery);
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
        $dbobject = new database();
        $sqlQuery = "INSERT INTO users (name, email, password, company, contact) VALUES ('$nm','$em', '$pass', '$com', '$cont' )";
        $return = $dbobject->InsertQuery($sqlQuery);

        session_start();
        $_SESSION['user']=[
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'company'=>$_POST['company'],
            'contact'=>$_POST['contact'],
        ];

        header('location:  ../view/dashboard.php');
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('location:../../start.php');
    }

    public function callUserToUpdate($id)
    {
        $dbobject = new database();
        $sqlquery = "SELECT * FROM users WHERE userno = '$id'";
        $return = $dbobject->selectQueryWithRows($sqlquery);

        echo $this->twig->render('updateuser.html.twig', ['arr' => $return] );
    }

    public function updateruser($un, $nm, $em, $pass, $com, $cont)
    {
        $dbobject = new database();
        $sqlQuery = "UPDATE users SET name = '$nm', email = '$em', password = '$pass', company = '$com', contact = '$cont' WHERE userno = '$un' ";
        $dbobject->updateQuery($sqlQuery);

        header('location: ../view/dashboard.php?request=users');
        exit;
    }

    public function callUserToDelete($id)
    {
        $dbobject = new database();
        $sqlquery = "DELETE FROM users WHERE userno = '$id'";
        $return = $dbobject->DeleteQueryWithUserNo($sqlquery);

        header('location: ../view/dashboard.php?request=users');
        exit;
    }

    public function uploadDocument($filepath)
    {
        $dbobject = new database();
        $sqlQuery = "INSERT INTO documents(docname) VALUES ('$filepath')";
        $return = $dbobject->InsertQuery($sqlQuery);

        header('location:  ../view/dashboard.php?request=documents');
        exit;
    }

    public function callDocToUpdate($id)
    {
        $dbobject = new database();
        $sqlquery = "SELECT * FROM documents WHERE docid = '$id'";
        $return = $dbobject->selectQueryWithRows($sqlquery);
       
        echo $this->twig->render('updatedoc.html.twig', ['arr' => $return] );
    }

    public function updateDocument($docid, $docname)
    {
        $dbobject = new database();
        $sqlQuery = "UPDATE documents SET docname = '$docname' WHERE docid = '$docid' ";
        $dbobject->updateQuery($sqlQuery);

        header('location: ../view/dashboard.php?request=documents');
        exit;
    }
    public function callDocToDelete($id)
    {
        $dbobject = new database();
        $sqlquery = "DELETE FROM documents WHERE docid = '$id'";
        $return = $dbobject->DeleteQueryWithUserNo($sqlquery);

        header('location: ../view/dashboard.php?request=documents');
        exit;
    }
}

?>
