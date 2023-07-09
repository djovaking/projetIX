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

    public function reservation()
    {   
        $form = new ReservationForm();
        if($form->isSubmited() && $form->isValid()){
            //Create a new Reservation object
            $reservation = new Reservation();
            //Set the reservation object's properties with form data
            $reservation->setFirstName($_POST['firstname']);
            $reservation->setLastName($_POST['lastname']);
            $reservation->setPhone($_POST['phone']);
            $reservation->setDate($_POST['date']);
            $reservation->setTime($_POST['time']);
            $reservation->setnb_person($_POST['nb_person']);
            
            // Call the save() method to save the reservation object into the database
            $reservation->save();
            echo "OK";
        }
       
        $view = new View("main/reservation", "front");
        $view->assign('form', $form->getConfig());
        $view->assign('formErrors', $form->listOfErrors);
    }
}
