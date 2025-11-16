<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!defined('BASE_URL')) {
    $calculatedBase = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
    if ($calculatedBase === '.' || $calculatedBase === '/') {
        $calculatedBase = '';
    }
    define('BASE_URL', $calculatedBase);
}

if (!defined('BOARDZONE_ADMIN_EMAIL')) {
    define('BOARDZONE_ADMIN_EMAIL', 'admin@boardzone.cz');
}

if (!defined('BOARDZONE_ADMIN_PASSWORD')) {
    define('BOARDZONE_ADMIN_PASSWORD', 'boardzone123');
}

if (!function_exists('boardzone_admin_redirect')) {
    function boardzone_admin_redirect(string $path): void
    {
        header('Location: ' . BASE_URL . $path);
        exit;
    }
}

if (!function_exists('boardzone_is_admin_logged_in')) {
    function boardzone_is_admin_logged_in(): bool
    {
        return !empty($_SESSION['admin_logged_in']);
    }
}

if (!function_exists('boardzone_log_in_admin')) {
    function boardzone_log_in_admin(string $email): void
    {
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = ['email' => $email];
    }
}

if (!function_exists('boardzone_log_out_admin')) {
    function boardzone_log_out_admin(): void
    {
        unset($_SESSION['admin_logged_in'], $_SESSION['admin_user']);
        session_regenerate_id(true);
    }
}

if (!function_exists('boardzone_require_admin')) {
    function boardzone_require_admin(): void
    {
        if (!boardzone_is_admin_logged_in()) {
            boardzone_admin_redirect('/admin_login.php');
        }
    }
}
