<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jain Our Solar Community - Create Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #1a6b3b 0%, #2c9c5c 100%);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .left-panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%231a5a35" fill-opacity="0.2" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,192C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .logo i {
            margin-right: 10px;
            color: #ffd700;
        }
        
        .tagline {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }
        
        .features {
            list-style: none;
            margin: 30px 0;
            position: relative;
            z-index: 1;
        }
        
        .features li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .features i {
            margin-right: 10px;
            font-size: 18px;
            color: #ffd700;
        }
        
        .quote {
            font-style: italic;
            margin-top: 40px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            position: relative;
            z-index: 1;
        }
        
        .right-panel {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
        }
        
        .form-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
        }
        
        .form-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #1a6b3b;
        }
        
        .form-subtitle {
            color: #666;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }
        
        input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input:focus {
            outline: none;
            border-color: #2c9c5c;
            box-shadow: 0 0 0 2px rgba(44, 156, 92, 0.2);
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            background-color: #2c9c5c;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        
        .btn:hover {
            background-color: #1a6b3b;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .login-link a {
            color: #2c9c5c;
            text-decoration: none;
            font-weight: 600;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        /* Login Page Styles */
        .login-container {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px;
            background: linear-gradient(135deg, #1a6b3b 0%, #2c9c5c 100%);
        }
        
        .login-box {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }
        
        .back-btn {
            background-color: transparent;
            color: #2c9c5c;
            border: 2px solid #2c9c5c;
            margin-top: 20px;
        }
        
        .back-btn:hover {
            background-color: #f0f9f4;
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .left-panel, .right-panel {
                padding: 30px 20px;
            }
            
            .left-panel {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Registration Page -->
 <div class="container" id="registrationPage">
        <div class="left-panel">
            <div class="logo">
                <i class="fas fa-sun"></i>Join Our Solar Community
            </div>
            <div class="tagline">
                Create your account to access exclusive solar solutions and manage your renewable energy projects.
            </div>
            <ul class="features">
                <li><i class="fas fa-calculator"></i> Access to solar calculators</li>
                <li><i class="fas fa-chart-line"></i> Track your energy savings</li>
                <li><i class="fas fa-solar-panel"></i> Manage your installations</li>
                <li><i class="fas fa-headset"></i> 24/7 expert support</li>
            </ul>
            <div class="quote">
                "The use of solar energy has not been opened up because the oil industry does not own the sun."
            </div>
        </div>
        
        <div class="right-panel">
            <div class="form-container">
                <h1 class="form-title">Create Account</h1>
                <p class="form-subtitle">Join thousands of solar enthusiasts</p>
                
                <?= form_open('auth/register_post') ?>

                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="name" placeholder="Enter your full name" value="<?= set_value('name') ?>" required>
                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" value="<?= set_value('email') ?>" required>
                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Create a password" required>
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                        <?= form_error('confirm_password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    
                    <button type="submit" class="btn">CREATE ACCOUNT</button>
                
                <?= form_close() ?> <div class="login-link">
                    Already have an account? <a href="<?= site_url('auth/login') ?>">Login here</a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Get DOM elements
        const registrationPage = document.getElementById('registrationPage');
        const loginPage = document.getElementById('loginPage');
        const loginLink = document.getElementById('loginLink');
        const registerLink = document.getElementById('registerLink');
        const backBtn = document.getElementById('backBtn');

        // You can keep these if you still want the login page to show
        if (loginLink) {
            loginLink.addEventListener('click', function(e) {
                e.preventDefault();
                registrationPage.style.display = 'none';
                loginPage.style.display = 'flex';
            });
        }
        
        if (registerLink) {
            registerLink.addEventListener('click', function(e) {
                e.preventDefault();
                loginPage.style.display = 'none';
                registrationPage.style.display = 'flex';
            });
        }
        
        if (backBtn) {
            backBtn.addEventListener('click', function() {
                loginPage.style.display = 'none';
                registrationPage.style.display = 'flex';
            });
        }

        // NO LONGER NEEDED - The controller handles submission
        /*
        registrationForm.addEventListener('submit', function(e) { ... });
        loginForm.addEventListener('submit', function(e) { ... });
        */
    </script>
</body>
</html>