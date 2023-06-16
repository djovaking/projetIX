<?php

namespace App\controllers;

use App\core\ConnectDB;
use App\core\View;
use App\core\SessionManager;

final class Front
{


    public function home()
    {
        $sessionManager = SessionManager::getInstance();
        if (null !== $sessionManager->getValue('user_id')) {
            $userName = $sessionManager->getValue('user_name');
            $bienvenue = "<h2> Bonjour $userName</h2>";
        } else {
            $bienvenue = "Souhaitez-vous vous connecter?";
        }


        $view = new View("main/homepage", "front");
        $view->assign("message",  $bienvenue);
        $view->assign("header", "header.php");
    }

    public function displayRecipes()
    {
        // Create an instance of the ConnectDB class
        $db = new ConnectDB();

        // Get all recipe from the "fp_recipe" table
        $recipes = $db->getAll('fp_recipe');

        // Pass the recipe data to the views

        $view = new View("recipe", "front");
        $view->assign('recipe', $recipes);
    }

    public function contact()
    {
        $view = new View("main/contact", "front");
    }
}
