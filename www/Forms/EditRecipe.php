<?php

namespace App\Forms;

use App\core\Validator;

class EditRecipe extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updaterecipe.php",
                "class" => "form",
                "id" => "form-edit-recipe",
                "submit" => "Update",
                "cancel" => "Cancel"
            ],
            "inputs" => [
                "name" => [
                    "type" => "text",
                    "placeholder" => "Name",
                    "required" => true,
                    "id" => "input-name",
                    "class" => "input-text",
                    "error" => "Please enter a valid name"
                ],
                "time_preparation" => [
                    "type" => "text",
                    "placeholder" => "Temps de prépration",
                    "required" => false,
                    "id" => "input-time",
                    "class" => "input-text",
                    "error" => "Please enter a valid time preparation"
                ],
                "difficulty" => [
                    "type" => "text",
                    "placeholder" => "Difficulté",
                    "required" => false,
                    "id" => "input-difficulty",
                    "class" => "input-text",
                    "error" => "Please enter a valid difficulty"
                ],
                "preparation" => [
                    "type" => "text",
                    "placeholder" => "Préparation",
                    "required" => false,
                    "id" => "input-preparation",
                    "class" => "input-text",
                    "error" => "Please enter a valid preparation text"
                ],
            ]
        ];

        parent::__construct();
    }

    public static function getInstance(): EditRecipe
    {
        if (!self::$instance) {
            self::$instance = new EditRecipe();
        }

        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}