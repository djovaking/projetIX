<?php
namespace App\controllers;
use App\core\View;
use App\Forms\Register;
use App\models\User;

final class Security
{
    public function login()
    {
        $view = new View("security/login", "account");
    }

    public function register()
    {
        /*
        $user = User::populate(4);
        $user->setPwd("toto");
        $user->save();
        */
        $form = new Register();
        if($form->isSubmited() && $form->isValid()){
            //insertion en bdd
            echo "OK";
        }



        $view = new View("security/register", "account");
        $view->assign('form', $form->getConfig());
        $view->assign('formErrors', $form->listOfErrors);
    }

    public function logout()
    {
        die("logout");
    }
}