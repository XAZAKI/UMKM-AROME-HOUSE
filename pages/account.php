<?php require_login(); ?>
<section class="page-hero"><div class="container"><p class="eyebrow">MY ACCOUNT</p><h1>Akun Pengguna</h1><p>Pengaturan profil, password, dan preferensi notifikasi.</p></div></section>
<section class="section container account-layout">
    <aside class="account-menu">
        <a class="active" href="?page=account">Profil Saya</a>
        <a href="#password">Ganti Password</a>
        <a href="#notifications">Preferensi Notifikasi</a>
        <a href="?page=orders">Riwayat Pesanan</a>
        <a href="?page=delivery">Alamat Pengiriman</a>
        <form method="post"><input type="hidden" name="action" value="logout"><button>Logout</button></form>
    </aside>
    <div>
        <div class="form-card">
            <h2>Pengaturan Profil</h2>
            <form method="post">
                <input type="hidden" name="action" value="save_account">
                <label>Nama Lengkap<input name="name" value="<?= e($_SESSION['user']['name']) ?>"></label>
                <label>Email<input name="email" value="<?= e($_SESSION['user']['email']) ?>"></label>
                <label>No. Handphone<input name="phone" value="<?= e($_SESSION['user']['phone']) ?>"></label>
                <button class="btn btn-dark">Simpan Perubahan</button>
            </form>
        </div>
        <div class="form-card" id="password"><h2>Ganti Password</h2><label>Password Lama<input type="password"></label><label>Password Baru<input type="password"></label><button class="btn btn-outline">Perbarui Password</button></div>
        <div class="form-card" id="notifications"><h2>Preferensi Notifikasi</h2><label class="toggle"><input type="checkbox" checked> Promo dan diskon</label><label class="toggle"><input type="checkbox" checked> Status pesanan</label><label class="toggle"><input type="checkbox"> Berita parfum</label></div>
    </div>
</section>
