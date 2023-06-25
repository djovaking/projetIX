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
                $sessionManager = SessionManager::getInstance();

                $user_info = [
                    'id' => $user->getId(),
                    'name' => $user->getFirstname(),
                    'lastname' => $user->getLastname(),
                    'email' => $user->getEmail(),
                    'user_role' => $user->getUserRole(),
                    'exp_date' => time() + 3600 // Replace with the actual expiration date
                ];

                $privateKey = '555555e$*d=s';
                $token = hash_hmac('sha256', json_encode($user_info), $privateKey);

                $sessionManager->setSessionData('user', $user_info);
                $sessionManager->setSessionData('token', $token);



                // Rediriger l'utilisateur vers la page d'accueil ou une autre page sécurisée
                //header('Location: /');
                //exit;
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
            // check if email is already registered in database
            $email = $_POST['email'];

            if (User::getByEmail($email)) {
                // Email already exists, display an error message to the user
                echo "Email already registered";
            } else {
                // Call the save() method to save the user object into the database
                $user->save();
                echo "OK";
            }
        }

        $view = new View("security/register", "account");
        $view->assign('form', $form->getConfig());
        $view->assign('formErrors', $form->listOfErrors);
    }

    public function register2()
    {
        $view = new View("security/register2", "account");
    }


    public function logout()
    {
        // delete les variables de session
        $sessionManager = SessionManager::getInstance();
        $sessionManager->logout();
        // on redirige vers la page de co comme le user est log out
        header('Location: /login');
        exit;
    }
}
