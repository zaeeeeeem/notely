<?php
session_start();
require '../config/db.php';
require '../models/Flashcards.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $flashcardsModel = new Flashcards($pdo);
    if ($flashcardsModel->createFlashcard($_SESSION['user_id'], $subject, $question, $answer)) {
        header("Location: ../views/flashcards.php");
        exit;
    } else {
        echo "Error saving flashcard.";
    }
}
?>