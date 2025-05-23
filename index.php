<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notely - Digitize & Organize Your Handwritten Notes</title>
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo">
                Notely
            </a>
            <nav>
                <ul id="nav-menu">
                    <li><a href="#features">Features</a></li>
                    <li><a href="#how-it-works">How It Works</a></li>
                    <li><a href="#reviews">Reviews</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                </ul>
            </nav>
            <button class="mobile-menu-btn" id="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1 class="animate-slide-up">Digitize & Organize Your Handwritten Notes</h1>
                <p class="animate-slide-up animate-delay-1">Upload note images, categorize by subject, and create flashcards for smarter studying.</p>
                <div class="cta-buttons animate-slide-up animate-delay-2">
                    <a href="public/register.php" class="btn btn-primary">Get Started for Free</a>
                    <a href="public/login.php" class="btn btn-secondary">
                        <i class="fas fa-user-circle"></i> &nbsp&nbsp Login
                    </a>
                </div>
                <img src="img/hero-banner.png" alt="Notely Dashboard" class="hero-image animate-slide-up animate-delay-3">
            </div>
        </section>

        <section class="features" id="features">
            <div class="container">
                <div class="section-header">
                    <h2 class="animate-fade">Transform Your Study Habits</h2>
                    <p class="animate-fade animate-delay-1">Notely helps you study smarter, not harder with these powerful features</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card animate-slide-up">
                        <div class="feature-icon">
                            <i class="fas fa-upload"></i>
                        </div>
                        <h3>Easy Upload</h3>
                        <p>Simply snap a photo of your handwritten notes and upload them to Notely for instant digitization.</p>
                    </div>
                    <div class="feature-card animate-slide-up animate-delay-1">
                        <div class="feature-icon">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <h3>Smart Organization</h3>
                        <p>Categorize notes by subject, topic, or date. Never lose an important note again.</p>
                    </div>
                    <div class="feature-card animate-slide-up animate-delay-2">
                        <div class="feature-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>Flashcard Generator</h3>
                        <p>Automatically convert your notes into flashcards for efficient memorization and review.</p>
                    </div>
                    <div class="feature-card animate-slide-up">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Powerful Search</h3>
                        <p>Find any note instantly with our OCR-powered search that reads your handwriting.</p>
                    </div>
                    <div class="feature-card animate-slide-up animate-delay-1">
                        <div class="feature-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h3>Multi-Device Sync</h3>
                        <p>Access your notes anywhere, anytime. Works across all your devices seamlessly.</p>
                    </div>
                    <div class="feature-card animate-slide-up animate-delay-2">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Study Analytics</h3>
                        <p>Track your study patterns and identify areas that need more focus with detailed analytics.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="how-it-works" id="how-it-works">
            <div class="container">
                <div class="section-header">
                    <h2 class="animate-fade">How Notely Works</h2>
                    <p class="animate-fade animate-delay-1">Get started in just a few simple steps</p>
                </div>
                <div class="steps">
                    <div class="step animate-slide-up">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h3>Upload Your Notes</h3>
                            <p>Take photos of your handwritten notes or upload existing images from your device.</p>
                        </div>
                    </div>
                    <div class="step animate-slide-up animate-delay-1">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h3>Organize & Categorize</h3>
                            <p>Tag your notes by subject, topic, or date. Create custom notebooks for different classes.</p>
                        </div>
                    </div>
                    <div class="step animate-slide-up animate-delay-2">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h3>Enhance & Study</h3>
                            <p>Convert notes to flashcards, highlight important sections, and share with study groups.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="reviews" id="reviews">
            <div class="container">
                <div class="section-header">
                    <h2 class="animate-fade">What Students Are Saying</h2>
                    <p class="animate-fade animate-delay-1">Trusted by thousands of students worldwide</p>
                </div>
                <div class="reviews-container">
                    <div class="reviews-carousel" id="reviews-carousel">
                        <div class="review-card">
                            <div class="review-content">
                                <p class="review-text">Notely has completely transformed how I study. Being able to search through my handwritten notes has saved me countless hours. The flashcard feature is a game-changer!</p>
                                <div class="review-author">
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah J." class="author-avatar">
                                    <div class="author-info">
                                        <h4>Sarah J.</h4>
                                        <p>Medical Student, Harvard</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-card">
                            <div class="review-content">
                                <p class="review-text">As someone who prefers handwriting notes but needs digital organization, Notely is the perfect solution. I've recommended it to all my study group members.</p>
                                <div class="review-author">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael T." class="author-avatar">
                                    <div class="author-info">
                                        <h4>Michael T.</h4>
                                        <p>Engineering Student, MIT</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-card">
                            <div class="review-content">
                                <p class="review-text">The OCR search works surprisingly well with my messy handwriting. I can find any concept from my notes in seconds. Worth every penny for the premium version.</p>
                                <div class="review-author">
                                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Priya K." class="author-avatar">
                                    <div class="author-info">
                                        <h4>Priya K.</h4>
                                        <p>Law Student, Stanford</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-nav" id="carousel-nav">
                        <div class="carousel-dot active"></div>
                        <div class="carousel-dot"></div>
                        <div class="carousel-dot"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta" id="get-started">
            <div class="container">
                <h2 class="animate-fade">Ready to Revolutionize Your Study Routine?</h2>
                <p class="animate-fade animate-delay-1">Join thousands of students who are studying smarter with Notely</p>
                <a href="public/register.php" class="btn btn-primary animate-fade animate-delay-2">Start Your Free Trial</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <a href="#" class="logo">
                        Notely
                    </a>
                    <p>Helping students study smarter since 2023.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Product</h3>
                    <ul>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Download</a></li>
                        <li><a href="#">Updates</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Tutorials</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">API Docs</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; 2023 Notely. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script src="js/landing.js"></script>
</body>
</html>