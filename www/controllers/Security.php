<?php

namespace App\controllers;

require_once __DIR__ . '/../conf.inc.php';
require_once __DIR__ . '/../core/JWT.php';
require_once __DIR__ . '/../services/random_function.php';


use JWT;
use App\core\View;
use App\core\Email;
use App\Forms\Login;
use App\models\User;
use App\core\ConnectDB;
use App\Forms\Register;

use App\core\SessionManager;
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

        $view = new View("security/register", "account");
        $view->assign('form', $form->getConfig());
        $view->assign('formErrors', $form->listOfErrors);


        if ($form->isSubmited() && $form->isValid()) {
            // Create a new User object
            $user = new User();

            // Set the user object's properties with form data
            $user->setFirstName($_POST['firstname']);
            $user->setLastName($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $email = $_POST['email'];
            $user->setIdentifier(generateRandomString(18)); //generate a 36 uuid characters in hexadecimal

            // $token = $user->setToken(generateRandomString(18));


            $token = generateRandomString(18);
            $user->setToken($token);


            // Verification
            if (User::getByEmail($email)) {
                echo "Email already registered";
            } else {
                echo "Email register";
                // echo $prenom;
                $user->save();

                $this->sendConfirmationEmail($token);
            }
        }
    }

    public function sendConfirmationEmail($tokenInput)
    {

        $prenom = $_POST["firstname"];
        $to = $_POST["email"];
        // $password = $_POST["password"];
        // echo ($email);

        $subject = "FoodPress - Confirmation d'inscription";

        $body = "Bonjour $prenom,\r\n
                Merci de valider votre inscription en cliquant sur le lien suivant:\r\n";

        $headers = "De: FoodPress@no-reply.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        $url = 'localhost/email-confirmation';
        // $token = generateRandomString(18);
        $token = $tokenInput;

        $mailData = array(
            'to' => $to,
            'body' => $body,
            'url' => $url,
            'token' => $token
        );

        $confirmationEmail = new Email($mailData);
        $confirmationEmail->sendEmail();

        $view = new View("security/email-waiting-validation", "account");
    }

    // ------- Dans controller ou dans une page directement? Pour ne pas qu'un utilisateur aille dans une la page avec ses petit doigts. Rajouter Err403 dans ce cas?
    public function confirmEmail()
    {
        if (isset($_GET['token'])) {
            // Get token form url
            $tokenEmail = $_GET['token'];

            // 
            //SELECT FROM table <user> form
            $db = ConnectDB::getInstance();

            $queryPrepared = $db->getPdo()->prepare("UPDATE fp_user SET status = TRUE WHERE token = :token");
            $queryPrepared->execute(array('token' => $tokenEmail));

            // $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table .
            // " SET " . implode(",", $sqlUpdate) .
            // " WHERE id=" . $this->getId());

            // SELECT token FROM user WHERE token  = :token

            // UPDATE utilisateurs SET status = TRUE WHERE token = :token

            // Affiche un message de confirmation à l'utilisateur
            echo "Votre compte a été confirmé avec succès !";
            var_dump("token : $tokenEmail");
        } else {
            // Le jeton de confirmation est manquant, afficher un message d'erreur ou rediriger l'utilisateur, par exemple.
            echo "Jeton de confirmation manquant. Veuillez vérifier le lien dans votre email.";
        }
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
