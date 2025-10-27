<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($consultation) ? 'Edit' : 'Add' ?> Consultation - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2><?= isset($consultation) ? 'Edit' : 'Add' ?> Consultation</h2>

    <?= form_open('consultations/save') ?>

    <?= form_hidden('id', isset($consultation) ? $consultation->id : '') ?>

    <div class="form-group">
        <label for="customer_id">Customer</label>
        <select name="customer_id" id="customer_id" class="form-control" required>
            <option value="">-- Select Customer --</option>
            <?php foreach ($customers as $customer): ?>
                <option value="<?= $customer->id ?>" <?= set_select('customer_id', $customer->id, isset($consultation) && $consultation->customer_id == $customer->id) ?>>
                    <?= $customer->first_name . ' ' . $customer->last_name ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?= form_error('customer_id', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="consultant_id">Consultant</label>
        <select name="consultant_id" id="consultant_id" class="form-control">
            <option value="">-- Select Consultant --</option>
            <?php foreach ($consultants as $consultant): ?>
                <option value="<?= $consultant->id ?>" <?= set_select('consultant_id', $consultant->id, isset($consultation) && $consultation->consultant_id == $consultant->id) ?>>
                    <?= $consultant->name ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?= form_error('consultant_id', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="consultation_date">Consultation Date</label>
        <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required value="<?= set_value('consultation_date', isset($consultation) ? date('Y-m-d\TH:i', strtotime($consultation->consultation_date)) : '') ?>">
        <?= form_error('consultation_date', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <?php $statuses = ['pending', 'completed', 'cancelled']; ?>
            <?php foreach ($statuses as $status): ?>
                <option value="<?= $status ?>" <?= set_select('status', $status, isset($consultation) && $consultation->status == $status) ?>><?= ucfirst($status) ?></option>
            <?php endforeach; ?>
        </select>
        <?= form_error('status', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="recommended_capacity">Recommended Capacity (kW)</label>
        <input type="number" name="recommended_capacity" id="recommended_capacity" class="form-control" min="0" value="<?= set_value('recommended_capacity', isset($consultation) ? $consultation->recommended_capacity : '') ?>">
        <?= form_error('recommended_capacity', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="estimated_cost">Estimated Cost</label>
        <input type="number" step="0.01" name="estimated_cost" id="estimated_cost" class="form-control" min="0" value="<?= set_value('estimated_cost', isset($consultation) ? $consultation->estimated_cost : '') ?>">
        <?= form_error('estimated_cost', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="estimated_savings_yearly">Estimated Savings Yearly</label>
        <input type="number" step="0.01" name="estimated_savings_yearly" id="estimated_savings_yearly" class="form-control" min="0" value="<?= set_value('estimated_savings_yearly', isset($consultation) ? $consultation->estimated_savings_yearly : '') ?>">
        <?= form_error('estimated_savings_yearly', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea name="notes" id="notes" class="form-control"><?= set_value('notes', isset($consultation) ? $consultation->notes : '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-success"><?= isset($consultation) ? 'Update' : 'Save' ?></button>
    <a href="<?= site_url('consultations') ?>" class="btn btn-secondary">Cancel</a>

    <?= form_close() ?>
</div>

<?php $this->load->view('layout/footer'); ?>

</body>
</html>
