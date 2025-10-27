<h2 class="page-title"><?= isset($quote) ? 'Edit Quote' : 'Add New Quote' ?></h2>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            <?= isset($quote) ? 'Editing Quote: ' . html_escape($quote->quote_number) : 'New Quote Details' ?>
        </div>
        
        <?= form_open('quotes/save') ?>
        <?= form_hidden('id', isset($quote) ? $quote->id : '') ?>
        
        <div class="card-body">
            <div class="form-group">
                <label for="consultation_id">Consultation</label>
                <select name="consultation_id" id="consultation_id" class="form-control" required>
                    <option value="">-- Select Consultation --</option>
                    <?php foreach ($consultations as $consultation): ?>
                        <option value="<?= $consultation->id ?>" <?= set_select('consultation_id', $consultation->id, isset($quote) && $quote->consultation_id == $consultation->id) ?>>
                            #<?= $consultation->id . ' - ' . date('d-m-Y', strtotime($consultation->consultation_date)) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('consultation_id', '<small class="text-danger">', '</small>') ?>
            </div>

            <hr>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="quote_number">Quote Number</label>
                    <?= form_input(['name' => 'quote_number', 'id' => 'quote_number', 'class' => 'form-control', 'value' => set_value('quote_number', isset($quote) ? $quote->quote_number : ''), 'required' => 'required']) ?>
                    <?= form_error('quote_number', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="system_capacity">System Capacity (kW)</label>
                    <input type="number" name="system_capacity" id="system_capacity" class="form-control" min="0" value="<?= set_value('system_capacity', isset($quote) ? $quote->system_capacity : '') ?>" required>
                    <?= form_error('system_capacity', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="panel_type">Panel Type</label>
                    <?= form_input(['name' => 'panel_type', 'id' => 'panel_type', 'class' => 'form-control', 'value' => set_value('panel_type', isset($quote) ? $quote->panel_type : ''), 'required' => 'required']) ?>
                    <?= form_error('panel_type', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inverter_type">Inverter Type</label>
                    <?= form_input(['name' => 'inverter_type', 'id' => 'inverter_type', 'class' => 'form-control', 'value' => set_value('inverter_type', isset($quote) ? $quote->inverter_type : ''), 'required' => 'required']) ?>
                    <?= form_error('inverter_type', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
            
            <hr>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="total_cost">Total Cost (₹)</label>
                    <input type="number" step="0.01" name="total_cost" id="total_cost" class="form-control" min="0" value="<?= set_value('total_cost', isset($quote) ? $quote->total_cost : '') ?>" required>
                    <?= form_error('total_cost', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="discount_percent">Discount (%)</label>
                    <input type="number" step="0.01" name="discount_percent" id="discount_percent" class="form-control" min="0" max="100" value="<?= set_value('discount_percent', isset($quote) ? $quote->discount_percent : '0') ?>">
                    <?= form_error('discount_percent', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="final_cost">Final Cost (₹)</label>
                    <input type="number" step="0.01" name="final_cost" id="final_cost" class="form-control" min="0" value="<?= set_value('final_cost', isset($quote) ? $quote->final_cost : '') ?>" required>
                    <?= form_error('final_cost', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="warranty_years">Warranty (Years)</label>
                    <input type="number" name="warranty_years" id="warranty_years" class="form-control" min="0" value="<?= set_value('warranty_years', isset($quote) ? $quote->warranty_years : '25') ?>">
                    <?= form_error('warranty_years', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <?php $statuses = ['draft', 'sent', 'accepted', 'rejected']; ?>
                        <?php foreach ($statuses as $status): ?>
                            <option value="<?= $status ?>" <?= set_select('status', $status, isset($quote) && $quote->status == $status) ?>><?= ucfirst($status) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="valid_until">Valid Until</label>
                    <input type="date" name="valid_until" id="valid_until" class="form-control" required value="<?= set_value('valid_until', isset($quote) ? $quote->valid_until : '') ?>">
                    <?= form_error('valid_until', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <a href="<?= site_url('quotes') ?>" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary ml-2"><?= isset($quote) ? 'Update' : 'Save Quote' ?></button>
        </div>
        
        <?= form_close() ?>
    </div>
</div>