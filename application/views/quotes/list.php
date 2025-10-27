<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quotes - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>


<div class="container">
    <h2>Quotes</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= site_url('quotes/form') ?>" class="btn btn-primary mb-3">Add New Quote</a>

    <?php if (empty($quotes)): ?>
        <p>No quotes found.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Quote Number</th>
                    <th>Consultation Date</th>
                    <th>System Capacity (kW)</th>
                    <th>Status</th>
                    <th>Final Cost</th>
                    <th>Valid Until</th>
                    <th>Actions</th>
                </tr>
            </head>
            <body>
                <?php foreach ($quotes as $quote): ?>
                <tr>
                    <td><?= $quote->id ?></td>
                    <td><?= html_escape($quote->quote_number) ?></td>
                    <td><?= $quote->consultation_date ? date('Y-m-d', strtotime($quote->consultation_date)) : 'N/A' ?></td>
                    <td><?= $quote->system_capacity ?></td>
                    <td><?= ucfirst($quote->status) ?></td>
                    <td><?= number_format($quote->final_cost, 2) ?></td>
                    <td><?= $quote->valid_until ? date('Y-m-d', strtotime($quote->valid_until)) : 'N/A' ?></td>
                    <td>
                        <a href="<?= site_url('quotes/view/'.$quote->id) ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?= site_url('quotes/form/'.$quote->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('quotes/delete/'.$quote->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this quote?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </body>
        </table>
    <?php endif; ?>
</div>



</body>
</html>
