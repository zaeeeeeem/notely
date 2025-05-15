<?php
session_start();
require '../config/db.php';
require '../models/Notes.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['note_id'])) {
    $notesModel = new Notes($pdo);
    if ($notesModel->deleteNote($_POST['note_id'], $_SESSION['user_id'])) {
        header("Location: ../views/notes.php");
        exit;
    } else {
        echo "Error deleting note.";
    }
}
?>