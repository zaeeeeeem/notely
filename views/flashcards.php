<?php
session_start();
require '../config/db.php';
require '../models/Flashcards.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

$flashcardsModel = new Flashcards($pdo);
$flashcards = $flashcardsModel->getFlashcards($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Flashcards</title>
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/flashcards.js"></script>
</head>
<body>
    <div class="container">
        <h2>Flashcards</h2>
        <a href="dashboard.php" class="btn">Back to Dashboard</a>

        <h3>Create a Flashcard</h3>
        <form action="../controllers/flashcards.php" method="POST">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" required>

            <label for="question">Question:</label>
            <textarea name="question" required></textarea>

            <label for="answer">Answer:</label>
            <textarea name="answer" required></textarea>

            <button type="submit">Add Flashcard</button>
        </form>

        <h3>Existing Flashcards</h3>
        <div class="flashcard-container">
            <?php foreach ($flashcards as $flashcard): ?>
                <div class="flashcard-container">
                    <div class="flashcard" onclick="flipCard(this)">
                        <div class="front"><?= htmlspecialchars($flashcard['question']) ?></div>
                        <div class="back"><?= htmlspecialchars($flashcard['answer']) ?></div>
                    </div>
                    <form action="../controllers/delete_flashcard.php" method="POST">
                        <input type="hidden" name="flashcard_id" value="<?= $flashcard['id'] ?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>