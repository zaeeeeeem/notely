<?php
require '../controllers/dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notely - Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="dashboard.php" class="logo">
                <span>Notely</span>
            </a>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="dashboard.php" class="nav-link active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>My Subjects</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="notes.php" class="nav-link">
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
                <a href="#" class="nav-link">
                    <i class="fas fa-clock"></i>
                    <span>Study Sessions</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-chart-bar"></i>
                    <span>Analytics</span>
                </a>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">
                    <?= strtoupper(substr($user['username'], 0, 1)) ?>
                </div>
                <div class="user-info">
                    <div class="user-name">
                        <?= htmlspecialchars($user['username']) ?>
                    </div>
                    <div class="user-email">
                        <?= htmlspecialchars($user['email']) ?>
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
                <input type="text" placeholder="Search notes, flashcards...">
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

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-content">
                    <h1>Welcome back, <?= htmlspecialchars($user['username']) ?> 👋</h1>
                    <p>You have 3 new notes and 2 study sessions scheduled today. Let's make the most of your study time!</p>
                    <div>
                        <a href="upload.php" class="btn btn-primary">Upload New Notes</a>
                        <a href="flashcards.php" class="btn btn-secondary">Create Flashcards</a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-upload"></i>
                    </div>
                    <h3>Upload Notes</h3>
                    <p>Digitize your handwritten notes with our easy upload</p>
                    <a href="upload.php" class="btn btn-primary" style="padding: 8px 15px; width: 100%;">Get Started</a>
                </div>
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h3>Create Flashcards</h3>
                    <p>Turn your notes into interactive flashcards</p>
                    <a href="flashcards.php" class="btn btn-primary" style="padding: 8px 15px; width: 100%;">Start Creating</a>
                </div>
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Plan Study</h3>
                    <p>Schedule your study sessions for better retention</p>
                    <a href="#" class="btn btn-primary" style="padding: 8px 15px; width: 100%;">Plan Now</a>
                </div>
            </div>

            <!-- Subjects Section -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h2>Your Subjects</h2>
                    <a href="#">
                        View All
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>

                <div class="subjects-grid">
                    <div class="subject-card">
                        <h3>
                            <div class="subject-icon">
                                <i class="fas fa-atom"></i>
                            </div>
                            Chemistry
                        </h3>
                        <p>Organic chemistry notes from last week's lecture</p>
                        <div class="subject-stats">
                            <div class="stat-item">
                                <i class="fas fa-file-alt"></i>
                                <span>12 Notes</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-layer-group"></i>
                                <span>45 Flashcards</span>
                            </div>
                        </div>
                    </div>
                    <div class="subject-card">
                        <h3>
                            <div class="subject-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            Mathematics
                        </h3>
                        <p>Calculus problems and solutions</p>
                        <div class="subject-stats">
                            <div class="stat-item">
                                <i class="fas fa-file-alt"></i>
                                <span>8 Notes</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-layer-group"></i>
                                <span>32 Flashcards</span>
                            </div>
                        </div>
                    </div>
                    <div class="subject-card">
                        <h3>
                            <div class="subject-icon">
                                <i class="fas fa-dna"></i>
                            </div>
                            Biology
                        </h3>
                        <p>Cell biology and genetics notes</p>
                        <div class="subject-stats">
                            <div class="stat-item">
                                <i class="fas fa-file-alt"></i>
                                <span>15 Notes</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-layer-group"></i>
                                <span>60 Flashcards</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h2>Recent Activity</h2>
                    <a href="#">
                        View All
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>

                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-upload"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Uploaded new notes</div>
                            <div class="activity-description">Organic Chemistry - Chapter 3: Alkenes and Alkynes</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i>
                                <span>2 hours ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Created flashcards</div>
                            <div class="activity-description">10 new flashcards for Calculus exam</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i>
                                <span>Yesterday</span>
                            </div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Completed study session</div>
                            <div class="activity-description">Reviewed 25 Biology flashcards with 92% accuracy</div>
                            <div class="activity-time">
                                <i class="far fa-clock"></i>
                                <span>2 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/dashboard.js"></script>
</body>
</html>