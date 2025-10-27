<!DOCTYPE html>
<html>
<head>
    <title>Aswin Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body { 
            background: #f8fbf8;
            margin: 0; 
            font-family: 'Inter', system-ui, sans-serif;
        }
        
        /* Main Header */
        .main-header-bar {
            width: 95%;
            background: #ffffff;
            border-radius: 20px;
            max-width: 1300px;
            margin: 25px auto 0 auto;
            box-shadow: 0 8px 32px rgba(44, 85, 48, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            border-bottom: 3px solid #2c5530;
        }

        /* Brand Styling */
        .site-brand {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c5530;
            letter-spacing: -0.5px;
        }

        .site-brand img { 
            height: 44px; 
            margin-right: 14px;
            filter: brightness(1.1);
        }

        /* Navigation */
        .header-buttons {
            display: flex;
            gap: 4px;
            align-items: center;
        }

        .nav-btn {
            background: transparent;
            color: #64748b !important;
            font-weight: 500;
            font-size: 1.05rem;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-btn:hover {
            background: #f1f5f9;
            color: #2c5530 !important;
        }

        .nav-btn.active {
            background: #2c5530;
            color: white !important;
            font-weight: 600;
        }

        /* WhatsApp Button */
        .whatsapp-btn {
            background: #25D366;
            color: white !important;
            font-weight: 600;
            font-size: 1.05rem;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 12px;
        }

        .whatsapp-btn:hover {
            background: #128C7E;
        }

        /* Contact Info */
        .header-btns-right {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .header-contact {
            font-size: 1.05rem;
            background: #f8fbf8;
            color: #2c5530;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #e2e8f0;
        }

        /* Profile Icon */
        .profile-icon {
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, #2c5530, #38a169);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            margin-left: 12px;
            border: 3px solid #e2f0e2;
            cursor: pointer;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .main-header-bar {
                padding: 15px 30px;
            }
            
            .site-brand {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 900px) {
            .main-header-bar {
                flex-direction: column;
                gap: 20px;
                padding: 20px;
            }
            
            .header-buttons {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .header-btns-right {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        @media (max-width: 600px) {
            .main-header-bar {
                width: 90%;
                padding: 15px;
            }
            
            .site-brand {
                font-size: 1.4rem;
            }
            
            .nav-btn, .whatsapp-btn, .header-contact {
                padding: 10px 16px;
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
<div class="main-header-bar">
    <div class="site-brand">
        <img src="https://img.icons8.com/color/96/solar-panel.png" alt="Solar Panel Icon">
        Aswin Solar Consultant
    </div>
    <div class="header-buttons">
        <a href="<?= site_url('/') ?>" class="nav-btn <?= $this->uri->segment(1)==''?'active':'' ?>">
            <i class="fas fa-home"></i> Home
        </a>
        <a href="<?= site_url('about') ?>" class="nav-btn <?= $this->uri->segment(1)=='about'?'active':'' ?>">
            <i class="fas fa-info-circle"></i> About
        </a>
        <a href="<?= site_url('products') ?>" class="nav-btn <?= $this->uri->segment(1)=='products'?'active':'' ?>">
            <i class="fas fa-solar-panel"></i> Products
        </a>
        <a href="https://wa.me/919790119135" target="_blank" class="whatsapp-btn">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
        <div class="header-btns-right">
            <span class="header-contact">
                <i class="fas fa-phone-alt"></i> +91 9790119135
            </span>
            <a href="<?= site_url('auth/login') ?>" id="profile-link">
    <i class="fas fa-user-circle" style="font-size:34px;color:#228839;"></i>
</a>

        </div>
    </div>
</div>