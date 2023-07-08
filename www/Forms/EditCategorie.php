<?php

namespace App\Forms;

use App\core\Validator;

class EditCategorie extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updatecategorie.php",
                "class" => "form",
                "id" => "form-edit-categorie",
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
                    "error" => "Please enter a valid name"
                ],
            ]
        ];

        parent::__construct();
    }

    public static function getInstance(): EditCategorie
    {
        if (!self::$instance) {
            self::$instance = new EditCategorie();
        }

        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}