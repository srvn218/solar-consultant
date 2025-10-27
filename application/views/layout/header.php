<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Solar Consultant - <?= isset($title) ? $title : 'Dashboard' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- ADDED: Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>/* Solar Consultant - Custom Attractive Design */
    :root {
        --primary: #1a6b3b;
        --primary-light: #2c9c5c;
        --primary-dark: #14522d;
        --accent: #ffd700;
        --accent-light: #ffed4e;
        --text: #333;
        --text-light: #666;
        --bg: #f5f7fa;
        --card-bg: #ffffff;
        --border: #e0e0e0;
        --shadow: rgba(0, 0, 0, 0.08);
        --success: #28a745;
        --danger: #dc3545;
        --warning: #ffc107;
    }

    body {
        margin: 0;
        background: linear-gradient(135deg, #0c3b1f 0%, #1a6b3b 50%, #2c9c5c 100%) !important;
        color: var(--text);
        line-height: 1.6;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 80%, rgba(255, 215, 0, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 237, 78, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(26, 107, 59, 0.2) 0%, transparent 50%);
        z-index: -1;
    }

    .sidebar {
        position: fixed;
        top: 0; 
        left: 0; 
        bottom: 0;
        width: 280px;
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        color: var(--text);
        z-index: 100;
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        padding: 30px 0 20px 0;
        border-right: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .sidebar::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--primary-light));
    }

    .sidebar h2 {
        font-size: 1.5rem;
        letter-spacing: 1px;
        margin-bottom: 40px;
        font-weight: 800;
        padding: 0 30px;
        color: var(--primary);
        text-align: center;
    }

    .sidebar a {
        display: flex;
        align-items: center;
        color: var(--text);
        text-decoration: none;
        padding: 14px 30px;
        margin: 2px 15px;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .sidebar a::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 0;
        background: linear-gradient(135deg, var(--primary-light), var(--primary));
        transition: width 0.3s ease;
        z-index: -1;
    }

    .sidebar a:hover::before,
    .sidebar a.active::before {
        width: 100%;
    }

    .sidebar a:hover,
    .sidebar a.active {
        color: white;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(26, 107, 59, 0.3);
        text-decoration: none; /* Added to prevent underline */
    }

    .sidebar a i {
        margin-right: 12px;
        width: 20px;
        text-align: center;
        font-size: 1.1rem;
        /* FIXED: Set default color and add color to transition */
        transition: transform 0.3s ease, color 0.3s ease;
        color: var(--primary); 
    }

    .sidebar a:hover i,
    .sidebar a.active i {
        transform: scale(1.2);
        color: var(--accent);
    }

    .sidebar div {
        margin-top: auto;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }

    .main-content {
        /* FIXED: Corrected alignment */
        margin-left: 280px; 
        padding: 35px 30px;
        background: transparent;
        min-height: 100vh;
        position: relative;
        /* FIXED: Changed animation target */
        animation: fadeInUp 0.5s ease-out;
    }

    /* Cards and Content Styling */
    .card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 4px solid var(--primary-light);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        color: white;
        border: none;
        border-radius: 15px 15px 0 0 !important;
        padding: 20px 25px;
        font-weight: 600;
        font-size: 1.2rem;
    }
    
    .card-footer {
        background: #fafafa;
        border-top: 1px solid var(--border);
        border-radius: 0 0 15px 15px !important;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border: none;
        border-radius: 8px;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(26, 107, 59, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(26, 107, 59, 0.4);
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
    }

    .table {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .table thead th {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        color: white;
        border: none;
        padding: 15px;
        font-weight: 600;
    }

    .table tbody tr:hover {
        background: rgba(44, 156, 92, 0.05);
        transform: scale(1.01);
        transition: all 0.2s ease;
    }
    
    .table .btn-sm {
        padding: 0.25rem 0.6rem;
        font-size: .875rem;
    }

    /* Responsive Design */
    @media (max-width: 900px) {
        .sidebar { 
            width: 100vw; 
            height: auto; 
            padding: 15px 0; 
            position: relative;
            border-right: none;
            border-bottom: 3px solid var(--primary-light);
            /* Added for mobile nav */
            flex-direction: row;
            overflow-x: auto;
        }
        
        .sidebar h2 { 
            display: none; /* Hide title on mobile */
        }
        
        .sidebar a {
            display: inline-flex;
            margin: 5px;
            padding: 10px 15px;
            font-size: 0.9rem;
            flex-shrink: 0; /* Prevent links from shrinking */
        }
        
        .sidebar div {
            margin-top: 0;
            padding-top: 0;
            border-top: none;
            display: flex; /* Make profile/logout inline */
            margin-left: auto; /* Push to right */
            flex-shrink: 0;
        }
        
        .main-content { 
            margin-left: 0; 
            padding: 20px 15px;
        }
        
        .sidebar a:hover,
        .sidebar a.active {
            transform: translateY(-2px);
        }
    }

    /* Animation for page load */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Custom scrollbar */
    .sidebar::-webkit-scrollbar {
        width: 6px;
        height: 6px; /* For mobile */
    }

    .sidebar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: var(--primary-light);
        border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: var(--primary);
    }
    /* --- CSS for Product Pages --- */

    /* Page Title Styling */
    .page-title {
        font-size: 1.9rem;
        font-weight: 700;
        color: #FFF; /* White title for contrast on green bg */
        text-shadow: 0 1px 3px rgba(0,0,0,0.2);
        margin-bottom: 24px;
    }

    /* Container for Add/Edit/View forms */
    .form-container {
        max-width: 800px;
        margin: 0 auto; /* Centers the form card */
    }
    
    /* Make form inputs look modern */
    .form-control {
        border-radius: 8px;
        border: 1px solid var(--border);
        box-shadow: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(26, 107, 59, 0.15);
    }

    /* Card Header for Tables (Product List) */
    .card-header-table {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff; /* White header for table card */
        border-bottom: 1px solid var(--border);
        padding: 20px 25px;
       
    }
    .card-header-table h5 {
        margin: 0;
        font-weight: 700;
        color: var(--primary);
        font-size: 1.3rem;
    }

    /* Make table inside card look clean */
    .card .table {
        margin-bottom: 0; /* Remove bottom margin from table inside card */
    }
    .card .table thead th {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        color: white;
        border: none;
        padding: 15px;
        font-weight: 600;
    }
    .card .table-responsive {
        border-radius: 0 0 15px 15px;
        overflow: hidden;
    }

    /* New Button Colors */
    .btn-warning {
        background: linear-gradient(135deg, #ffc107, #ffdb70);
        border: none;
        color: #333;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
    }
    .btn-warning:hover {
        color: #000;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 193, 7, 0.4);
    }

    .btn-outline-secondary {
        border-color: var(--border);
        color: var(--text-light);
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-outline-secondary:hover {
        background: var(--bg);
        color: var(--primary);
        border-color: #ccc;
    }

    /* Product Image Thumbnails */
    .product-thumb-table {
        max-width: 70px;
        border-radius: 7px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .product-thumb-edit {
        max-width: 110px;
        display: block;
        margin-bottom: 12px;
        border-radius: 8px;
        border: 3px solid var(--border);
    }
    .product-thumb-view {
        max-width: 100%;
        border-radius: 8px;
        border: 3px solid var(--border);
        max-height: 300px;
    }

    /* Styling for View Product Page */
    .product-view-dl dt {
        font-weight: 600;
        color: var(--primary);
    }
    /* --- End of CSS for Product Pages --- */
    
    /* --- CSS for Leads Page --- */
    .action-btn {
        display: inline-block;
        padding: 0 5px; /* Adds space around the icons */
        text-decoration: none;
        vertical-align: middle; /* Aligns icons nicely */
    }
    .action-btn:hover {
        text-decoration: none;
        opacity: 0.7;
    }

    tr.highlighted-lead-row {
        background-color: #fff9e6 !important; /* A light yellow highlight */
        font-weight: 600;
    }
    tr.highlighted-lead-row td {
        color: #594800;
    }

    .table .form-control-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        height: calc(1.5em + 0.5rem + 2px);
        width: 120px; 
    }
    /* --- End of CSS for Leads Page --- */
    
    /* --- Footer Styling --- */
    .main-footer {
        background: #ffffff; /* Clean white background */
        padding: 20px 25px;
        margin-top: 30px; /* Space above the footer */
        border-radius: 12px; /* Match the .card style */
        border-top: 1px solid var(--border);
        box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.03); /* Subtle top shadow */
        color: var(--text-light); /* Light text color */
        font-size: 0.9rem;
    }

    .main-footer .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .main-footer a {
        color: var(--primary); /* Main theme green */
        font-weight: 600;
        text-decoration: none;
    }
    .main-footer a:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }
    
    .main-footer .footer-links a {
        margin-left: 15px;
        color: var(--text-light); /* Lighter color for policy links */
        font-weight: 500;
    }
    .main-footer .footer-links a:hover {
        color: var(--primary);
    }
    
    @media (max-width: 900px) {
        .main-footer .footer-content {
            flex-direction: column;
            text-align: center;
        }
        .main-footer .footer-links {
            margin-top: 10px;
        }
    }
    /* --- End of Footer Styling --- */
    
    </style>
</head>
<body>
<div class="sidebar">
    <!-- Cleaned up inline style for title -->
    <h2 style="font-size:1.45rem;letter-spacing:1px;font-weight:800;color:#1a6b3b;padding:0 30px;margin-bottom:40px;text-align:center;">
        <span style="color:#ffd700;font-weight:900;">ASWIN</span> SOLAR CONSULTANT
    </h2>
    
    <!-- ADDED: Icons to all links -->
    <a href="<?= site_url('dashboard') ?>" class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
        <i class="fa-solid fa-gauge-high"></i>Dashboard
    </a>
    <a href="<?= site_url('customers') ?>" class="<?= $this->uri->segment(1) == 'customers' ? 'active' : '' ?>">
        <i class="fa-solid fa-users"></i>Customers
    </a>
    <a href="<?= site_url('product') ?>" class="<?= $this->uri->segment(1) == 'product' ? 'active' : '' ?>">
        <i class="fa-solid fa-box"></i>Products
    </a>
    <a href="<?= site_url('team') ?>" class="<?= $this->uri->segment(1) == 'team' ? 'active' : '' ?>">
        <i class="fa-solid fa-user-group"></i>Team
    </a>
    <a href="<?= site_url('consultations') ?>" class="<?= $this->uri->segment(1) == 'consultations' ? 'active' : '' ?>">
        <i class="fa-solid fa-calendar-check"></i>Consultations
    </a>
    <a href="<?= site_url('quotes') ?>" class="<?= $this->uri->segment(1) == 'quotes' ? 'active' : '' ?>">
        <i class="fa-solid fa-file-invoice-dollar"></i>Quotes
    </a>
    <a href="<?= site_url('installations') ?>" class="<?= $this->uri->segment(1) == 'installations' ? 'active' : '' ?>">
        <i class="fa-solid fa-solar-panel"></i>Installations
    </a>
    <a href="<?= site_url('leads') ?>" class="<?= $this->uri->segment(1) == 'leads' ? 'active' : '' ?>">
        <i class="fa-solid fa-bullseye"></i>Leads
    </a>
    <div style="margin-top:auto;">
        <a href="<?= site_url('dashboard/profile') ?>" class="<?= $this->uri->segment(2) == 'profile' ? 'active' : '' ?>">
            <i class="fa-solid fa-user-circle"></i>Profile
        </a>
        <a href="<?= site_url('auth/logout') ?>">
            <i class="fa-solid fa-right-from-bracket"></i>Logout
        </a>
    </div>
</div>
<div class="main-content">
<!-- 
  Your content (e.g., dashboard.php) gets loaded here.
  The closing </div> and </body> </html> tags
  should be in your layout/footer.php file.
-->

