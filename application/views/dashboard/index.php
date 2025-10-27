<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2>Dashboard</h2>

    <div class="dashboard-cards">

        <div class="card">
            <h3>Total Customers</h3>
            <p><?= number_format($total_customers) ?></p>
            <a href="<?= site_url('customers') ?>">View Customers</a>
        </div>

        <div class="card">
            <h3>Total Consultations</h3>
            <p><?= number_format($total_consultations) ?></p>
            <a href="<?= site_url('consultations') ?>">View Consultations</a>
        </div>

        <div class="card">
            <h3>Pending Consultations</h3>
            <p><?= number_format($pending_consultations) ?></p>
            <a href="<?= site_url('consultations') ?>">View Pending</a>
        </div>

        <div class="card">
            <h3>Completed Consultations</h3>
            <p><?= number_format($completed_consultations) ?></p>
            <a href="<?= site_url('consultations') ?>">View Completed</a>
        </div>

        <div class="card">
            <h3>Total Leads</h3>
            <p><?= number_format($total_leads) ?></p>
            <a href="<?= site_url('leads') ?>">View Leads</a>
        </div>

        <div class="card">
            <h3>New Leads</h3>
            <p><?= number_format($new_leads) ?></p>
            <a href="<?= site_url('leads') ?>">View New Leads</a>
        </div>

        <div class="card">
            <h3>Installations In Progress</h3>
            <p><?= number_format($installations_in_progress) ?></p>
            <a href="<?= site_url('installations') ?>">View Installations</a>
        </div>

    </div>
</div>


</body>
</html>