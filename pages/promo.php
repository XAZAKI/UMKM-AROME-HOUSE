<section class="page-hero">
    <div class="container">
        <p class="eyebrow">SPECIAL OFFER</p>
        <h1>Promo & Diskon</h1>
        <p>Daftar promo dan diskon yang sedang berlaku.</p>
    </div>
</section>

<section class="section container">
    <div class="promo-list">
        <?php foreach ($promos as $promo): ?>
            <article class="promo-item">
                <img src="<?= e($products[$promo['product_id']]['image']) ?>" alt="<?= e($promo['title']) ?>">
                <div>
                    <span class="discount"><?= e($promo['discount']) ?></span>
                    <h3><?= e($promo['title']) ?></h3>
                    <p><?= e($promo['desc']) ?></p>
                    <a class="btn btn-outline" href="?page=product&id=<?= $promo['product_id'] ?>">Lihat Detail →</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
