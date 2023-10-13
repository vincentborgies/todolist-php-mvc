<?php
class TaskController {
    private $taskModel;

    public function __construct($taskModel) {
        $this->taskModel = $taskModel;
    }

    public function index() {
        // Récupérer la liste de toutes les tâches
        $tasks = $this->taskModel->getAllTasks();

        // Afficher la liste de tâches en utilisant une vue
        include 'app/views/task-list.php';
    }

    public function create() {
        // Afficher le formulaire d'ajout de tâche
        include 'app/views/task-create.php';
    }

    public function store() {
        // Récupérer les données du formulaire d'ajout
        $taskName = $_POST['task_name'];
        $taskDescription = $_POST['task_description'];

        // Ajouter la nouvelle tâche
        $this->taskModel->addTask($taskName, $taskDescription);

        // Rediriger vers la liste de tâches
        header('Location: index.php?action=index');
    }

    public function edit($id) {
        // Récupérer la tâche par son ID
        $task = $this->taskModel->getTaskById($id);

        // Afficher le formulaire de modification de tâche avec les données de la tâche
        include 'app/views/task-edit.php';
    }

    public function update($id) {
        // Récupérer les données du formulaire de modification
        $taskName = $_POST['task_name'];
        $taskDescription = $_POST['task_description'];

        // Mettre à jour la tâche
        $this->taskModel->updateTask($id, $taskName, $taskDescription);

        // Rediriger vers la liste de tâches
        header('Location: index.php?action=index');
    }

    public function delete($id) {
        // Supprimer la tâche par son ID
        $this->taskModel->deleteTask($id);

        // Rediriger vers la liste de tâches
        header('Location: index.php?action=index');
    }
}

?>
