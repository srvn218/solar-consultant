<div class="products-section">
    <h2 class="section-title">Our Solar Products</h2>
    
    <?php if (!empty($products)): ?>
        <div class="products-grid">
            <?php foreach($products as $product): ?>
                <div class="product-card">
                    <?php if($product['image']): ?>
                    <div class="product-image">
                        <img src="<?= base_url($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    </div>
                    <?php endif; ?>
                    
                    <div class="product-content">
                        <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                        <div class="product-price">₹<?= htmlspecialchars($product['price']) ?></div>
                        
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="no-products">
            <p>No products found.</p>
        </div>
    <?php endif; ?>
</div>