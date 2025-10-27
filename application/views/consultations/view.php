<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultation Details - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2>Consultation Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?= $consultation->id ?></td>
        </tr>
        <tr>
            <th>Customer</th>
            <td><?= $customer->first_name . ' ' . $customer->last_name ?></td>
        </tr>
        <tr>
            <th>Consultant</th>
            <td><?= $consultant ? $consultant->name : 'N/A' ?></td>
        </tr>
        <tr>
            <th>Consultation Date</th>
            <td><?= date('Y-m-d H:i', strtotime($consultation->consultation_date)) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= ucfirst($consultation->status) ?></td>
        </tr>
        <tr>
            <th>Recommended Capacity (kW)</th>
            <td><?= $consultation->recommended_capacity ?></td>
        </tr>
        <tr>
            <th>Estimated Cost</th>
            <td><?= number_format($consultation->estimated_cost, 2) ?></td>
        </tr>
        <tr>
            <th>Estimated Savings Yearly</th>
            <td><?= number_format($consultation->estimated_savings_yearly, 2) ?></td>
        </tr>
        <tr>
            <th>Notes</th>
            <td><?= nl2br(html_escape($consultation->notes)) ?></td>
        </tr>
    </table>

    <a href="<?= site_url('consultations') ?>" class="btn btn-primary">Back to List</a>
    <a href="<?= site_url('consultations/form/'.$consultation->id) ?>" class="btn btn-warning">Edit</a>
</div>

<?php $this->load->view('layout/footer'); ?>

</body>
</html>
