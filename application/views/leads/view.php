<h2 class="page-title">Lead Details</h2>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            Details for Lead #<?= $lead['id'] ?>
        </div>
        <div class="card-body">
            <dl class="row product-view-dl">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9"><?= $lead['id'] ?></dd>

                <dt class="col-sm-3">Full Name</dt>
                <dd class="col-sm-9"><?= html_escape($lead['full_name']) ?></dd>

                <dt class="col-sm-3">WhatsApp</dt>
                <dd class="col-sm-9"><?= html_escape($lead['whatsapp']) ?></dd>
                
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9"><?= html_escape($lead['email']) ?></dd>
                
                <dt class="col-sm-3">Pincode</dt>
                <dd class="col-sm-9"><?= html_escape($lead['pincode']) ?></dd>

                <dt class="col-sm-3">Avg. Monthly Bill</dt>
                <dd class="col-sm-9"><?= html_escape($lead['avg_monthly_bill']) ?></dd>

                <dt class="col-sm-3">Interest Level</dt>
                <dd class="col-sm-9"><?= ucfirst($lead['interest_level']) ?></dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9"><?= ucfirst($lead['status']) ?></dd>

                <dt class="col-sm-3">Created At</dt>
                <dd class="col-sm-9"><?= date('Y-m-d H:i', strtotime($lead['created_at'])) ?></dd>
            </dl>
        </div>
        <div class="card-footer text-right">
            <a href="<?= site_url('leads') ?>" class="btn btn-outline-secondary">Back to List</a>
       </div>
    </div>
</div>