<?php

namespace App\Forms;

use App\core\Validator;

class EditMedia extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updatemedia.php",
                "class" => "form",
                "id" => "form-edit-media",
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
                    "error" => "Please enter a valid media name"
                ],
                "description" => [
                    "type" => "text",
                    "placeholder" => "Description",
                    "required" => false,
                    "id" => "input-description",
                    "class" => "input-text",
                    "error" => "Please enter a valid description"
                ],
            ]
        ];

        parent::__construct();
    }

    public static function getInstance(): EditMedia
    {
        if (!self::$instance) {
            self::$instance = new EditMedia();
        }

        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}