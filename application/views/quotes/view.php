<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quote Details - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2>Quote Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?= $quote->id ?></td>
        </tr>
        <tr>
            <th>Quote Number</th>
            <td><?= html_escape($quote->quote_number) ?></td>
        </tr>
        <tr>
            <th>Consultation ID</th>
            <td><?= $quote->consultation_id ?></td>
        </tr>
        <tr>
            <th>System Capacity (kW)</th>
            <td><?= $quote->system_capacity ?></td>
        </tr>
        <tr>
            <th>Panel Type</th>
            <td><?= html_escape($quote->panel_type) ?></td>
        </tr>
        <tr>
            <th>Inverter Type</th>
            <td><?= html_escape($quote->inverter_type) ?></td>
        </tr>
        <tr>
            <th>Total Cost</th>
            <td><?= number_format($quote->total_cost, 2) ?></td>
        </tr>
        <tr>
            <th>Discount Percentage</th>
            <td><?= $quote->discount_percent ?>%</td>
        </tr>
        <tr>
            <th>Final Cost</th>
            <td><?= number_format($quote->final_cost, 2) ?></td>
        </tr>
        <tr>
            <th>Warranty (Years)</th>
            <td><?= $quote->warranty_years ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= ucfirst($quote->status) ?></td>
        </tr>
        <tr>
            <th>Valid Until</th>
            <td><?= $quote->valid_until ? date('Y-m-d', strtotime($quote->valid_until)) : 'N/A' ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?= date('Y-m-d H:i', strtotime($quote->created_at)) ?></td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td><?= date('Y-m-d H:i', strtotime($quote->updated_at)) ?></td>
        </tr>
    </table>

    <a href="<?= site_url('quotes') ?>" class="btn btn-primary">Back to List</a>
    <a href="<?= site_url('quotes/form/'.$quote->id) ?>" class="btn btn-warning">Edit</a>
</div>

<?php $this->load->view('layout/footer'); ?>

</body>
</html>
