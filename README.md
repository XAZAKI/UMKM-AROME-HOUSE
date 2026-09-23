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
- Ulasan produk + rating
- Session sebagai penyimpanan sementara

## Cara menjalankan
1. Install XAMPP/Laragon.
2. Salin folder `arome_house_php` ke:
   - XAMPP: `htdocs/`
   - Laragon: `www/`
3. Jalankan Apache.
4. Buka:
   `http://localhost/arome_house_php/`

Tidak membutuhkan MySQL dan tidak ada `database.sql`.

## Catatan
Data produk berada di `includes/data.php`.
Data keranjang, wishlist, akun demo, dan pesanan disimpan sementara menggunakan PHP Session.

Untuk versi produksi, session dapat diganti dengan MySQL dan autentikasi/password hashing yang lebih lengkap.

## Folder gambar

Semua gambar produk dipisahkan di:
`assets/images/products/`

Logo dipisahkan di:
`assets/images/logo/`

File logo yang dipakai header:
`assets/images/logo/arome-house-logo.svg`

Untuk memakai foto parfum asli, cukup ganti file SVG produk di folder tersebut dan sesuaikan nama/path pada `includes/data.php` bila menggunakan JPG/PNG.


## Update versi ini
- Kategori parfum: Wanita, Pria, Unisex
- Product card memiliki 2 CTA: Keranjang dan Checkout
- Iklan beranda menggunakan slider otomatis + dot navigation
- Kategori artikel bisa diklik untuk filter
- Setiap artikel bisa diklik untuk membuka detail artikel
- Ulasan produk dihapus dari halaman detail sesuai permintaan
