<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Installation Details - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2>Installation Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?= $installation->id ?></td>
        </tr>
        <tr>
            <th>Quote Number</th>
            <td>
                <?php
                    $quote = $quote ?? $this->Quote_model->get_quote_by_id($installation->quote_id);
                    echo $quote ? html_escape($quote->quote_number) : 'N/A';
                ?>
            </td>
        </tr>
        <tr>
            <th>Installation Date</th>
            <td><?= date('Y-m-d', strtotime($installation->installation_date)) ?></td>
        </tr>
        <tr>
            <th>Completion Date</th>
            <td><?= $installation->completion_date ? date('Y-m-d', strtotime($installation->completion_date)) : 'N/A' ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= ucfirst(str_replace('_', ' ', $installation->status)) ?></td>
        </tr>
        <tr>
            <th>System Capacity (kW)</th>
            <td><?= $installation->system_capacity ?></td>
        </tr>
        <tr>
            <th>Installation Cost</th>
            <td><?= number_format($installation->installation_cost, 2) ?></td>
        </tr>
        <tr>
            <th>Actual Cost</th>
            <td><?= number_format($installation->actual_cost, 2) ?></td>
        </tr>
        <tr>
            <th>Notes</th>
            <td><?= nl2br(html_escape($installation->notes)) ?></td>
        </tr>
    </table>

    <a href="<?= site_url('installations') ?>" class="btn btn-primary">Back to List</a>
    <a href="<?= site_url('installations/form/'.$installation->id) ?>" class="btn btn-warning">Edit</a>
</div>

<?php $this->load->view('layout/footer'); ?>

</body>
</html>
