<?php require_login(); ?>
<section class="page-hero"><div class="container"><p class="eyebrow">ORDER HISTORY</p><h1>Riwayat Pesanan</h1><p>Daftar pesanan yang pernah dilakukan oleh pengguna.</p></div></section>
<section class="section container">
<?php if (empty($_SESSION['orders'])): ?>
    <div class="empty-state"><h2>Belum ada pesanan</h2><p>Pesanan yang kamu buat akan muncul di sini.</p><a class="btn btn-dark" href="?page=catalog">Mulai Belanja</a></div>
<?php else: ?>
    <div class="order-list">
    <?php foreach (array_reverse($_SESSION['orders']) as $order): ?>
        <article class="order-card">
            <div class="order-head"><strong><?= e($order['id']) ?></strong><span><?= e($order['date']) ?></span><span class="status"><?= e($order['status']) ?></span></div>
            <div class="order-body">
                <div><strong><?= count($order['items']) ?> jenis produk</strong><p><?= e($order['shipping_method']) ?> · <?= e($order['payment']) ?></p></div>
                <div class="order-actions"><strong><?= rupiah($order['total']) ?></strong><a class="btn btn-outline" href="?page=tracking&id=<?= urlencode($order['id']) ?>">Tracking</a></div>
            </div>
            <details><summary>Lihat Detail</summary><p>Alamat: <?= e($order['address']) ?></p></details>
        </article>
    <?php endforeach; ?>
    </div>
<?php endif; ?>
</section>
