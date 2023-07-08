<?php

namespace App\core;

class SessionManager
{
    private static $instance;

    private function __construct()
    {
        // Constructeur privé pour empêcher l'instanciation directe
    }
    // ici on check s'y a deja une session qui existe, sinon on la start
    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
            self::$instance->startSession();
        }

        return self::$instance;
    }

    private function startSession(): void
    {
        // Vérifier si la session n'est pas déjà démarrée
        if (session_status() === PHP_SESSION_NONE) {
            // Démarrer la session
            session_start();
        }
    }

    public function setSessionData(string $key, $value): void
    {
        // Définir une variable de session avec la clé et la valeur fournies
        $_SESSION[$key] = $value;
    }

    public function getSessionData(string $key, $default = null)
    {
        // Récupérer la valeur de la variable de session correspondant à la clé fournie
        // Si la clé n'existe pas, retourner la valeur par défaut spécifiée
        return $_SESSION[$key] ?? $default;
    }

    public function removeSessionData(string $key): void
    {
        // Supprimer la variable de session correspondant à la clé fournie
        unset($_SESSION[$key]);
    }

    public function isLoggedIn(): bool
    {
        // Vérifier si l'utilisateur est connecté en vérifiant la présence de la clé 'user_id' dans les variables de session
        return isset($_SESSION['user']);
    }
    public function getValue(string $key, $default = null)
    {
        // Récupérer la valeur de la variable de session correspondant à la clé fournie
        // Si la clé n'existe pas, retourner la valeur par défaut spécifiée
        return $this->getSessionData($key, $default);
    }
    public function logout(): void
    {
        // Destroy the session and remove all session data
        session_destroy();
        $_SESSION = [];
        unset($_SESSION);
    }
}
