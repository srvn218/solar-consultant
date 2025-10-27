<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Installations - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2>Installations</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= site_url('installations/form') ?>" class="btn btn-primary mb-3">Add New Installation</a>

    <?php if (empty($installations)): ?>
        <p>No installations found.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Quote Number</th>
                    <th>Installation Date</th>
                    <th>Completion Date</th>
                    <th>Status</th>
                    <th>System Capacity (kW)</th>
                    <th>Installation Cost</th>
                    <th>Actual Cost</th>
                    <th>Actions</th>
                </tr>
            </head>
            <body>
                <?php foreach ($installations as $installation): ?>
                <tr>
                    <td><?= $installation->id ?></td>
                    <td>
                        <?php
                            $quote = $this->Quote_model->get_quote_by_id($installation->quote_id);
                            echo $quote ? html_escape($quote->quote_number) : 'N/A';
                        ?>
                    </td>
                    <td><?= date('Y-m-d', strtotime($installation->installation_date)) ?></td>
                    <td><?= $installation->completion_date ? date('Y-m-d', strtotime($installation->completion_date)) : 'N/A' ?></td>
                    <td><?= ucfirst($installation->status) ?></td>
                    <td><?= $installation->system_capacity ?></td>
                    <td><?= number_format($installation->installation_cost, 2) ?></td>
                    <td><?= number_format($installation->actual_cost, 2) ?></td>
                    <td>
                        <a href="<?= site_url('installations/view/'.$installation->id) ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?= site_url('installations/form/'.$installation->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('installations/delete/'.$installation->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this installation?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </body>
        </table>
    <?php endif; ?>
</div>



</body>
</html>
