<h2 class="page-title"><?= isset($lead) ? 'Edit Lead' : 'Add New Lead' ?></h2>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            <?= isset($lead) ? 'Editing Lead: ' . html_escape($lead->name) : 'Add Lead Details' ?>
        </div>
        
        <div class="card-body">
            <?= form_open('leads/save') ?>
            <?= form_hidden('id', isset($lead) ? $lead->id : '') ?>

            <div class="form-group">
                <label for="name">Name</label>
                <?= form_input(['name' => 'name', 'id' => 'name', 'class' => 'form-control', 'value' => set_value('name', isset($lead) ? $lead->name : ''), 'required' => 'required']) ?>
                <?= form_error('name', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <?= form_input(['name' => 'email', 'type' => 'email', 'id' => 'email', 'class' => 'form-control', 'value' => set_value('email', isset($lead) ? $lead->email : '')]) ?>
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <?= form_input(['name' => 'phone', 'id' => 'phone', 'class' => 'form-control', 'value' => set_value('phone', isset($lead) ? $lead->phone : '')]) ?>
                <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
                <label for="interest_level">Interest Level</label>
                <select name="interest_level" id="interest_level" class="form-control" required>
                    <?php $levels = ['low', 'medium', 'high']; ?>
                    <?php foreach ($levels as $level): ?>
                        <option value="<?= $level ?>" <?= set_select('interest_level', $level, isset($lead) && $lead->interest_level == $level) ?>><?= ucfirst($level) ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('interest_level', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <?php $statuses = ['new', 'contacted', 'qualified', 'converted']; ?>
                    <?php foreach ($statuses as $status): ?>
                        <option value="<?= $status ?>" <?= set_select('status', $status, isset($lead) && $lead->status == $status) ?>><?= ucfirst($status) ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('status', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
                <label for="assigned_to">Assigned To</label>
                <select name="assigned_to" id="assigned_to" class="form-control">
                    <option value="">-- Select User --</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user->id ?>" <?= set_select('assigned_to', $user->id, isset($lead) && $lead->assigned_to == $user->id) ?>><?= html_escape($user->name) ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('assigned_to', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <?= form_textarea(['name' => 'message', 'id' => 'message', 'rows' => 4, 'class' => 'form-control', 'value' => set_value('message', isset($lead) ? $lead->message : '')]) ?>
            </div>
        </div>

        <div class="card-footer text-right">
             <a href="<?= site_url('leads') ?>" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary ml-2"><?= isset($lead) ? 'Update' : 'Save' ?></button>
        </div>
        <?= form_close() ?>
    </div>
</div>