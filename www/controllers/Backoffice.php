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
        $roleID = $sessionManager->getSessionData('user_role');

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
        $users = $db->getAll('fp_users');
        // Pass the user data to the view
        $view = new View("backoffice/users", "back");
        $view->assign('users', $users);
    }

    public function manageReservations()
    {
        // Create an instance of the ConnectDB class
        $db = new ConnectDB();

        // Get all users from the "esgi_user" table
        $reservation = $db->getAll('fp_reservation');
        // Pass the user data to the view
        $view = new View("backoffice/reservations", "back");
        $view->assign('reservations', $reservation);
    }

    public function editUser($id)
    {
        // Récupérer l'utilisateur par son ID depuis la base de données
        $user = $db->getById('fp_users', $id);

        // Afficher le formulaire d'édition avec les données de l'utilisateur
        $view = new View("backoffice/edit-user", "back");
        $view->assign('user', $user);
    }

    public function updateUser($id)
    {
        // Récupérer les données du formulaire d'édition
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        // ... récupérez les autres données du formulaire

        // Mettre à jour l'utilisateur correspondant dans la base de données
        $user = User::getById($id);

        if ($user) {
            // Mettre à jour les propriétés de l'utilisateur
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            // ... mettez à jour les autres propriétés

            // Appeler la méthode de mise à jour de l'utilisateur
            $user->update();

            // Rediriger ou afficher un message de succès
            // Par exemple, rediriger vers la liste des utilisateurs
            header("Location: /admin/users");
            exit();
        } else {
            // Gérer le cas où l'utilisateur n'existe pas, par exemple afficher un message d'erreur ou rediriger vers une page appropriée
        }
    }


    public function deleteUser($id)
    {
        // Supprimer l'utilisateur correspondant de la base de données
        // Rediriger ou afficher un message de succès
    }

    public function editReservation()
    {
        $view = new View("backoffice/editReservation", 'back');
    }


    

    /*public function updateReservation($id)
    {
        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Récupérer les données du formulaire d'édition
        $status = $_POST['status'];
        // ... récupérez les autres données du formulaire

        // Mettre à jour la réservation correspondante dans la base de données
        $reservation = $db->getById('fp_reservation', $id);

        if ($reservation) {
            // Mettre à jour les propriétés de la réservation
            $reservation['status'] = $status;
            // ... mettez à jour les autres propriétés

            // Mettre à jour la réservation dans la base de données
            $db->update('fp_reservation', $id, $reservation);

            // Rediriger ou afficher un message de succès
            // Par exemple, rediriger vers la liste des réservations
            header("Location: /admin/reservations");
            exit();
        } else {
            // Gérer le cas où la réservation n'existe pas, par exemple afficher un message d'erreur ou rediriger vers une page appropriée
            echo "Reservation not found.";
        }
    }


    public function deleteReservation($id)
    {
        // Create an instance of the ConnectDB class
        $db = new ConnectDB();

        // Supprimer la réservation correspondante de la base de données
        $db->delete('fp_reservation', $id);

        // Rediriger ou afficher un message de succès
        // Par exemple, rediriger vers la liste des réservations
        header("Location: /admin/reservations");
        exit();
    }*/
}

