<?php

namespace App\Forms;

use App\core\Validator;

class EditPage extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updatepage.php",
                "class" => "form",
                "id" => "form-edit-page",
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
                "active" => [
                    "type" => "checkbox",
                    "required" => true,
                    "id" => "checkbox",
                    "class" => "checkbox",
                ],
            ]
        ];

        parent::__construct();
    }

    public static function getInstance(): EditPage
    {
        if (!self::$instance) {
            self::$instance = new EditPage();
        }

        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}