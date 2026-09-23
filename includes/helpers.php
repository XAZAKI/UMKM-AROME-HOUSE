<?php
function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function rupiah($number): string {
    return 'Rp ' . number_format((float)$number, 0, ',', '.');
}

function redirect($url): never {
    header('Location: ' . $url);
    exit;
}

function flash($type, $message): void {
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash(): ?array {
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

function cart_count(): int {
    return array_sum($_SESSION['cart'] ?? []);
}

function cart_subtotal(): float {
    global $products;
    $total = 0;
    foreach ($_SESSION['cart'] ?? [] as $id => $qty) {
        if (isset($products[$id])) {
            $total += $products[$id]['price'] * $qty;
        }
    }
    return $total;
}

function shipping_cost(string $method): int {
    global $shippingMethods;
    return $shippingMethods[$method] ?? 0;
}

function is_wishlisted(int $id): bool {
    return in_array($id, $_SESSION['wishlist'] ?? [], true);
}

function require_login(): void {
    if (!isset($_SESSION['user'])) {
        flash('error', 'Silakan login terlebih dahulu.');
        redirect('?page=login');
    }
}
?>
