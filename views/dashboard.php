<?php
require '../controllers/dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notely - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?= htmlspecialchars($user['username']) ?> 👋</h2>
        <a href="../controllers/logout.php" class="btn">Logout</a>

        <h3>Your Subjects</h3>
        <p>Start uploading notes or creating flashcards!</p>
        <a href="upload.php" class="btn">Upload Notes</a>
        <a href="flashcards.php" class="btn">Create Flashcards</a>
    </div>
</body>
</html>