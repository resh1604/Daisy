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
        $sqlQuery = "UPDATE users SET name = '$nm', email = '$em', password = '$pass', company = '$com', contact = '$cont' WHERE userno = '$un' ";
        $userdbobject->updateUser($sqlQuery);

        header('location: ../view/dashboard.php?request=users');
        exit;
    }

    public function callUserToDelete($id)
    {
        $userdbobject = new userdatabase();
        $sqlquery = "DELETE FROM users WHERE userno = '$id'";
        $return = $userdbobject->deleleUser($sqlquery);

        header('location: ../view/dashboard.php?request=users');
        exit;
    }
}



?>