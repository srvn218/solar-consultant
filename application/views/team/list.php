<div style="margin-left: +75px;">
<h2 class="page-title">Team Members</h2>

<div class="card">
    <div class="card-header-table">
        <h5>All Team Members</h5>
        <a href="<?= site_url('team/add') ?>" class="btn btn-primary btn-sm">
            <i class="fa-solid fa-plus"></i> Add New Member
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Age</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
</head>
            <body>
                <?php foreach($team as $tm): ?>
                <tr>
                    <td><?= $tm['id'] ?></td>
                    <td><?= htmlspecialchars($tm['name']) ?></td>
                    <td><?= htmlspecialchars($tm['qualification']) ?></td>
                    <td><?= htmlspecialchars($tm['age']) ?></td>
                    <td><?= htmlspecialchars(ucwords($tm['role'])) ?></td>
                    <td>
                        <?php if($tm['image']): ?>
                            <img src="<?= base_url($tm['image']) ?>" class="product-thumb-table">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= site_url('team/edit/'.$tm['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('team/delete/'.$tm['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </body>
        </table>
    </div>
</div>
</div>