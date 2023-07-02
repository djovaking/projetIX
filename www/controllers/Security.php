<?php

namespace App\controllers;

require_once __DIR__ . '/../conf.inc.php';
require_once __DIR__ . '/../core/JWT.php';
require_once __DIR__ . '/../service/random_function.php';

use App\core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\models\User;
use App\core\SessionManager;
use JWT;

use function App\services\generateRandomString;

final class Security
{
    public function login()
    {
        $form = new Login();
        if ($form->isSubmited() && $form->isValid()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::getByEmail($email);

            if ($user && password_verify($password, $user->getPassword())) {
                // Authentication successful
                echo "Connexion réussie <br>";
                $sessionManager = SessionManager::getInstance();

                $payload = [
                    'user_id' => $user->getId(),
                    'firstname' => $user->getFirstname(),
                    'lastname' => $user->getLastname(),
                    'email' => $user->getEmail(),
                    'pseudo' => $user->getPseudo(),
                    'user_role' => $user->getUserRole(),
                    'identifier' => $user->getIdentifier(),
                    'status' => $user->getStatus(),
                    'fp_settings_id' => $user->getSettingId()
                ];

                // On crée le header
                $header = [
                    'typ' => 'JWT',
                    'alg' => 'HS256'
                ];

                // On crée le contenu (payload)
                $payload_test = [
                    'user_id' => 1,
                    'firstname' => 'Toto',
                    'lastname' => 'Test',
                    'email' => 'toto@test.fr',
                    'pseudo' => 'Toto1234',
                    'user_role' => 'admin',
                    'identifier' => '4df1617e-9366-48fc-98ff-51647c2e8d46',
                    'status' => 't',
                    'fp_settings_id' => 1
                ];

                $jwt = new JWT();

                $token = $jwt->generate($header, $payload, SECRET, 60);

                // Ajouter l'en-tête Authorization contenant le token
                header("Authorization: Bearer $token");

                // Rediriger l'utilisateur vers la page d'accueil ou une autre page sécurisée
                // header('Location: /');
                // exit;
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
            $user->setPassword($_POST['password']);
            $user->setIdentifier(generateRandomString(18)); //generate a 36 uuid characters in hexadecimal

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
