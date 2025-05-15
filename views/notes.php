<?php
session_start();
require '../config/db.php';
require '../models/Notes.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

$notesModel = new Notes($pdo);
$notes = $notesModel->getNotes($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Notes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Uploaded Notes</h2>
        <a href="upload.php" class="btn">Upload New Note</a>
        <ul>
            <?php foreach ($notes as $note): ?>
                <li>
                    <strong><?= htmlspecialchars($note['subject']) ?></strong> 
                    <a href="<?= htmlspecialchars($note['file_path']) ?>" target="_blank">View</a>
                    <form action="../controllers/delete_note.php" method="POST">
                        <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>