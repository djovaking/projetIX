<?php
namespace App\Forms;

use App\core\Validator;

class ReservationForm extends Validator {

    public $config = [];

    public $method = "POST";

    public function __construct()
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "class"=>"form",
                "id"=>"form-reservation",
                "submit"=>"Réserver",
                "cancel"=>"Annuler"
            ],
            "inputs"=>[
                "firstname"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre prénom",
                    "required"=>true,
                    "id"=>"input-firstname",
                    "class"=>"input-text",
                    "min"=>2,
                    "max"=>60,
                    "error"=>"Votre prénom doit faire entre 2 et 60 caractères"
                ], 
                "lastname"=>[
                    "type"=>"text",
                    "placeholder"=>"Votre nom",
                    "required"=>true,
                    "id"=>"input-lastname",
                    "class"=>"input-text",
                    "min"=>2,
                    "max"=>120,
                    "error"=>"Votre nom doit faire entre 2 et 120 caractères"
                ],
                "phone"=>[
                    "type"=>"tel",
                    "placeholder"=>"Votre numéro de téléphone",
                    "required"=>true,
                    "id"=>"input-phone",
                    "class"=>"input-text",
                    "pattern"=>"[0-9]{10}",
                    "error"=>"Votre numéro de téléphone est incorrect"
                ],
                "date"=>[
                    "type"=>"date",
                    "placeholder"=>"Indiquer une date",
                    "required"=>true,
                    "id"=>"input-date",
                    "class"=>"input-text",
                    "error" => "Veuillez entrer une date valide au format YYYY-MM-DD"
                ],
                "time"=>[
                    "type" => "text",
                    "placeholder" => "Indiquer un horaire",
                    "required" => true,
                    "id" => "input-time",
                    "class" => "input-text",
                    "pattern" => "(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]",
                    "error" => "Veuillez entrer une heure valide au format HH:MM"
                ],
                "nb_person" => [
                    "type" => "number",
                    "placeholder" => "Indiquer le nombre de personnes",
                    "required" => true,
                    "id" => "input-nb-personne",
                    "class" => "input-number",
                    "min" => 1,
                    "max" => 10,
                    "error" => "Veuillez entrer un nombre de personnes entre 1 et 10"
                ]
                ]
            ];

        parent::__construct();
    }

    public function getConfig(): array
    {
        return $this->config;
    }

}
