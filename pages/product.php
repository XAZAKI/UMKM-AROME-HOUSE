<?php
$id = (int)($_GET['id'] ?? 1);
$product = $products[$id] ?? reset($products);
$id = array_search($product, $products, true);
?>
<section class="section container">
    <a class="back-link" href="?page=catalog">← Kembali ke katalog</a>
    <div class="detail-grid">
        <div class="detail-gallery">
            <img src="<?= e($product['image']) ?>" alt="<?= e($product['name']) ?>">
            <div class="thumbs">
                <?php for ($i=0; $i<4; $i++): ?><img src="<?= e($product['image']) ?>" alt="Thumbnail"><?php endfor; ?>
            </div>
        </div>
        <div class="detail-info">
            <span class="tag"><?= e($product['category']) ?></span>
            <h1><?= e($product['name']) ?></h1>
            <div class="rating">★★★★★ <span><?= e($product['rating']) ?></span></div>
            <div class="detail-price"><?= rupiah($product['price']) ?> <del><?= rupiah($product['old_price']) ?></del></div>
            <p><?= e($product['description']) ?></p>
            <div class="note-box"><strong>Aroma Notes</strong><br><?= e($product['notes']) ?></div>
            <div class="qty-row">
                <form method="post" class="add-detail">
                    <input type="hidden" name="action" value="add_cart">
                    <input type="hidden" name="product_id" value="<?= $id ?>">
                    <label>Jumlah <input type="number" name="qty" min="1" value="1"></label>
                    <button class="btn btn-outline">Tambah ke Keranjang</button>
                </form>
                <form method="post">
                    <input type="hidden" name="action" value="add_cart_checkout">
                    <input type="hidden" name="product_id" value="<?= $id ?>">
                    <input type="hidden" name="qty" value="1">
                    <button class="btn btn-dark">Checkout Sekarang</button>
                </form>
                <form method="post">
                    <input type="hidden" name="action" value="wishlist_toggle">
                    <input type="hidden" name="product_id" value="<?= $id ?>">
                    <button class="btn btn-outline"><?= is_wishlisted($id) ? '♥ Tersimpan' : '♡ Wishlist' ?></button>
                </form>
            </div>
            <div class="benefit-list">
                <span>✓ 100% Original</span>
                <span>✓ Pengiriman Cepat</span>
                <span>✓ Kemasan Aman</span>
            </div>
            <details><summary>Detail Produk</summary><p>Volume <?= e($product['volume']) ?> · Unisex · Eau de Parfum.</p></details>
            <details><summary>Cara Penggunaan</summary><p>Semprotkan pada titik nadi seperti pergelangan tangan dan leher.</p></details>
</div>
    </div>
</section>
