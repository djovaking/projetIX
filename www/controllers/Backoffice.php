<?php

namespace App\controllers;

use App\core\View;
use App\core\SessionManager;
use App\core\ConnectDB;

final class Backoffice
{
    public function index()
    {
        // 
        $sessionManager = SessionManager::getInstance();
        $roleID = $sessionManager->getSessionData('role_id');

        if ($roleID !== 1) {
            echo "Access denied! You don't have permission to access the Back Office.";
            return;
        }

        $view = new View("backoffice/home", "back");
        //
    }
    public function manageUsers()
    {
        // Create an instance of the ConnectDB class
        $db = new ConnectDB();

        // Get all users from the "esgi_user" table
        $users = $db->getAll('esgi_user');
        // Pass the user data to the view
        $view = new View("backoffice/users", "back");
        $view->assign('users', $users);
    }
}
