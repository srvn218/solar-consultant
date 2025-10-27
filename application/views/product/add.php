<h2 class="page-title">Add New Product</h2>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            Add Product Details
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" step="0.01" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file" accept="image/*">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Add Product</button>
                <a href="<?= site_url('product') ?>" class="btn btn-outline-secondary ml-2">Cancel</a>
            </form>
        </div>
    </div>
</div>