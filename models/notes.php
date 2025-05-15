<?php
require '../config/db.php';

class Notes {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function uploadNote($user_id, $subject, $file_path) {
        $stmt = $this->pdo->prepare("INSERT INTO notes (user_id, subject, file_path) VALUES (?, ?, ?)");
        return $stmt->execute([$user_id, $subject, $file_path]);
    }

    public function getNotes($user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM notes WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function deleteNote($note_id, $user_id) {
        $stmt = $this->pdo->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
        return $stmt->execute([$note_id, $user_id]);
    }
}
?>