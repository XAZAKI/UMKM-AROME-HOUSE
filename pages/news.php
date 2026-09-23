<?php
$selectedCategory = $_GET['category'] ?? 'Semua';
$articleId = (int)($_GET['id'] ?? 0);

if ($articleId > 0) {
    $article = null;
    foreach ($news as $item) {
        if ((int)$item['id'] === $articleId) { $article = $item; break; }
    }
}
$newsCategories = ['Semua','Tren','Industri','Tips'];
$filteredNews = array_filter($news, function($item) use ($selectedCategory) {
    return $selectedCategory === 'Semua' || $item['category'] === $selectedCategory;
});
?>
<?php if ($articleId > 0 && !empty($article)): ?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">ARÔME JOURNAL · <?= e($article['category']) ?></p>
        <h1><?= e($article['title']) ?></h1>
        <p><?= e($article['date']) ?></p>
    </div>
</section>
<section class="section container article-detail">
    <a class="back-link" href="?page=news">← Kembali ke artikel</a>
    <div class="article-detail-image"></div>
    <span class="tag"><?= e($article['category']) ?></span>
    <h2><?= e($article['title']) ?></h2>
    <p class="article-lead"><?= e($article['excerpt']) ?></p>
    <p><?= e($article['content']) ?></p>
    <p>Di ARÔME HOUSE, pemilihan parfum dibuat lebih mudah dengan melihat karakter aroma, kebutuhan aktivitas, dan preferensi pribadi. Jelajahi katalog untuk menemukan pilihan yang sesuai.</p>
    <a class="btn btn-dark" href="?page=catalog">Lihat Produk</a>
</section>
<?php else: ?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">ARÔME JOURNAL</p>
        <h1>Berita & Artikel Seputar Dunia Parfum</h1>
        <p>Informasi tren, tips, dan perkembangan industri parfum.</p>
    </div>
</section>
<section class="section container">
    <div class="news-layout">
        <aside class="filter-panel">
            <h3>Kategori Artikel</h3>
            <?php foreach ($newsCategories as $cat): ?>
                <a class="<?= $selectedCategory === $cat ? 'active' : '' ?>" href="?page=news&category=<?= urlencode($cat) ?>"><?= e($cat) ?></a>
            <?php endforeach; ?>
        </aside>
        <div class="article-list">
            <?php foreach ($filteredNews as $item): ?>
            <article class="article-row">
                <a href="?page=news&id=<?= (int)$item['id'] ?>" class="article-image" aria-label="Buka <?= e($item['title']) ?>"></a>
                <div>
                    <a href="?page=news&category=<?= urlencode($item['category']) ?>" class="tag"><?= e($item['category']) ?></a>
                    <small><?= e($item['date']) ?></small>
                    <h2><a href="?page=news&id=<?= (int)$item['id'] ?>"><?= e($item['title']) ?></a></h2>
                    <p><?= e($item['excerpt']) ?></p>
                    <a href="?page=news&id=<?= (int)$item['id'] ?>">Baca Artikel →</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
