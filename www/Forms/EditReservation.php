<?php

namespace App\Forms;

use App\core\Validator;

class EditReservation extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updatereservation.php",
                "class" => "form",
                "id" => "form-edit-reservation",
                "submit" => "Update",
                "cancel" => "Cancel"
            ],
            "inputs" => [
                "date" => [
                    "type" => "text",
                    "placeholder" => "Date",
                    "required" => true,
                    "id" => "input-date",
                    "class" => "input-text",
                    "error" => "Please enter a valid date"
                ],
                "time" => [
                    "type" => "text",
                    "placeholder" => "Time",
                    "required" => true,
                    "id" => "input-time",
                    "class" => "input-text",
                    "error" => "Please enter a valid time"
                ],
                "nb_person" => [
                    "type" => "number",
                    "placeholder" => "Number of person",
                    "required" => true,
                    "id" => "input-nb_person",
                    "class" => "input-number",
                    "error" => "Please enter a valid number of person"
                ],
                "firstname" => [
                    "type" => "text",
                    "placeholder" => "Firstname",
                    "required" => true,
                    "id" => "input-firstname",
                    "class" => "input-text",
                    "error" => "Please enter a valid firstname"
                ],
                "lastname" => [
                    "type" => "text",
                    "placeholder" => "Lastname",
                    "required" => true,
                    "id" => "input-lastname",
                    "class" => "input-text",
                    "error" => "Please enter a valid lastname"
                ],
                "phone" => [
                    "type" => "text",
                    "placeholder" => "Phone",
                    "required" => true,
                    "id" => "input-phone",
                    "class" => "input-text",
                    "error" => "Please enter a valid phone number"
                ],
            ]
        ];

        parent::__construct();
    }

    public static function getInstance(): EditReservation
    {
        if (!self::$instance) {
            self::$instance = new EditReservation();
        }

        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}