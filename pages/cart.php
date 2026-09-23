<section class="page-hero">
    <div class="container"><p class="eyebrow">YOUR BAG</p><h1>Keranjang Belanja</h1><p>Daftar produk yang akan kamu checkout.</p></div>
</section>

<section class="section container">
<?php if (empty($_SESSION['cart'])): ?>
    <div class="empty-state"><h2>Keranjang masih kosong 🛒</h2><p>Yuk pilih parfum favoritmu.</p><a class="btn btn-dark" href="?page=catalog">Belanja Sekarang</a></div>
<?php else: ?>
    <form method="post">
        <input type="hidden" name="action" value="update_cart">
        <div class="cart-layout">
            <div class="cart-table">
                <?php foreach ($_SESSION['cart'] as $id => $qty): if (!isset($products[$id])) continue; $p=$products[$id]; ?>
                <div class="cart-row">
                    <img src="<?= e($p['image']) ?>" alt="<?= e($p['name']) ?>">
                    <div class="cart-product"><strong><?= e($p['name']) ?></strong><small><?= e($p['notes']) ?></small></div>
                    <strong><?= rupiah($p['price']) ?></strong>
                    <input class="qty" type="number" min="1" max="99" name="qty[<?= $id ?>]" value="<?= $qty ?>">
                    <strong><?= rupiah($p['price']*$qty) ?></strong>
                </div>
                <?php endforeach; ?>
                <button class="btn btn-outline">Simpan Perubahan</button>
            </div>
            <aside class="summary-card">
                <h3>Ringkasan</h3>
                <div><span>Subtotal</span><strong><?= rupiah(cart_subtotal()) ?></strong></div>
                <div><span>Ongkir</span><span>Dihitung checkout</span></div>
                <hr>
                <div class="summary-total"><span>Total</span><strong><?= rupiah(cart_subtotal()) ?></strong></div>
                <a class="btn btn-dark full" href="?page=checkout">Checkout</a>
            </aside>
        </div>
    </form>
<?php endif; ?>
</section>
