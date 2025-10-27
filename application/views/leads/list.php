
<div style="margin-left: +75px;">
<h2 class="page-title">Leads</h2>

<div class="card">
    <div class="card-header-table">
        <h5>All Leads</h5>
        <a href="<?= site_url('leads/form') ?>" class="btn btn-primary btn-sm">
            <i class="fa-solid fa-plus"></i> Add New Lead
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover" id="leads-table">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>WhatsApp</th>
                    <th>Pincode</th>
                    <th>Avg Monthly Bill</th>
                    <th>Status</th>
                    <th>Interest Level</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </head>
            <body>
                <?php foreach($leads as $lead): ?>
                <tr id="lead-row-<?= $lead['id'] ?>"<?= $lead['highlighted'] ? ' class="highlighted-lead-row"' : '' ?>>
                    <td><?= $lead['id'] ?></td>
                    <td><?= htmlspecialchars($lead['full_name']) ?></td>
                    <td><?= htmlspecialchars($lead['whatsapp']) ?></td>
                    <td><?= htmlspecialchars($lead['pincode']) ?></td>
                    <td><?= htmlspecialchars($lead['avg_monthly_bill']) ?></td>
                    <td><?= htmlspecialchars($lead['status']) ?></td>
                    <td>
                        <form method="post" action="<?=site_url('leads/set_interest/'.$lead['id'])?>">
                            <select name="interest_level" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="low" <?= $lead['interest_level']=='low'?'selected':'' ?>>Low</option>
                                <option value="medium" <?= $lead['interest_level']=='medium'?'selected':'' ?>>Medium</option>
                                <option value="high" <?= $lead['interest_level']=='high'?'selected':'' ?>>High</option>
                            </select>
                        </form>
                    </td>
                    <td><?= htmlspecialchars($lead['created_at']) ?></td>
                    <td>
                      <a href="<?= site_url('leads/view/' . $lead['id']) ?>" 
               class="btn btn-sm btn-primary" 
               title="View Lead">
                <i class="fa-solid fa-eye"></i>view
            </a>
         <a href="<?= site_url('leads/highlight/'.$lead['id']) ?>" class="action-btn">
                            <span style="color: #14ca21; font-size: 1.2rem;"><?= $lead['highlighted'] ? '★' : '☆' ?></span>
                        </a>

                        <a href="<?= site_url('leads/delete/' . $lead['id']) ?>" class="action-btn" onclick="return confirm('Delete this lead?');">
                            <span style="color:#e23c20; font-size: 1.2rem;">&#128465;</span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </body>
        </table>

        
    </div>
</div>