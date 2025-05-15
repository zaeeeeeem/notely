<?php
session_start();
require '../config/db.php';
require '../models/Notes.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

$userModel = new User($pdo);
$user = $userModel->getUser($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['note'])) {
    $subject = $_POST['subject'];
    $target_dir = "../public/uploads/";
    $file_name = basename($_FILES["note"]["name"]);
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["note"]["tmp_name"], $target_file)) {
        $notesModel = new Notes($pdo);
        if ($notesModel->uploadNote($_SESSION['user_id'], $subject, $target_file)) {
            header("Location: ../views/notes.php");
            exit;
        } else {
            echo "Error saving note.";
        }
    } else {
        echo "File upload failed.";
    }
}
?>