<?php

use App\core\SessionManager;

$sessionManager = SessionManager::getInstance();

?>

<header class="header">
    <nav>
        <div class="navbar">

            <div class="navbar-logo">
                <a href="/"><img src="../assets/images/logo.png" alt="Logo" class="header-logo"></a>
            </div>

            <div class="navbar-menu">
                <a href="/contact">Contact</a>

                <?php $user = $sessionManager->getValue('user'); ?>
                <?php if ($user && $user['user_role'] == 'admin') : ?>
                    <a href="/admin">Backoffice</a>
                <?php endif; ?>
                <?php if ($sessionManager->isLoggedIn()) : ?>
                    <a href="/deconnexion">Se déconnecter</a>
                <?php else : ?>
                    <a href="/login">Se connecter</a>
                    <a href="/s-inscrire">S'inscrire</a>
                <?php endif; ?>
            </div>
    </nav>
</header>