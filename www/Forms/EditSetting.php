<?php

namespace App\Forms;

use App\core\Validator;

class EditSetting extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updatesetting.php",
                "class" => "form",
                "id" => "form-edit-setting",
                "submit" => "Update",
                "cancel" => "Cancel"
            ],
            "inputs" => [
                "color" => [
                    "type" => "text",
                    "placeholder" => "Color",
                    "required" => true,
                    "id" => "input-color",
                    "class" => "input-text",
                    "error" => "Please enter a valid color"
                ],
                "font" => [
                    "type" => "text",
                    "placeholder" => "Font",
                    "required" => true,
                    "id" => "input-font",
                    "class" => "input-text",
                    "error" => "Please enter a valid font"
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