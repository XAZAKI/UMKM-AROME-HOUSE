<section class="hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <p class="eyebrow">ARÔME HOUSE</p>
        <h1>More than a scent,<br>it's a feeling.</h1>
        <p>Setiap aroma punya cerita,<br>temukan yang paling menggambarkan dirimu.</p>
        <a class="btn btn-light" href="?page=catalog">Shop Now →</a>
    </div>
</section>

<section class="trust">
    <div>🚚 <strong>Pengiriman Cepat</strong><small>Nasional & aman</small></div>
    <div>♢ <strong>Produk Original</strong><small>100% authentic</small></div>
    <div>▣ <strong>Pembayaran Aman</strong><small>Berbagai metode</small></div>
    <div>♧ <strong>Customer Support</strong><small>Siap membantu</small></div>
</section>

<section class="section container">
    <div class="section-head">
        <div><p class="eyebrow">EXPLORE</p><h2>Kategori Parfum</h2></div>
        <a href="?page=catalog">Lihat Semua →</a>
    </div>
    <div class="category-row">
        <?php foreach ($genderCategories as $cat): ?>
            <a href="?page=catalog&gender=<?= urlencode($cat) ?>" class="category-pill"><?= e($cat) ?></a>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-head">
            <div><p class="eyebrow">OUR PICKS</p><h2>Produk Unggulan</h2></div>
            <a href="?page=catalog">Lihat Semua →</a>
        </div>
        <div class="product-grid">
            <?php foreach (array_slice($products, 0, 4, true) as $id => $product): ?>
                <?php include __DIR__ . '/product-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="container ad-slider" aria-label="Iklan promosi">
    <div class="ad-slides">
        <article class="ad-slide active">
            <div class="ad-copy"><p class="eyebrow">SPECIAL PROMO · 01</p><h2>Up to 30% OFF</h2><p>Temukan aroma favoritmu dengan harga spesial.</p><a class="btn btn-light" href="?page=promo">Lihat Promo →</a></div>
            <img src="assets/images/products/amber-dusk.svg" alt="Amber Dusk">
        </article>
        <article class="ad-slide">
            <div class="ad-copy"><p class="eyebrow">NEW COLLECTION · 02</p><h2>Find Your Signature Scent</h2><p>Eksplorasi parfum wanita, pria, dan unisex.</p><a class="btn btn-light" href="?page=catalog">Lihat Produk →</a></div>
            <img src="assets/images/products/moss-mist.svg" alt="Moss & Mist">
        </article>
        <article class="ad-slide">
            <div class="ad-copy"><p class="eyebrow">SPECIAL CAMPAIGN · 03</p><h2>Buy 2 Get 1</h2><p>Promo pilihan untuk koleksi Velvet Bloom.</p><a class="btn btn-light" href="?page=promo">Belanja Sekarang →</a></div>
            <img src="assets/images/products/velvet-bloom.svg" alt="Velvet Bloom">
        </article>
    </div>
    <div class="ad-dots">
        <button class="ad-dot active" data-slide="0" aria-label="Iklan 1"></button>
        <button class="ad-dot" data-slide="1" aria-label="Iklan 2"></button>
        <button class="ad-dot" data-slide="2" aria-label="Iklan 3"></button>
    </div>
</section>

<section class="section container">
    <div class="section-head">
        <div><p class="eyebrow">DISCOVER</p><h2>Berita Terkait Produk</h2></div>
        <a href="?page=news">Lihat Semua →</a>
    </div>
    <div class="news-grid">
        <?php foreach (array_slice($news, 0, 3) as $item): ?>
        <article class="news-card">
            <div class="news-image"></div>
            <div class="news-body">
                <span class="tag"><?= e($item['category']) ?></span>
                <h3><?= e($item['title']) ?></h3>
                <small><?= e($item['date']) ?></small>
                <a href="?page=news&id=<?= (int)$item['id'] ?>">Baca selengkapnya →</a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="cta container">
    <div>
        <p class="eyebrow">ARÔME HOUSE</p>
        <h2>A fragrance for every story.</h2>
        <p>Temukan signature scent yang sesuai dengan cerita kamu.</p>
    </div>
    <a class="btn btn-light" href="?page=catalog">Shop Now →</a>
</section>
