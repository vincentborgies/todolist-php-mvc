<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Tâche</title>
</head>
<body>
    <h1>Ajouter une Tâche</h1>

    <form method="post" action="index.php?action=store">
        <label for="task_name">Nom de la tâche:</label>
        <input type="text" name="task_name" id="task_name" required><br>

        <label for="task_description">Description:</label>
        <textarea name="task_description" id="task_description" required></textarea><br>

        <button type="submit">Ajouter</button>
    </form>

    <a href="index.php?action=index">Retour à la liste des tâches</a>

</body>
</html>
