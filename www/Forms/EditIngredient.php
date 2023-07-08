<?php

namespace App\Forms;

use App\core\Validator;

class EditIngredient extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updateingredient.php",
                "class" => "form",
                "id" => "form-edit-ingredient",
                "submit" => "Update",
                "cancel" => "Cancel"
            ],
            "inputs" => [
                "name" => [
                    "type" => "name",
                    "placeholder" => "Name",
                    "required" => true,
                    "id" => "input-name",
                    "class" => "input-text",
                    "error" => "Please enter a valid ingredient name"
                ],
            ]
        ];

        parent::__construct();
    }

    public static function getInstance(): EditIngredient
    {
        if (!self::$instance) {
            self::$instance = new EditIngredient();
        }

        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}