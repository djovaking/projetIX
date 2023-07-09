<?php

class InstallationController {
    private static $instance;
    private $currentStep;

    private function __construct() {
        // ...
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new InstallationController();
        }
        return self::$instance;
    }

    public function setCurrentStep($step) {
        $this->currentStep = $step;
    }

    public function processStepData($data) {
        // Logique de traitement des données envoyées par l'utilisateur pour chaque étape
        // Utilisation du modèle (InstallationModel) pour valider et enregistrer les données
    }

    public function displayStep() {
        // Affichage de la vue appropriée pour l'étape actuelle
        // Utilisation de la vue (InstallationView) pour afficher l'interface utilisateur
    }
}
?>
