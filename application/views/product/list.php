<div style="margin-left: +75px;">

    <h2 class="page-title">Products</h2>

    <div class="card">
        <div class="card-header-table">
            <h5>All Products</h5>
            <a href="<?= site_url('product/add') ?>" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-plus"></i> Add New Product
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <head>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </head>
                <body>
                    <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= htmlspecialchars($p['name']) ?></td>
                        <td>₹<?= htmlspecialchars($p['price']) ?></td>
                        <td><?= htmlspecialchars(substr($p['description'], 0, 75)) . (strlen($p['description']) > 75 ? '...' : '') ?></td>
                        <td>
                            <?php if ($p['image']): ?>
                                <img src="<?= base_url($p['image']) ?>" class="product-thumb-table">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= site_url('product/view/' . $p['id']) ?>" class="btn btn-sm btn-primary">View</a>
                            <a href="<?= site_url('product/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= site_url('product/delete/' . $p['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete product?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </body>
            </table>
        </div>
    </div>

</div> ```

---

