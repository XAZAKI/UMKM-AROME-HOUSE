<?php require_login(); ?>
<section class="page-hero">
    <div class="container"><p class="eyebrow">ORDER</p><h1>Checkout</h1><p>Periksa alamat, pengiriman, dan pembayaran sebelum pesanan dibuat.</p></div>
</section>

<section class="section container">
    <?php if (empty($_SESSION['cart'])): ?>
        <div class="empty-state"><h2>Keranjang kosong</h2><a class="btn btn-dark" href="?page=catalog">Kembali ke Produk</a></div>
    <?php else: ?>
    <form method="post" class="checkout-grid">
        <input type="hidden" name="action" value="checkout">
        <div>
            <div class="form-card">
                <h2>Alamat Pengiriman</h2>
                <label>Nama Penerima<input value="<?= e($_SESSION['user']['name']) ?>" disabled></label>
                <label>Nomor HP<input value="<?= e($_SESSION['user']['phone']) ?>" disabled></label>
                <label>Alamat Lengkap<textarea name="address" placeholder="Jl. ..., RT/RW, Kecamatan, Kota, Kode Pos" required></textarea></label>
            </div>
            <div class="form-card">
                <h2>Metode Pengiriman</h2>
                <?php foreach ($shippingMethods as $method => $cost): ?>
                    <label class="option"><input type="radio" name="shipping_method" value="<?= e($method) ?>" <?= $method === array_key_first($shippingMethods) ? 'checked' : '' ?>><span><?= e($method) ?></span><strong><?= rupiah($cost) ?></strong></label>
                <?php endforeach; ?>
            </div>
            <div class="form-card">
                <h2>Metode Pembayaran</h2>
                <?php foreach ($paymentMethods as $method): ?>
                    <label class="option"><input type="radio" name="payment_method" value="<?= e($method) ?>" <?= $method === $paymentMethods[0] ? 'checked' : '' ?>><span><?= e($method) ?></span></label>
                <?php endforeach; ?>
            </div>
        </div>
        <aside class="summary-card sticky">
            <h3>Ringkasan Pesanan</h3>
            <?php foreach ($_SESSION['cart'] as $id=>$qty): if(isset($products[$id])): ?>
                <div><span><?= e($products[$id]['name']) ?> × <?= $qty ?></span><strong><?= rupiah($products[$id]['price']*$qty) ?></strong></div>
            <?php endif; endforeach; ?>
            <hr>
            <div><span>Subtotal</span><strong><?= rupiah(cart_subtotal()) ?></strong></div>
            <div><span>Ongkir</span><span>Sesuai pilihan</span></div>
            <div class="summary-total"><span>Total awal</span><strong><?= rupiah(cart_subtotal()) ?></strong></div>
            <button class="btn btn-dark full" type="submit">Buat Pesanan</button>
        </aside>
    </form>
    <?php endif; ?>
</section>
