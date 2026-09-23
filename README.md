# ARÔME HOUSE — PHP E-Commerce Frontend

Project e-commerce parfum berbasis **PHP native tanpa database**.

## Fitur

- Beranda + banner promosi
- Katalog produk
- Detail produk
- Add to Cart
- Wishlist
- Promo / Diskon
- Berita & artikel
- Keranjang
- Checkout
- Payment + QRIS demo
- Delivery / COD
- Tracking pesanan
- Iklan/banner campaign
- Register & Login
- Akun pengguna
- Riwayat pesanan
- Contact
- Session sebagai penyimpanan sementara

## Cara Menjalankan

1. Install XAMPP/Laragon.
2. Salin folder `arome_house_php` ke:
   - XAMPP: `htdocs/`
   - Laragon: `www/`
3. Jalankan Apache.
4. Buka `http://localhost/arome_house_php/`.

Tidak membutuhkan MySQL dan tidak ada `database.sql`.

## Catatan

- Data produk berada di `includes/data.php`.
- Data keranjang, wishlist, akun demo, dan pesanan disimpan sementara menggunakan PHP Session.
- Untuk versi produksi, session dapat diganti dengan MySQL dan autentikasi/password hashing yang lebih lengkap.

## Folder Gambar

- Produk: `assets/images/products/`
- Logo: `assets/images/logo/`
- Logo header: `assets/images/logo/arome-house-logo.svg`

## Update Versi Ini

- Kategori parfum: Wanita, Pria, Unisex.
- Product card memiliki 2 CTA: Keranjang dan Checkout.
- Iklan beranda menggunakan slider otomatis + dot navigation.
- Kategori artikel bisa diklik untuk filter.
- Setiap artikel bisa diklik untuk membuka detail artikel.
- Ulasan produk dihapus dari halaman detail.