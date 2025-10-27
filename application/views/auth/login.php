<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Aswin Solar</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            display: flex;
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            min-height: 500px;
        }

        .welcome-section {
            flex: 1;
            background: linear-gradient(135deg, #3ba4ffff 0%, #00dcfeff 100%);
            color: white;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .logo img {
            height: 40px;
            margin-right: 12px;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .welcome-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .quote {
            font-style: italic;
            font-size: 1rem;
            margin-bottom: 15px;
            line-height: 1.5;
            position: relative;
            padding-left: 15px;
        }

        .quote::before {
            content: '"';
            font-size: 2rem;
            position: absolute;
            left: -8px;
            top: -8px;
            opacity: 0.3;
        }

        .author {
            font-weight: 600;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .login-section {
            flex: 1;
            padding: 40px 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            margin-bottom: 30px;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c5530;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #666;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: #4facfe;
            background: white;
            box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.1);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
        }

        .remember-me input {
            width: 16px;
            height: 16px;
        }

        .forgot-password {
            color: #4facfe;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(79, 172, 254, 0.3);
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
            color: #666;
            font-size: 0.9rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
        }

        .divider span {
            background: white;
            padding: 0 12px;
            position: relative;
        }

        .social-login {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 10px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .social-btn.google {
            color: #db4437;
        }

        .social-btn.facebook {
            color: #4267B2;
        }

        .social-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .register-link {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        .register-link a {
            color: #4facfe;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-msg {
            background: #fee2e2;
            color: #dc2626;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid #fecaca;
            font-size: 0.9rem;
        }

        .text-danger {
            color: #dc2626;
            font-size: 0.8rem;
            margin-top: 4px;
            display: block;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 400px;
                min-height: auto;
            }
            
            .welcome-section {
                padding: 30px 25px;
            }
            
            .login-section {
                padding: 30px 25px;
            }
            
            .welcome-title {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                max-width: 350px;
            }
            
            .welcome-section,
            .login-section {
                padding: 25px 20px;
            }
            
            .social-login {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
        <div class="logo">
            <img src="https://img.icons8.com/color/96/solar-panel.png" alt="Solar Panel">
            <div class="logo-text">Aswin Solar</div>
        </div>
        
        <h1 class="welcome-title">Welcome Back!</h1>
        <p class="welcome-subtitle">Login to access your solar consultant dashboard and manage your renewable energy solutions.</p>
        
        <div class="quote">
            The sun is a daily reminder that we too can rise again from the darkness, that we too can shine our own light.
        </div>
        <div class="author">- S. Ajna</div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="login-section">
        <div class="login-header">
            <h2 class="login-title">Login</h2>
            <p class="login-subtitle">Please login to continue</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error-msg"><?= html_escape($error) ?></div>
        <?php endif; ?>

        <?= form_open('auth/login_post') ?>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Enter your email" required autofocus>
            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
        </div>

        <div class="form-options">
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Keep Me Logged In</label>
            </div>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </div>

        <button type="submit" class="btn-login">LOGIN</button>

        <?= form_close() ?>

        <div class="divider">
            <span>Or</span>
        </div>

        <div class="social-login">
            <button type="button" class="social-btn google">
                <i class="fab fa-google"></i>
                Google
            </button>
            <button type="button" class="social-btn facebook">
                <i class="fab fa-facebook-f"></i>
                Facebook
            </button>
        </div>

        <div class="register-link">
            Don't have an account? <a href="<?= site_url('auth/register') ?>">Register here</a>.
        </div>
    </div>
</div>

</body>
</html>