<?php

// Définition des paramètres de connexion à la base de données
$db_host = 'localhost';        // L'adresse du serveur de base de données
$db_name = 'todolist';          // Le nom de la base de données
$db_user = 'root'; // Le nom d'utilisateur de la base de données
$db_password = ''; // Le mot de passe de la base de données

try {
    // Création d'une nouvelle instance de la classe PDO pour établir une connexion à la base de données
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);

    // Configuration de PDO pour générer des exceptions en cas d'erreurs SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'échec de la connexion, afficher un message d'erreur et arrêter le script
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>