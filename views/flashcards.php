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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Flashcards | Notely</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/flashcard.css">
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
                <a href="notes.php" class="nav-link">
                    <i class="fas fa-file-alt"></i>
                    <span>Notes</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="flashcards.php" class="nav-link active">
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
                <div class="user-avatar"><?= strtoupper(substr($_SESSION['username'], 0, 1)) ?></div>
                <div class="user-info">
                    <div class="user-name"><?= htmlspecialchars($_SESSION['username']) ?></div>
                    <div class="user-email"><?= htmlspecialchars($_SESSION['email']) ?></div>
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
                <input type="text" placeholder="Search flashcards...">
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

        <!-- Flashcards Content -->
        <div class="flashcards-content">
            <div class="page-header">
                <h1>My Flashcards</h1>
                <button id="studyAllBtn" class="btn btn-primary">
                    <i class="fas fa-graduation-cap"></i> Study All
                </button>
            </div>

            <!-- Create Flashcard Form -->
            <div class="create-flashcard">
                <div class="form-header">
                    <h2>Create New Flashcard</h2>
                </div>
                <form action="../controllers/flashcards.php" method="POST">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="e.g. Chemistry, Mathematics" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="question">Question</label>
                        <textarea id="question" name="question" class="form-control" placeholder="Enter your question" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <textarea id="answer" name="answer" class="form-control" placeholder="Enter the answer" required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-plus"></i> Add Flashcard
                    </button>
                </form>
            </div>

            <!-- Flashcards Grid -->
            <?php if (empty($flashcards)): ?>
                <div class="empty-state">
                    <i class="fas fa-layer-group"></i>
                    <h3>No Flashcards Yet</h3>
                    <p>Create your first flashcard to start studying smarter with Notely</p>
                </div>
            <?php else: ?>
                <h2 class="section-title">Your Flashcards</h2>
                <div class="flashcards-grid">
                    <?php foreach ($flashcards as $flashcard): ?>
                        <div class="flashcard-container">
                            <div class="flashcard" onclick="flipCard(this)">
                                <div class="flashcard-face flashcard-front">
                                    <span class="flashcard-subject"><?= htmlspecialchars($flashcard['subject']) ?></span>
                                    <div class="flashcard-content"><?= htmlspecialchars($flashcard['question']) ?></div>
                                    <div class="flashcard-actions">
                                        <button class="action-btn" onclick="event.stopPropagation(); studyFlashcard(this)" data-question="<?= htmlspecialchars($flashcard['question']) ?>" data-answer="<?= htmlspecialchars($flashcard['answer']) ?>">
                                            <i class="fas fa-graduation-cap"></i>
                                        </button>
                                        <form action="../controllers/delete_flashcard.php" method="POST" onsubmit="event.stopPropagation(); return confirm('Are you sure you want to delete this flashcard?');">
                                            <input type="hidden" name="flashcard_id" value="<?= $flashcard['id'] ?>">
                                            <button type="submit" class="action-btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="flashcard-face flashcard-back">
                                    <span class="flashcard-subject"><?= htmlspecialchars($flashcard['subject']) ?></span>
                                    <div class="flashcard-content"><?= htmlspecialchars($flashcard['answer']) ?></div>
                                    <div class="flashcard-actions">
                                        <button class="action-btn" onclick="event.stopPropagation(); studyFlashcard(this)" data-question="<?= htmlspecialchars($flashcard['question']) ?>" data-answer="<?= htmlspecialchars($flashcard['answer']) ?>">
                                            <i class="fas fa-graduation-cap"></i>
                                        </button>
                                        <form action="../controllers/delete_flashcard.php" method="POST" onsubmit="event.stopPropagation(); return confirm('Are you sure you want to delete this flashcard?');">
                                            <input type="hidden" name="flashcard_id" value="<?= $flashcard['id'] ?>">
                                            <button type="submit" class="action-btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Study Mode Modal -->
    <div class="study-mode" id="studyMode">
        <div class="study-card" id="studyCard">
            <button class="close-study" id="closeStudy">&times;</button>
            <div class="study-card-inner">
                <div class="study-card-face study-card-front">
                    <div class="study-card-content" id="studyQuestion"></div>
                    <div class="study-card-actions">
                        <button class="study-btn study-btn-secondary" id="flipStudyCard">Flip Card</button>
                    </div>
                </div>
                <div class="study-card-face study-card-back">
                    <div class="study-card-content" id="studyAnswer"></div>
                    <div class="study-card-actions">
                        <button class="study-btn study-btn-primary" id="nextStudyCard">Next Card</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle (for responsive)
        document.querySelector('.user-profile').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            if (window.innerWidth <= 576) {
                sidebar.classList.toggle('expanded');
            }
        });

        // Flip individual flashcards
        function flipCard(card) {
            card.classList.toggle('flipped');
        }

        // Study Mode functionality
        const studyMode = document.getElementById('studyMode');
        const studyCard = document.getElementById('studyCard');
        const studyQuestion = document.getElementById('studyQuestion');
        const studyAnswer = document.getElementById('studyAnswer');
        const flipStudyCard = document.getElementById('flipStudyCard');
        const nextStudyCard = document.getElementById('nextStudyCard');
        const closeStudy = document.getElementById('closeStudy');
        const studyAllBtn = document.getElementById('studyAllBtn');

        let currentFlashcards = [];
        let currentIndex = 0;

        // Initialize flashcards from PHP data
        <?php if (!empty($flashcards)): ?>
            currentFlashcards = [
                <?php foreach ($flashcards as $flashcard): ?>
                    {
                        question: `<?= addslashes($flashcard['question']) ?>`,
                        answer: `<?= addslashes($flashcard['answer']) ?>`,
                        subject: `<?= addslashes($flashcard['subject']) ?>`
                    },
                <?php endforeach; ?>
            ];
        <?php endif; ?>

        // Study individual flashcard
        function studyFlashcard(button) {
            const question = button.getAttribute('data-question');
            const answer = button.getAttribute('data-answer');
            
            studyQuestion.textContent = question;
            studyAnswer.textContent = answer;
            
            studyMode.style.display = 'flex';
            studyCard.classList.remove('flipped');
            document.body.style.overflow = 'hidden';
        }

        // Study all flashcards
        if (studyAllBtn) {
            studyAllBtn.addEventListener('click', function() {
                if (currentFlashcards.length === 0) {
                    alert('No flashcards available to study');
                    return;
                }
                
                currentIndex = 0;
                showStudyCard();
                studyMode.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
        }

        function showStudyCard() {
            if (currentIndex < currentFlashcards.length) {
                studyQuestion.textContent = currentFlashcards[currentIndex].question;
                studyAnswer.textContent = currentFlashcards[currentIndex].answer;
                studyCard.classList.remove('flipped');
            } else {
                // End of flashcards
                studyMode.style.display = 'none';
                document.body.style.overflow = 'auto';
                alert('You\'ve reviewed all flashcards!');
            }
        }

        flipStudyCard.addEventListener('click', function() {
            studyCard.classList.toggle('flipped');
        });

        nextStudyCard.addEventListener('click', function() {
            currentIndex++;
            showStudyCard();
        });

        closeStudy.addEventListener('click', function() {
            studyMode.style.display = 'none';
            document.body.style.overflow = 'auto';
        });

        // Close study mode when clicking outside
        studyMode.addEventListener('click', function(e) {
            if (e.target === studyMode) {
                studyMode.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });

        // Animation for flashcards
        document.addEventListener('DOMContentLoaded', function() {
            const flashcards = document.querySelectorAll('.flashcard-container');
            flashcards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease ' + (index * 0.1) + 's';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            });
        });

        // Notification dropdown functionality
        document.querySelector('.notification-btn').addEventListener('click', function() {
            // In a real app, this would toggle a notification dropdown
            alert('You have 3 new notifications');
        });
    </script>
</body>
</html>