<h2 class="page-title">Edit Product</h2>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            Editing: <?= htmlspecialchars($product['name']) ?>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" step="0.01" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($product['description']) ?></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <?php if($product['image']): ?>
                        <img src="<?= base_url($product['image']) ?>" alt="Current" class="product-thumb-edit">
                    <?php endif; ?>
                    <input type="file" name="image" class="form-control-file" accept="image/*">
                    <small class="form-text text-muted">Upload to replace the current image.</small>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?= site_url('product') ?>" class="btn btn-outline-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>