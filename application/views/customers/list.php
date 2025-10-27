<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customers - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2>Customers</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= site_url('customers/form') ?>" class="btn btn-primary mb-3">Add New Customer</a>

    <?php if (empty($customers)): ?>
        <p>No customers found.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Property Type</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </head>
            <body>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $customer->id ?></td>
                    <td><?= $customer->first_name . ' ' . $customer->last_name ?></td>
                    <td><?= html_escape($customer->email) ?></td>
                    <td><?= html_escape($customer->phone) ?></td>
                    <td><?= ucfirst($customer->property_type) ?></td>
                    <td><?= html_escape($customer->city) ?></td>
                    <td>
                        <a href="<?= site_url('customers/view/'.$customer->id) ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?= site_url('customers/form/'.$customer->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('customers/delete/'.$customer->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </body>
        </table>
    <?php endif; ?>
</div>



</body>
</html>
