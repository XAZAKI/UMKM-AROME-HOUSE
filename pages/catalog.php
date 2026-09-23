<?php
$q = trim($_GET['q'] ?? '');
$gender = $_GET['gender'] ?? 'Semua';
$category = $_GET['category'] ?? 'Semua';
$sort = $_GET['sort'] ?? '';

$filtered = array_filter($products, function($p) use ($q, $gender, $category) {
    $matchQ = $q === '' || stripos($p['name'].' '.$p['category'].' '.$p['notes'], $q) !== false;
    $matchGender = $gender === 'Semua' || $p['gender'] === $gender;
    $matchCategory = $category === 'Semua' || $p['category'] === $category;
    return $matchQ && $matchGender && $matchCategory;
});

if ($sort === 'low') uasort($filtered, fn($a,$b) => $a['price'] <=> $b['price']);
if ($sort === 'high') uasort($filtered, fn($a,$b) => $b['price'] <=> $a['price']);
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow">COLLECTION</p>
        <h1>Catalog Parfum</h1>
        <p>Temukan parfum wanita, pria, dan unisex sesuai karakter aroma yang kamu suka.</p>
    </div>
</section>

<section class="section container catalog-layout">
    <aside class="filter-panel">
        <h3>Jenis Parfum</h3>
        <?php foreach ($genderCategories as $item): ?>
            <a class="<?= $gender === $item ? 'active' : '' ?>" href="?page=catalog&gender=<?= urlencode($item) ?>"><?= e($item) ?></a>
        <?php endforeach; ?>
        <hr>
        <h3>Kategori Aroma</h3>
        <?php foreach ($categories as $item): ?>
            <a class="<?= $category === $item ? 'active' : '' ?>" href="?page=catalog&category=<?= urlencode($item) ?>"><?= e($item) ?></a>
        <?php endforeach; ?>
    </aside>

    <div>
        <div class="catalog-top">
            <div><strong><?= count($filtered) ?></strong> produk ditemukan</div>
            <form method="get">
                <input type="hidden" name="page" value="catalog">
                <input type="hidden" name="gender" value="<?= e($gender) ?>">
                <input type="hidden" name="category" value="<?= e($category) ?>">
                <select name="sort" onchange="this.form.submit()">
                    <option value="">Terbaru</option>
                    <option value="low" <?= $sort==='low'?'selected':'' ?>>Harga terendah</option>
                    <option value="high" <?= $sort==='high'?'selected':'' ?>>Harga tertinggi</option>
                </select>
            </form>
        </div>
        <div class="product-grid">
            <?php if (!$filtered): ?>
                <div class="empty-state"><h3>Produk tidak ditemukan</h3><p>Coba kata kunci atau kategori lain.</p></div>
            <?php else: ?>
                <?php foreach ($filtered as $id => $product): ?>
                    <?php include __DIR__ . '/product-card.php'; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
