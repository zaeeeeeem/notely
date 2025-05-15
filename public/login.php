<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notely - Login to Your Account</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body>
    <!-- Left Side - Illustration -->
    <div class="login-illustration">
        <div class="illustration-content">
            <h2>Welcome back to Notely</h2>
            <p>Continue your journey to organized, efficient studying with your digitized notes and flashcards.</p>
            <img src="../img\student.png" alt="Student taking notes" class="illustration-img">
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="login-form-container">
        <div class="login-header">
            <a href="../index.php" class="logo">
                Notely
            </a>
            <h1>Log in to your account</h1>
            <p>Welcome back! Please enter your details.</p>
        </div>

        <form action="../controllers/login.php" method="POST" id="loginForm">
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="error-message">Please enter a valid email address</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <div class="error-message">Password must be at least 8 characters</div>
            </div>

            <div class="remember-forgot">
                <label class="remember-me">
                    <input type="checkbox" id="remember">
                    Remember me
                </label>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <div class="divider">or</div>

            <button type="button" class="btn btn-google">
                Sign in with Google
            </button>

            <div class="signup-link">
                Don't have an account? <a href="register.php">Sign up</a>
            </div>
        </form>
    </div>

</body>
</html>