<?php
class Task {
    private $pdo; // Déclaration d'une propriété privée pour stocker l'instance PDO.

    // Constructeur de la classe, reçoit une instance PDO pour la connexion à la base de données.
    public function __construct($pdo) {
        $this->pdo = $pdo; // Assignation de l'instance PDO à la propriété $pdo.
    }

    // Méthode pour récupérer toutes les tâches depuis la table 'tasks'.
    public function getAllTasks() {
        try {
            $query = "SELECT * FROM tasks"; // Définition de la requête SQL.
            $stmt = $this->pdo->query($query); // Exécution de la requête SQL.
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupération des résultats sous forme de tableau associatif.
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des tâches : " . $e->getMessage()); // Gestion des erreurs.
        }
    }

    // Méthode pour récupérer une tâche par son ID.
    public function getTaskById($id) {
        try {
            $query = "SELECT * FROM tasks WHERE id = :id"; // Définition de la requête SQL avec un paramètre :id.
            $stmt = $this->pdo->prepare($query); // Préparation de la requête SQL.
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Liaison du paramètre :id avec la valeur $id.
            $stmt->execute(); // Exécution de la requête SQL.
            return $stmt->fetch(PDO::FETCH_ASSOC); // Récupération du résultat sous forme de tableau associatif.
        } catch (PDOException $e) {
            die("Erreur lors de la récupération de la tâche : " . $e->getMessage()); // Gestion des erreurs.
        }
    }

    // Méthode pour ajouter une nouvelle tâche dans la table 'tasks'.
    public function addTask($taskName, $taskDescription) {
        try {
            $query = "INSERT INTO tasks (task_name, task_description) VALUES (:task_name, :task_description)"; // Définition de la requête SQL avec des paramètres.
            $stmt = $this->pdo->prepare($query); // Préparation de la requête SQL.
            $stmt->bindParam(':task_name', $taskName, PDO::PARAM_STR); // Liaison du paramètre :task_name avec la valeur $taskName.
            $stmt->bindParam(':task_description', $taskDescription, PDO::PARAM_STR); // Liaison du paramètre :task_description avec la valeur $taskDescription.
            $stmt->execute(); // Exécution de la requête SQL.
            return true; // Retourne true si l'ajout est réussi.
        } catch (PDOException $e) {
            die("Erreur lors de l'ajout de la tâche : " . $e->getMessage()); // Gestion des erreurs.
        }
    }

    // Méthode pour mettre à jour une tâche dans la table 'tasks' par son ID.
    public function updateTask($id, $taskName, $taskDescription) {
        try {
            $query = "UPDATE tasks SET task_name = :task_name, task_description = :task_description WHERE id = :id"; // Définition de la requête SQL avec des paramètres.
            $stmt = $this->pdo->prepare($query); // Préparation de la requête SQL.
            $stmt->bindParam(':task_name', $taskName, PDO::PARAM_STR); // Liaison du paramètre :task_name avec la valeur $taskName.
            $stmt->bindParam(':task_description', $taskDescription, PDO::PARAM_STR); // Liaison du paramètre :task_description avec la valeur $taskDescription.
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Liaison du paramètre :id avec la valeur $id.
            $stmt->execute(); // Exécution de la requête SQL.
            return true; // Retourne true si la mise à jour est réussie.
        } catch (PDOException $e) {
            die("Erreur lors de la mise à jour de la tâche : " . $e->getMessage()); // Gestion des erreurs.
        }
    }

    // Méthode pour supprimer une tâche de la table 'tasks' par son ID.
    public function deleteTask($id) {
        try {
            $query = "DELETE FROM tasks WHERE id = :id"; // Définition de la requête SQL avec un paramètre :id.
            $stmt = $this->pdo->prepare($query); // Préparation de la requête SQL.
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Liaison du paramètre :id avec la valeur $id.
            $stmt->execute(); // Exécution de la requête SQL.
            return true; // Retourne true si la suppression est réussie.
        } catch (PDOException $e) {
            die("Erreur lors de la suppression de la tâche : " . $e->getMessage()); // Gestion des erreurs.
        }
    }
}

?>
