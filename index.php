<?php
// Inclure les fichiers nécessaires
require 'config/database.php'; // Configurez votre connexion PDO ici
require 'app/models/Task.php';
require 'app/controllers/TaskController.php';

// Créer une instance de la base de données
$model = new Task($pdo);
$controller = new TaskController($model);

// Déterminer l'action à effectuer en fonction de l'URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// En fonction de l'action, appeler la méthode appropriée du contrôleur
switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'add':
        $controller->addTask();
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $taskId = $_GET['id'];
            $controller->deleteTask($taskId);
        }
        break;
    default:
        $controller->index();
        break;
}
