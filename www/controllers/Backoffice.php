<?php

namespace App\controllers;

use App\core\View;
use App\core\SessionManager;
use App\core\ConnectDB;
use App\models\User;

final class Backoffice
{
    public function index()
    {
        // 
        $sessionManager = SessionManager::getInstance();



        $view = new View("backoffice/home", "back");
        //
    }
    public function manageUsers()
    {

        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Validate the user data and perform necessary sanitization

        // Get all users from the "fp_user" table
        $users = $db->getAll('fp_user');

        // Pass the user data to the view
        $view = new View("backoffice/users", "back");
        $view->assign('users', $users);
    }
    public function editUser()
    {
        $view = new View("backoffice/editUser", 'back');
    }
    public function updateUser()
    {

        foreach ($_POST as $key => $value) {

            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }

        // Extract the user ID from the form data
        $userId = $_POST['userId'];

        // Check if the user ID is provided
        if (isset($userId)) {
            // Create a new User object
            $user = new User();

            // Set the user object's properties with form data
            $user->setId($userId);
            $user->setFirstname($_POST['firstame']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setRole($_POST['role']);

            // Call the save() method to update the user object in the database
            $user->update();

            // Redirect to a success page or display a success message
            header("Location: users");
            exit;
        } else {
            // User ID not provided, handle the error or redirect to a different page
            die("User ID not provided");
        }
    }
    public function deleteuser()
    {
        $userId = $_POST['userId'];

        User::dropFKConstraint('fp_reservation', 'fp_user_id');
        User::deleteDatasInTheFKTable('fp_reservation','fp_user_id',$userId);

        User::dropFKConstraint('fp_page', 'fp_user_id');
        User::deleteDatasInTheFKTable('fp_page','fp_user_id',$userId);

        User::dropFKConstraint('fp_comment', 'fp_user_id');
        User::deleteDatasInTheFKTable('fp_comment','fp_user_id',$userId);

        User::deleteBy('id', $userId);

        User::restoreFKConstraint('fp_reservation','fp_user_id','fp_user_id','fp_user');
        User::restoreFKConstraint('fp_page','fp_user_id','fp_user_id','fp_user');
        User::restoreFKConstraint('fp_comment','fp_user_id','fp_user_id','fp_user');

        // Redirect 
        header("Location: users");
        exit;
    }
}
