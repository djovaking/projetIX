<?php

namespace App\controllers;

use App\core\View;
use App\core\SessionManager;

final class Front
{


    public function home()
    {
        $sessionManager = SessionManager::getInstance();
        if (null !== $sessionManager->getValue('user')) {
            $userName = $sessionManager->getValue('user')['name'];
            $bienvenue = "<h2> Bonjour $userName</h2>";
        } else {
            $bienvenue = "Souhaitez vous vous connectez?";
        }


        $view = new View("main/homepage", "front");
        $view->assign("message",  $bienvenue);
        $view->assign("header", "header.php");
    }


    public function contact()
    {
        $view = new View("main/contact", "front");
    }
}
