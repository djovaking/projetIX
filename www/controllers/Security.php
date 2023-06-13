<?php

namespace App\controllers;

use App\core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\models\User;
use App\core\SessionManager;

final class Security
{
    public function login()
    {
        $form = new Login();
        if ($form->isSubmited() && $form->isValid()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::getByEmail($email);

            if ($user && password_verify($password, $user->getPwd())) {
                // Authentication successful
                echo "Connexion réussie";
                // Stocker l'ID de l'utilisateur dans la session
                $sessionManager = SessionManager::getInstance();
                $sessionManager->setSessionData('user_id', $user->getId());
                $sessionManager->setSessionData('user_name', $user->getFirstname());
                $sessionManager->setSessionData('role_id', $user->getRoleId());

                // Rediriger l'utilisateur vers la page d'accueil ou une autre page sécurisée
                header('Location: /');
                exit;
            } else {
                // Authentication failed
                echo "Connexion echouée";
            }
        }

        $view = new View("security/login", "account");
        $view->assign('form', $form->getConfig());
        $view->assign('formErrors', $form->listOfErrors);
    }



    public function register()
    {
        $form = new Register();
        if ($form->isSubmited() && $form->isValid()) {
            // Create a new User object
            $user = new User();

            // Set the user object's properties with form data
            $user->setFirstName($_POST['firstname']);
            $user->setLastName($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPwd($_POST['password']);

            // Call the save() method to save the user object into the database
            $user->save();
            echo "OK";
        }

        $view = new View("security/register", "account");
        $view->assign('form', $form->getConfig());
        $view->assign('formErrors', $form->listOfErrors);
    }



    public function logout()
    {
        // delete les variables de session
        $sessionManager = SessionManager::getInstance();
        $sessionManager->removeSessionData('user_id');
        $sessionManager->removeSessionData('user_name');

        // on redirige vers la page de co comme le user est log out
        header('Location: /login');
        exit;
    }
}
