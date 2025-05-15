<?php
require '../config/db.php';

class Flashcards {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createFlashcard($user_id, $subject, $question, $answer) {
        $stmt = $this->pdo->prepare("INSERT INTO flashcards (user_id, subject, question, answer) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$user_id, $subject, $question, $answer]);
    }

    public function getFlashcards($user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM flashcards WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function deleteFlashcard($flashcard_id, $user_id) {
        $stmt = $this->pdo->prepare("DELETE FROM flashcards WHERE id = ? AND user_id = ?");
        return $stmt->execute([$flashcard_id, $user_id]);
    }
}
?>