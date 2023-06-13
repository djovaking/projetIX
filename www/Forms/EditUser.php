<?php

namespace App\Forms;

use App\core\Validator;

class EditUser extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updateuser.php",
                "class" => "form",
                "id" => "form-edit-user",
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
                "email" => [
                    "type" => "email",
                    "placeholder" => "Email",
                    "required" => true,
                    "id" => "input-email",
                    "class" => "input-text",
                    "error" => "Please enter a valid email address"
                ],
                "role" => [
                    "type" => "select",
                    "id" => "select-role",
                    "class" => "select",
                    "options" => [
                        "admin" => "Admin",
                        "user" => "User"
                    ]
                ]
            ]
        ];

        parent::__construct();
    }

    public static function getInstance(): EditUser
    {
        if (!self::$instance) {
            self::$instance = new EditUser();
        }

        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}
