<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($customer) ? 'Edit' : 'Add' ?> Customer - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2><?= isset($customer) ? 'Edit' : 'Add' ?> Customer</h2>

    <?= form_open('customers/save') ?>

    <?= form_hidden('id', isset($customer) ? $customer->id : '') ?>

    <div class="form-group">
        <label for="first_name">First Name</label>
        <?= form_input(['name' => 'first_name', 'id' => 'first_name', 'value' => set_value('first_name', isset($customer) ? $customer->first_name : ''), 'required' => 'required']) ?>
        <?= form_error('first_name', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <?= form_input(['name' => 'last_name', 'id' => 'last_name', 'value' => set_value('last_name', isset($customer) ? $customer->last_name : ''), 'required' => 'required']) ?>
        <?= form_error('last_name', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <?= form_input(['name' => 'email', 'type' => 'email', 'id' => 'email', 'value' => set_value('email', isset($customer) ? $customer->email : ''), 'required' => 'required']) ?>
        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <?= form_input(['name' => 'phone', 'id' => 'phone', 'value' => set_value('phone', isset($customer) ? $customer->phone : ''), 'required' => 'required']) ?>
        <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <?= form_textarea(['name' => 'address', 'id' => 'address', 'value' => set_value('address', isset($customer) ? $customer->address : '')]) ?>
    </div>

    <div class="form-group">
        <label for="city">City</label>
        <?= form_input(['name' => 'city', 'id' => 'city', 'value' => set_value('city', isset($customer) ? $customer->city : '')]) ?>
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <?= form_input(['name' => 'state', 'id' => 'state', 'value' => set_value('state', isset($customer) ? $customer->state : '')]) ?>
    </div>

    <div class="form-group">
        <label for="postal_code">Postal Code</label>
        <?= form_input(['name' => 'postal_code', 'id' => 'postal_code', 'value' => set_value('postal_code', isset($customer) ? $customer->postal_code : '')]) ?>
    </div>

    <div class="form-group">
        <label for="property_type">Property Type</label>
        <select name="property_type" id="property_type" required>
            <?php $property_types = ['residential', 'commercial', 'industrial']; ?>
            <?php foreach ($property_types as $type): ?>
                <option value="<?= $type ?>" <?= set_select('property_type', $type, isset($customer) && $customer->property_type == $type) ?>><?= ucfirst($type) ?></option>
            <?php endforeach; ?>
        </select>
        <?= form_error('property_type', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="roof_type">Roof Type</label>
        <?= form_input(['name' => 'roof_type', 'id' => 'roof_type', 'value' => set_value('roof_type', isset($customer) ? $customer->roof_type : '')]) ?>
    </div>

    <button type="submit" class="btn btn-success"><?= isset($customer) ? 'Update' : 'Save' ?></button>
    <a href="<?= site_url('customers') ?>" class="btn btn-secondary">Cancel</a>

    <?= form_close() ?>
</div>

<?php $this->load->view('layout/footer'); ?>

</body>
</html>
