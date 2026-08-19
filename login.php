<?php
require_once __DIR__ . '/auth_config.php';
startAuthSession();

if (isAuthenticated()) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $password = (string) ($_POST['password'] ?? '');

    if (hash_equals(AUTH_EMAIL, $email) && password_verify($password, AUTH_PASSWORD_HASH)) {
        session_regenerate_id(true);
        $_SESSION['kma_authenticated'] = true;
        $_SESSION['kma_login_at'] = time();
        header('Location: index.php');
        exit;
    }
    $error = 'Email atau password tidak sesuai.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Internal - KMA XXV 2026</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root { color-scheme: light; font-family: Inter, Arial, sans-serif; }
    * { box-sizing: border-box; }
    body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 24px; color: #0f172a; background: radial-gradient(circle at 15% 10%, #dbeafe 0, transparent 35%), linear-gradient(135deg, #071b3a, #0f766e); }
    .login-card { width: min(100%, 430px); padding: 42px 38px; background: rgba(255,255,255,.97); border-radius: 24px; box-shadow: 0 24px 70px rgba(2, 8, 23, .28); }
    .brand { display: flex; align-items: center; gap: 14px; margin-bottom: 28px; }
    .brand img { width: 58px; height: 58px; object-fit: contain; }
    .brand h1 { margin: 0; font-size: 1.08rem; line-height: 1.35; }
    .eyebrow { margin: 0 0 8px; color: #0f766e; font-size: .74rem; font-weight: 800; letter-spacing: .14em; text-transform: uppercase; }
    h2 { margin: 0 0 10px; font-size: 1.65rem; }
    .intro { margin: 0 0 26px; color: #64748b; font-size: .93rem; line-height: 1.6; }
    label { display: block; margin: 0 0 7px; font-size: .84rem; font-weight: 700; }
    input { width: 100%; margin-bottom: 17px; padding: 13px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font: inherit; }
    input:focus { outline: 3px solid rgba(20, 184, 166, .2); border-color: #0f766e; }
    button { width: 100%; padding: 13px 16px; border: 0; border-radius: 10px; color: white; background: #0f766e; font: 700 .95rem Inter, sans-serif; cursor: pointer; }
    button:hover { background: #115e59; }
    .error { margin: 0 0 18px; padding: 11px 13px; border-radius: 9px; color: #991b1b; background: #fee2e2; font-size: .86rem; }
    .note { margin: 22px 0 0; text-align: center; color: #94a3b8; font-size: .75rem; }
  </style>
</head>
<body>
  <main class="login-card">
    <div class="brand">
      <img src="assets/img/logo.kma.png" alt="Logo KMA">
      <h1>KMA XXV 2026<br><span style="font-weight: 500; color: #64748b;">ANTAM BestMIND</span></h1>
    </div>
    <p class="eyebrow">Akses Internal ANTAM</p>
    <h2>Masuk ke Website</h2>
    <p class="intro">Gunakan email dan password internal yang telah diberikan panitia.</p>
    <?php if ($error !== ''): ?><p class="error" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
    <form method="post" action="login.php" autocomplete="on">
      <label for="email">Email</label>
      <input id="email" name="email" type="email" autocomplete="username" required autofocus>
      <label for="password">Password</label>
      <input id="password" name="password" type="password" autocomplete="current-password" required>
      <button type="submit">Masuk</button>
    </form>
    <p class="note">Khusus untuk penggunaan internal ANTAM.</p>
  </main>
</body>
</html>