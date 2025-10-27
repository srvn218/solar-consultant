<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Details - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2>Customer Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?= $customer->id ?></td>
        </tr>
        <tr>
            <th>First Name</th>
            <td><?= html_escape($customer->first_name) ?></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?= html_escape($customer->last_name) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= html_escape($customer->email) ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?= html_escape($customer->phone) ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?= html_escape($customer->address) ?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?= html_escape($customer->city) ?></td>
        </tr>
        <tr>
            <th>State</th>
            <td><?= html_escape($customer->state) ?></td>
        </tr>
        <tr>
            <th>Postal Code</th>
            <td><?= html_escape($customer->postal_code) ?></td>
        </tr>
        <tr>
            <th>Property Type</th>
            <td><?= ucfirst($customer->property_type) ?></td>
        </tr>
        <tr>
            <th>Roof Type</th>
            <td><?= html_escape($customer->roof_type) ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?= date('Y-m-d H:i', strtotime($customer->created_at)) ?></td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td><?= date('Y-m-d H:i', strtotime($customer->updated_at)) ?></td>
        </tr>
    </table>

    <a href="<?= site_url('customers') ?>" class="btn btn-primary">Back to List</a>
    <a href="<?= site_url('customers/form/'.$customer->id) ?>" class="btn btn-warning">Edit</a>
</div>

<?php $this->load->view('layout/footer'); ?>

</body>
</html>
