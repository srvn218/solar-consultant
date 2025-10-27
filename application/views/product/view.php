<h2 class="page-title">View Product</h2>

<div class="form-container">
    <div class="card">
        <div class="card-header">
            Product Details
        </div>
        <div class="card-body">
            <dl class="row product-view-dl">
                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9"><?= htmlspecialchars($product['name']) ?></dd>

                <dt class="col-sm-3">Price</dt>
                <dd class="col-sm-9">₹<?= htmlspecialchars($product['price']) ?></dd>

                <dt class="col-sm-3">Description</dt>
                <dd class="col-sm-9">
                    <p style="white-space: pre-wrap;"><?= htmlspecialchars($product['description']) ?></p>
                </dd>

                <dt class="col-sm-3">Image</dt>
                <dd class="col-sm-9">
                    <?php if($product['image']): ?>
                        <img src="<?= base_url($product['image']) ?>" class="product-thumb-view"> 
                    <?php else: ?>
                        <span class="text-muted">No image</span>
                    <?php endif; ?>
                </dd>
            </dl>
        </div>
        <div class="card-footer text-right">
            <a href="<?= site_url('product') ?>" class="btn btn-outline-secondary">Back to List</a>
            <a href="<?= site_url('product/edit/' . $product['id']) ?>" class="btn btn-warning ml-2">Edit This Product</a>
        </div>
    </div>
</div>