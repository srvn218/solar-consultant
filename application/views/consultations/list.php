<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultations - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>


<div class="container">
    <h2>Consultations</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= site_url('consultations/form') ?>" class="btn btn-primary mb-3">Add New Consultation</a>

    <?php if (empty($consultations)): ?>
        <p>No consultations found.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Consultant</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Recommended Capacity (kW)</th>
                    <th>Estimated Cost</th>
                    <th>Estimated Savings Yearly</th>
                    <th>Actions</th>
                </tr>
            </head>
            <body>
                <?php foreach ($consultations as $consultation): ?>
                <tr>
                    <td><?= $consultation->id ?></td>
                    <td><?= $this->Customer_model->get_customer_by_id($consultation->customer_id)->first_name ?? 'N/A' ?></td>
                    <td>
                        <?php 
                        if ($consultation->consultant_id) {
                            $consultant = $this->User_model->get_user_by_id($consultation->consultant_id);
                            echo $consultant ? $consultant->name : 'N/A';
                        } else {
                            echo 'N/A';
                        }
                        ?>
                    </td>
                    <td><?= date('Y-m-d H:i', strtotime($consultation->consultation_date)) ?></td>
                    <td><?= ucfirst($consultation->status) ?></td>
                    <td><?= $consultation->recommended_capacity ?></td>
                    <td><?= number_format($consultation->estimated_cost, 2) ?></td>
                    <td><?= number_format($consultation->estimated_savings_yearly, 2) ?></td>
                    <td>
                        <a href="<?= site_url('consultations/view/'.$consultation->id) ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?= site_url('consultations/form/'.$consultation->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('consultations/delete/'.$consultation->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this consultation?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </body>
        </table>
    <?php endif; ?>
</div>



</body>
</html>
