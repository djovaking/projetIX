<?php

use App\core\SessionManager;

$sessionManager = SessionManager::getInstance();
?>

<header>
    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/recipes">Recettes</a></li>
            <?php if ($sessionManager->getValue('role_id') == 1) : ?>
                <li><a href="/Backoffice">Backoffice</a></li>
            <?php endif; ?>
            <?php if ($sessionManager->isLoggedIn()) : ?>
                <li><a href="/deconnexion">Se deconnecter</a></li>
            <?php else : ?>
                <li><a href="/login">Se connecter</a></li>
                <li><a href="/s-inscrire">s'inscrire</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>