<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des tâches</title>
    <!-- Ajoutez ici les liens vers vos fichiers CSS, le cas échéant -->
</head>
<body>
    <h1>Liste des Tâches</h1>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task['task_name']); ?> -
                <?= htmlspecialchars($task['task_description']); ?>
                <a href="index.php?action=edit&id=<?= $task['id']; ?>">Modifier</a>
                <a href="index.php?action=delete&id=<?= $task['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="index.php?action=create">Ajouter une tâche</a>

    <!-- Ajoutez ici d'autres éléments HTML ou du contenu selon vos besoins -->
</body>
</html>
