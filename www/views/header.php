<?php

use App\core\SessionManager;

$sessionManager = SessionManager::getInstance();

?>

<header>
    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/contact">Contact</a></li>
            <?php $user = $sessionManager->getValue('user'); ?>
            <?php if ($user && $user['user_role'] == 'admin') : ?>
                <li><a href="/admin">Backoffice</a></li>
            <?php endif; ?>
            <?php if ($sessionManager->isLoggedIn()) : ?>
                <li><a href="/deconnexion">Se déconnecter</a></li>
            <?php else : ?>
                <li><a href="/login">Se connecter</a></li>
                <li><a href="/s-inscrire">S'inscrire</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
