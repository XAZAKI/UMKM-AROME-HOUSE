<?php
$flash = get_flash();
$user = $_SESSION['user'] ?? null;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($page === 'home' ? 'ARÔME HOUSE' : ucfirst($page) . ' · ARÔME HOUSE') ?></title>
    <meta name="description" content="ARÔME HOUSE - e-commerce parfum dengan katalog, promo, wishlist, keranjang, checkout, pembayaran dan pengiriman.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="?page=home">
            <img src="assets/images/logo/AromeHouse.jpeg" alt="ARÔME HOUSE">
        </a>

        <nav class="main-nav">
            <a class="<?= $page==='home'?'active':'' ?>" href="?page=home">Beranda</a>
            <a class="<?= $page==='catalog'?'active':'' ?>" href="?page=catalog">Produk</a>
            <a class="<?= $page==='promo'?'active':'' ?>" href="?page=promo">Promo</a>
            <a class="<?= $page==='news'?'active':'' ?>" href="?page=news">Berita</a>
             <a class="<?= $page==='about'?'active':'' ?>" href="?page=about">Tentang Kami</a>
             <a class="<?= $page==='contact'?'active':'' ?>" href="?page=contact">Kontak</a>
        </nav>

        <div class="nav-actions">
            <form class="search-mini" action="?" method="get">
                <input type="hidden" name="page" value="catalog">
                <input name="q" value="<?= e($_GET['q'] ?? '') ?>" placeholder="Cari parfum...">
            </form>
            <a href="?page=account" aria-label="Akun">♙</a>
            <a href="?page=wishlist" aria-label="Wishlist">♡</a><a href="?page=tracking" aria-label="Tracking">⌁</a>
            <a class="cart-link" href="?page=cart" aria-label="Keranjang">🛒 <span><?= cart_count() ?></span></a>
        </div>
    </div>
</header>

<?php if ($flash): ?>
<div class="container flash <?= e($flash['type']) ?>"><?= e($flash['message']) ?></div>
<?php endif; ?>

<main>
