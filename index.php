<?php
session_start();

require_once __DIR__ . '/includes/data.php';
require_once __DIR__ . '/includes/helpers.php';

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (!isset($_SESSION['wishlist'])) $_SESSION['wishlist'] = [];
if (!isset($_SESSION['orders'])) $_SESSION['orders'] = [];

$page = $_GET['page'] ?? 'home';

$allowedPages = [
    'home', 'catalog', 'product', 'promo', 'news', 'wishlist',
    'cart', 'checkout', 'payment', 'delivery', 'tracking', 'register', 'login',
    'account', 'orders', 'about','contact'
];

if (!in_array($page, $allowedPages, true)) {
    $page = 'home';
}

/* ---------------- ACTIONS ---------------- */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add_cart') {
        $id = (int)($_POST['product_id'] ?? 0);
        $qty = max(1, (int)($_POST['qty'] ?? 1));

        if (isset($products[$id])) {
            $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $qty;
            flash('success', 'Produk berhasil ditambahkan ke keranjang.');
        }
        redirect($_SERVER['HTTP_REFERER'] ?? '?page=catalog');
    }

    if ($action === 'add_cart_checkout') {
        $id = (int)($_POST['product_id'] ?? 0);
        $qty = max(1, (int)($_POST['qty'] ?? 1));
        if (isset($products[$id])) {
            $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $qty;
            flash('success', 'Produk ditambahkan. Silakan lanjut checkout.');
        }
        redirect('?page=checkout');
    }

    if ($action === 'update_cart') {
        foreach (($_POST['qty'] ?? []) as $id => $qty) {
            $id = (int)$id;
            $qty = (int)$qty;
            if ($qty <= 0) {
                unset($_SESSION['cart'][$id]);
            } elseif (isset($products[$id])) {
                $_SESSION['cart'][$id] = min($qty, 99);
            }
        }
        flash('success', 'Keranjang diperbarui.');
        redirect('?page=cart');
    }

    if ($action === 'remove_cart') {
        $id = (int)($_POST['product_id'] ?? 0);
        unset($_SESSION['cart'][$id]);
        flash('success', 'Produk dihapus dari keranjang.');
        redirect('?page=cart');
    }

    if ($action === 'wishlist_toggle') {
        $id = (int)($_POST['product_id'] ?? 0);
        if (isset($products[$id])) {
            if (in_array($id, $_SESSION['wishlist'], true)) {
                $_SESSION['wishlist'] = array_values(array_diff($_SESSION['wishlist'], [$id]));
                flash('success', 'Produk dihapus dari wishlist.');
            } else {
                $_SESSION['wishlist'][] = $id;
                flash('success', 'Produk disimpan ke wishlist.');
            }
        }
        redirect($_SERVER['HTTP_REFERER'] ?? '?page=catalog');
    }

    if ($action === 'login') {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($email !== '' && $password !== '') {
            $_SESSION['user'] = [
                'name' => 'Fina Herlinda',
                'email' => $email,
                'phone' => '0812 3456 7890'
            ];
            flash('success', 'Login berhasil. Selamat datang kembali!');
            redirect('?page=account');
        }

        flash('error', 'Email dan password wajib diisi.');
        redirect('?page=login');
    }

    if ($action === 'register') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 6) {
            $_SESSION['user'] = [
                'name' => $name,
                'email' => $email,
                'phone' => ''
            ];
            flash('success', 'Registrasi berhasil. Akun kamu sudah aktif.');
            redirect('?page=account');
        }

        flash('error', 'Lengkapi data dengan benar. Password minimal 6 karakter.');
        redirect('?page=register');
    }


    if ($action === 'save_account') {
        if (!isset($_SESSION['user'])) redirect('?page=login');

        $_SESSION['user']['name'] = trim($_POST['name'] ?? $_SESSION['user']['name']);
        $_SESSION['user']['phone'] = trim($_POST['phone'] ?? '');
        $_SESSION['user']['email'] = trim($_POST['email'] ?? $_SESSION['user']['email']);

        flash('success', 'Profil berhasil diperbarui.');
        redirect('?page=account');
    }

    if ($action === 'checkout') {
        if (!isset($_SESSION['user'])) {
            flash('error', 'Silakan login terlebih dahulu untuk checkout.');
            redirect('?page=login');
        }

        if (empty($_SESSION['cart'])) {
            flash('error', 'Keranjang masih kosong.');
            redirect('?page=cart');
        }

        $method = $_POST['payment_method'] ?? 'Transfer Bank';
        $shipping = $_POST['shipping_method'] ?? 'Reguler (2–4 hari)';
        $address = trim($_POST['address'] ?? '');

        if ($address === '') {
            flash('error', 'Alamat pengiriman wajib diisi.');
            redirect('?page=checkout');
        }

        $subtotal = cart_subtotal();
        $shippingCost = shipping_cost($shipping);
        $grandTotal = $subtotal + $shippingCost;

        $_SESSION['orders'][] = [
            'id' => 'AH-' . date('YmdHis'),
            'date' => date('d M Y H:i'),
            'items' => $_SESSION['cart'],
            'subtotal' => $subtotal,
            'shipping' => $shippingCost,
            'total' => $grandTotal,
            'payment' => $method,
            'shipping_method' => $shipping,
            'address' => $address,
            'status' => 'Diproses'
        ];

        $_SESSION['cart'] = [];
        flash('success', 'Pesanan berhasil dibuat. Terima kasih sudah berbelanja!');
        redirect('?page=orders');
    }

    if ($action === 'logout') {
        unset($_SESSION['user']);
        flash('success', 'Kamu sudah logout.');
        redirect('?page=home');
    }
}

/* ---------------- VIEW ---------------- */

require __DIR__ . '/includes/header.php';

if ($page === 'product') {
    require __DIR__ . '/pages/product.php';
} else {
    require __DIR__ . '/pages/' . $page . '.php';
}

require __DIR__ . '/includes/footer.php';
?>
