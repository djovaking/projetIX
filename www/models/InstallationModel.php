<?php
class InstallationModel {
    private static $instance;

    private function __construct() {
        // ...
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new InstallationModel();
        }
        return self::$instance;
    }

    public function validateStepData($data) {
        // Validation des données de l'étape actuelle
    }

    public function saveStepData($data) {
        // Enregistrement des données de l'étape actuelle dans la base de données
    }
}
?>
