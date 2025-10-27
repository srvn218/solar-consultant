<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2>Profile</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <?= form_open('dashboard/update_profile') ?>

    <div class="form-group">
        <label for="name">Name</label>
        <?= form_input(['name' => 'name', 'id' => 'name', 'value' => set_value('name', $user->name), 'required' => 'required']) ?>
        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="email">Email (cannot be changed)</label>
        <input type="email" id="email" value="<?= html_escape($user->email) ?>" readonly class="form-control" />
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <?= form_input(['name' => 'phone', 'id' => 'phone', 'value' => set_value('phone', $user->phone)]) ?>
        <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
    </div>

    <button type="submit" class="btn btn-primary">Update Profile</button>

    <?= form_close() ?>
</div>



</body>
</html>
<style>/* Profile Page Customization */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 30px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(26, 107, 59, 0.1);
    margin-top: 20px;
    border: 1px solid rgba(44, 156, 92, 0.1);
}

.container h2 {
    color: #1a6b3b;
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
    padding-bottom: 15px;
    border-bottom: 3px solid #2c9c5c;
    position: relative;
}

.container h2::after {
    content: '';
    position: absolute;
    bottom: -3px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: #ffd700;
    border-radius: 2px;
}

.alert-success {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    border: 1px solid #c3e6cb;
    color: #155724;
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 25px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.15);
    border-left: 4px solid #28a745;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #1a6b3b;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-group input[type="text"],
.form-group input[type="email"] {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid #e8f5e8;
    border-radius: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8fdf9;
    color: #333;
}

.form-group input[type="text"]:focus,
.form-group input[type="email"]:focus {
    outline: none;
    border-color: #2c9c5c;
    background: white;
    box-shadow: 0 0 0 3px rgba(44, 156, 92, 0.1);
    transform: translateY(-2px);
}

.form-group input[readonly] {
    background: #f8f9fa;
    border-color: #dee2e6;
    color: #6c757d;
    cursor: not-allowed;
}

.form-group input[readonly]:focus {
    border-color: #dee2e6;
    box-shadow: none;
    transform: none;
}

.text-danger {
    color: #dc3545 !important;
    font-size: 0.85rem;
    font-weight: 500;
    margin-top: 6px;
    display: block;
}

.btn-primary {
    background: linear-gradient(135deg, #2c9c5c, #1a6b3b);
    border: none;
    border-radius: 10px;
    padding: 14px 30px;
    font-size: 1rem;
    font-weight: 600;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    box-shadow: 0 4px 15px rgba(44, 156, 92, 0.3);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1a6b3b, #14522d);
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(44, 156, 92, 0.4);
}

.btn-primary:active {
    transform: translateY(-1px);
}

/* Form styling */
form {
    margin-top: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        margin: 15px;
        padding: 25px 20px;
    }
    
    .container h2 {
        font-size: 1.8rem;
        margin-bottom: 25px;
    }
    
    .form-group input[type="text"],
    .form-group input[type="email"] {
        padding: 12px 14px;
    }
    
    .btn-primary {
        padding: 12px 25px;
    }
}

@media (max-width: 480px) {
    .container {
        margin: 10px;
        padding: 20px 15px;
    }
    
    .container h2 {
        font-size: 1.6rem;
    }
    
    .alert-success {
        padding: 12px 15px;
        font-size: 0.9rem;
    }
}

/* Animation for form elements */
.form-group {
    animation: fadeInUp 0.5s ease-out;
}

.form-group:nth-child(1) { animation-delay: 0.1s; }
.form-group:nth-child(2) { animation-delay: 0.2s; }
.form-group:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}</style>