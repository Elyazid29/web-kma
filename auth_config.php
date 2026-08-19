<?php
// Akun tunggal untuk akses internal KMA. Ganti email dan hash password ini bila diperlukan.
const AUTH_EMAIL = 'kma25@gmail.com';
const AUTH_PASSWORD_HASH = '$2y$10$OAxE7SQALOaXJs5KFSMZgeEiZQtSmVmq7OeTdCGR4T29yQ9nd22su';
const AUTH_SESSION_TIMEOUT = 8 * 60 * 60;

function startAuthSession(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }
    session_set_cookie_params([
        'httponly' => true,
        'samesite' => 'Lax',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    ]);
    session_start();
}

function isAuthenticated(): bool
{
    startAuthSession();
    if (empty($_SESSION['kma_authenticated'])) {
        return false;
    }
    if (!empty($_SESSION['kma_login_at']) && (time() - (int) $_SESSION['kma_login_at']) > AUTH_SESSION_TIMEOUT) {
        logoutUser();
        return false;
    }
    return true;
}

function logoutUser(): void
{
    startAuthSession();
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
    session_destroy();
}