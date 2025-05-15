<?php
session_start();
require '../config/db.php';
require '../models/Flashcards.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flashcard_id'])) {
    $flashcardsModel = new Flashcards($pdo);
    if ($flashcardsModel->deleteFlashcard($_POST['flashcard_id'], $_SESSION['user_id'])) {
        header("Location: ../views/flashcards.php");
        exit;
    } else {
        echo "Error deleting flashcard.";
    }
}
?>