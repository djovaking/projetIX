<?php

namespace App\Forms;

use App\core\Validator;

class EditComment extends Validator
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "updatecomment.php",
                "class" => "form",
                "id" => "form-edit-comment",
                "submit" => "Update",
                "cancel" => "Cancel"
            ],
            "inputs" => [
                "text" => [
                    "type" => "text",
                    "placeholder" => "Comment",
                    "required" => true,
                    "id" => "input-comment",
                    "class" => "input-text",
                    "error" => "Please enter a valid comment"
                ],
            ]
        ];

        parent::__construct();
    }

    public static function getInstance(): EditComment
    {
        if (!self::$instance) {
            self::$instance = new EditComment();
        }

        return self::$instance;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}