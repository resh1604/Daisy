<?php
namespace Product\control\docact;


require  __DIR__ .'/../vendor/autoload.php';
use Product\control\docactc\documentactionscontroller;

$docactionobj = new documentactionscontroller();

if(isset($_POST['documentsubmit']))
{  
    $id = $_POST['uid'];
    $filename = $_FILES['file']['name'];
    $tmpfilename = $_FILES['file']['tmp_name'];
    $filepath = "../view/uploads/" . $filename;

    $docactionobj->uploadDocument($filepath,$id);
    
}

if(isset($_GET['updatedocid']))
{  
    $id = $_GET['updatedocid'];
    // echo $id;
    //$ob = new actionscontroller();
    $docactionobj->callDocToUpdate($id);
}

if(isset($_POST['newdocumentsubmit']))
{  
    $docid =  $_POST['docid'];
    $filename = $_FILES['newfile']['name'];
    $tmpfilename = $_FILES['newfile']['tmp_name'];
    $filepath = "../view/uploads/" . $filename;

    $docactionobj->updateDocument($docid,$filepath);   
}

if(isset($_GET['deletedocid']))
{  
    $id = $_GET['deletedocid'];
    //$ob = new actionscontroller();
    $docactionobj->callDocToDelete($id);
}

if(isset($_GET['userno']))
{  
    $id = $_GET['userno'];
    $docactionobj->loaduploadDocumentPage($id);
}
?>