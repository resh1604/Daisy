<?php
namespace Product\control\docactc;

use Product\mod\docdata\documentdatabase;

require  __DIR__ .'/../vendor/autoload.php';

class documentactionscontroller
{
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'../../view/templates');
        $this->twig = new \Twig\Environment($this->loader);
    }

    public function uploadDocument($filepath)
    {
        $docdbobject = new documentdatabase();
        $sqlQuery = "INSERT INTO documents(docname) VALUES ('$filepath')";
        $return = $docdbobject->insertDoc($sqlQuery);

        header('location:  ../view/dashboard.php?request=documents');
        exit;
    }

    public function callDocToUpdate($id)
    {
        $docdbobject = new documentdatabase();
        $sqlquery = "SELECT * FROM documents WHERE docid = '$id'";
        $return = $docdbobject->retrieveAllDocs($sqlquery);

        echo $this->twig->render('updatedoc.html.twig', ['arr' => $return] );
    }

    public function updateDocument($docid, $docname)
    {
        $docdbobject = new documentdatabase();
        $sqlQuery = "UPDATE documents SET docname = '$docname' WHERE docid = '$docid' ";
        $docdbobject->updateDoc($sqlQuery);

        header('location: ../view/dashboard.php?request=documents');
        exit;
    }
    public function callDocToDelete($id)
    {
        $docdbobject = new documentdatabase();
        $sqlquery = "DELETE FROM documents WHERE docid = '$id'";
        $return = $docdbobject->deleleDoc($sqlquery);

        header('location: ../view/dashboard.php?request=documents');
        exit;
    }
}


?>