<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Notes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Upload a Handwritten Note</h2>
        <form action="../controllers/upload.php" method="POST" enctype="multipart/form-data">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" required>
            
            <label for="note">Upload Note (JPG, PNG, PDF):</label>
            <input type="file" name="note" accept="image/*,application/pdf" required>

            <button type="submit">Upload Note</button>
        </form>
    </div>
</body>
</html>