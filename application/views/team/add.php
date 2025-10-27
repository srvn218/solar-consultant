<h2 class="page-title">Add Team Member</h2>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            Add Member Details
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Qualification</label>
                    <input type="text" name="qualification" class="form-control">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" min="18" max="99">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="" disabled selected>Select a role</option>
                        <option value="lead team">Lead Team</option>
                        <option value="key worker">Key Worker</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file" accept="image/*">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Add Member</button>
                <a href="<?= site_url('team') ?>" class="btn btn-outline-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>