<h2 class="page-title">Edit Team Member</h2>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            Editing: <?= htmlspecialchars($member['name']) ?>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($member['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Qualification</label>
                    <input type="text" name="qualification" class="form-control" value="<?= htmlspecialchars($member['qualification']) ?>">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" value="<?= htmlspecialchars($member['age']) ?>" min="18" max="99">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="lead team" <?= $member['role']=='lead team'?'selected':'' ?> >Lead Team</option>
                        <option value="key worker" <?= $member['role']=='key worker'?'selected':'' ?>>Key Worker</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <?php if($member['image']): ?>
                        <img src="<?= base_url($member['image']) ?>" class="product-thumb-edit"><br>
                    <?php endif; ?>
                    <input type="file" name="image" class="form-control-file" accept="image/*">
                    <small class="form-text text-muted">Upload to replace the current image.</small>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Update Member</button>
                <a href="<?= site_url('team') ?>" class="btn btn-outline-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>