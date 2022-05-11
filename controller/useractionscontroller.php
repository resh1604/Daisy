<?php
namespace Product\control\useractc;

use Product\mod\userdata\userdatabase;

require  __DIR__ .'/../vendor/autoload.php';

class useractionscontroller
{
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'../../view/templates');
        $this->twig = new \Twig\Environment($this->loader);
    }
    public function callUserToUpdate($id)
    {
        $userdbobject = new userdatabase();
        $sqlquery = "SELECT * FROM users WHERE userno = '$id'";
        $return = $userdbobject->retrieveAllUsers($sqlquery);

        echo $this->twig->render('updateuser.html.twig', ['arr' => $return] );
    }

    public function updateruser($un, $nm, $em, $pass, $com, $cont)
    {
        $userdbobject = new userdatabase();
        $sqlQuery = "UPDATE users SET uname = '$nm', uemail = '$em', upassword = '$pass', cid = '$com', ucontact = '$cont' WHERE userno = '$un' ";
        $userdbobject->updateUser($sqlQuery);

        header('location: ../view/dashboard.php?request=users');
        exit;
    }

    public function callUserToDelete($id)
    {
        $userdbobject = new userdatabase();
        $sqlquery = "DELETE FROM users WHERE userno = '$id'";
        $return = $userdbobject->deleteUser($sqlquery);

        header('location: ../view/dashboard.php?request=users');
        exit;
    }
    public function getuserno()
    {
        $email = $_SESSION['user']['email'];
        $password = $_SESSION['user']['password'];

        $userdbobject = new userdatabase();
        $sqlquery = "SELECT * FROM users WHERE uemail = '$email' and upassword = '$password'";
        return $userdbobject->retrieveAllUsers($sqlquery);

    }
}



?>