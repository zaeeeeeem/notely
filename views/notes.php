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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes | Notely</title>
    <link rel="stylesheet" href="../css/note.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="dashboard.php" class="logo">
                <img src="https://via.placeholder.com/32x32" alt="Notely Logo">
                <span>Notely</span>
            </a>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="dashboard.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="subjects.php" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>My Subjects</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="notes.php" class="nav-link active">
                    <i class="fas fa-file-alt"></i>
                    <span>Notes</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="flashcards.php" class="nav-link">
                    <i class="fas fa-layer-group"></i>
                    <span>Flashcards</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="study-sessions.php" class="nav-link">
                    <i class="fas fa-clock"></i>
                    <span>Study Sessions</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="analytics.php" class="nav-link">
                    <i class="fas fa-chart-bar"></i>
                    <span>Analytics</span>
                </a>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">
                    <!-- <?= strtoupper(substr($_SESSION['username'], 0, 1)) ?> -->
                </div>
                <div class="user-info">
                    <div class="user-name">
                        <!-- <?= htmlspecialchars($_SESSION['username']) ?> -->
                    </div>
                    <div class="user-email">
                        <!-- <?= htmlspecialchars($_SESSION['email']) ?> -->
                    </div>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search notes...">
            </div>

            <div class="top-bar-actions">
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                <a href="../controllers/logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <!-- Notes Content -->
        <div class="notes-content">
            <div class="page-header">
                <h1>My Notes</h1>
                <button id="uploadBtn" class="btn btn-primary">
                    <i class="fas fa-plus" id = "plus-icon"></i> Upload New Note
                </button>
            </div>

            <?php if (empty($notes)): ?>
                <div class="empty-state">
                    <i class="fas fa-file-upload"></i>
                    <h3>No Notes Yet</h3>
                    <p>Upload your first handwritten note to get started with Notely</p>
                    <button id="uploadEmptyBtn" class="btn btn-primary">
                        <i class="fas fa-upload" id = "upload-icon"></i> Upload Note
                    </button>
                </div>
            <?php else: ?>
                <div class="notes-grid">
                    <?php foreach ($notes as $note): ?>
                        <div class="note-card">
                            <div class="note-header">
                                <div class="note-subject"><?= htmlspecialchars($note['subject']) ?></div>
                                <div class="note-date"><?= date('M j, Y', strtotime($note['created_at'])) ?></div>
                            </div>
                            
                            <div class="note-preview">
                                <?php if (strpos($note['file_path'], '.pdf') !== false): ?>
                                    <i class="fas fa-file-pdf file-icon"></i>
                                <?php else: ?>
                                    <img src="<?= htmlspecialchars($note['file_path']) ?>" alt="Note preview">
                                <?php endif; ?>
                            </div>
                            
                            <div class="note-actions">
                                <a href="<?= htmlspecialchars($note['file_path']) ?>" target="_blank" class="action-btn view-btn">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <form action="../controllers/delete_note.php" method="POST" style="flex: 1;">
                                    <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
                                    <button type="submit" class="action-btn delete-btn">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Upload Modal -->
    <div class="upload-modal" id="uploadModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Upload New Note</h2>
                <button class="close-btn" id="closeModal">&times;</button>
            </div>
            <form action="../controllers/upload.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control" placeholder="e.g. Chemistry, Mathematics" required>
                </div>
                
                <div class="form-group">
                    <label>Upload Note</label>
                    <div class="file-upload">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Drag & drop your file here or click to browse</p>
                        <span class="file-info">JPG, PNG, or PDF (Max 10MB)</span>
                        <input type="file" name="note" accept="image/*,application/pdf" required>
                    </div>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-upload"></i> Upload Note
                </button>
            </form>
        </div>
    </div>

    <script src="../js/note.js"></script>
</body>
</html>





<!-- 

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
</html> -->