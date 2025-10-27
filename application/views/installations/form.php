<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($installation) ? 'Edit' : 'Add' ?> Installation - Solar Consultant</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<div class="container">
    <h2><?= isset($installation) ? 'Edit' : 'Add' ?> Installation</h2>

    <?= form_open('installations/save') ?>

    <?= form_hidden('id', isset($installation) ? $installation->id : '') ?>

    <div class="form-group">
        <label for="quote_id">Quote</label>
        <select name="quote_id" id="quote_id" class="form-control" required>
            <option value="">-- Select Quote --</option>
            <?php foreach ($quotes as $quote): ?>
                <option value="<?= $quote->id ?>" <?= set_select('quote_id', $quote->id, isset($installation) && $installation->quote_id == $quote->id) ?>>
                    <?= html_escape($quote->quote_number) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?= form_error('quote_id', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="installation_date">Installation Date</label>
        <input type="date" name="installation_date" id="installation_date" class="form-control" required value="<?= set_value('installation_date', isset($installation) ? date('Y-m-d', strtotime($installation->installation_date)) : '') ?>">
        <?= form_error('installation_date', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="completion_date">Completion Date</label>
        <input type="date" name="completion_date" id="completion_date" class="form-control" value="<?= set_value('completion_date', isset($installation) && $installation->completion_date ? date('Y-m-d', strtotime($installation->completion_date)) : '') ?>">
        <?= form_error('completion_date', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <?php $statuses = ['planned', 'in_progress', 'completed', 'on_hold']; ?>
            <?php foreach ($statuses as $status): ?>
                <option value="<?= $status ?>" <?= set_select('status', $status, isset($installation) && $installation->status == $status) ?>><?= ucfirst(str_replace('_', ' ', $status)) ?></option>
            <?php endforeach; ?>
        </select>
        <?= form_error('status', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="system_capacity">System Capacity (kW)</label>
        <input type="number" name="system_capacity" id="system_capacity" class="form-control" min="0" value="<?= set_value('system_capacity', isset($installation) ? $installation->system_capacity : '') ?>">
        <?= form_error('system_capacity', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="installation_cost">Installation Cost</label>
        <input type="number" step="0.01" name="installation_cost" id="installation_cost" class="form-control" min="0" value="<?= set_value('installation_cost', isset($installation) ? $installation->installation_cost : '') ?>">
        <?= form_error('installation_cost', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="actual_cost">Actual Cost</label>
        <input type="number" step="0.01" name="actual_cost" id="actual_cost" class="form-control" min="0" value="<?= set_value('actual_cost', isset($installation) ? $installation->actual_cost : '') ?>">
        <?= form_error('actual_cost', '<small class="text-danger">', '</small>') ?>
    </div>

    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea name="notes" id="notes" class="form-control"><?= set_value('notes', isset($installation) ? $installation->notes : '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-success"><?= isset($installation) ? 'Update' : 'Save' ?></button>
    <a href="<?= site_url('installations') ?>" class="btn btn-secondary">Cancel</a>

    <?= form_close() ?>
</div>

<?php $this->load->view('layout/footer'); ?>

</body>
</html>
