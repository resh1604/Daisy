<?php
namespace Product\control\comactc;

use Product\mod\companydata\companydatabase;

require  __DIR__ .'/../vendor/autoload.php';

class companyactionscontroller
{
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'../../view/templates');
        $this->twig = new \Twig\Environment($this->loader);
    }
    public function callCompanyToUpdate($id)
    {
        $companydbobject = new companydatabase();
        $sqlquery = "SELECT * FROM company WHERE cid = '$id'";
        $return = $companydbobject->retrieveAllCompanies($sqlquery);

        echo $this->twig->render('updatecompany.html.twig', ['arr' => $return] );
    }

    public function updatecompany($cid, $cname, $ccity, $cemp)
    {
        $companydbobject = new companydatabase();
        $sqlQuery = "UPDATE company SET cname = '$cname', ccity = '$ccity', cemp = '$cemp' WHERE cid = '$cid' ";
        $companydbobject->updateCompany($sqlQuery);

        header('location: ../view/dashboard.php?request=companies');
        exit;
    }
    public function displaycompanyprofile($id)
    {
        $companydbobject = new companydatabase();
        $sqlquery = "SELECT * FROM company WHERE cid = '$id'";
        $return = $companydbobject->retrieveAllCompanies($sqlquery);

        echo $this->twig->render('companyprofile.html.twig', ['arr' => $return] );
    }

    
}



?>