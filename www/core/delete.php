<?php
// Inclusion de la classe ConnectDB

use App\core\ConnectDB;

require_once '../conf.inc.php';
require_once './ConnectDB.php';

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs du formulaire
    $tableName = $_POST['table'];
    $id = $_POST['id'];

    // Création de l'objet ConnectDB
    $connectDB = new ConnectDB();

    // Appel de la méthode delete pour supprimer l'enregistrement
    $affectedRows = $connectDB->delete($tableName, $id);

    // Vérification si l'enregistrement a été supprimé avec succès
    if ($affectedRows > 0) {
        echo "L'enregistrement a été supprimé avec succès.";
    } else {
        echo "La suppression de l'enregistrement a échoué.";
    }
}