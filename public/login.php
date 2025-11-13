<?php
session_start();

if (!empty($_SESSION['is_authenticated'])) {
    header('Location: admin.php');
    exit;
}

$brandName = 'BoardZone';
$pageTitle = 'Přihlášení do administrace';
$pageDescription = 'Bezpečný přístup do interní administrace BoardZone.';
$currentPage = '';

$usernameValue = '';
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameValue = trim((string) ($_POST['username'] ?? ''));
    $password = trim((string) ($_POST['password'] ?? ''));

    if ($usernameValue === 'admin' && $password === 'admin') {
        $_SESSION['is_authenticated'] = true;
        $_SESSION['admin_username'] = $usernameValue;
        header('Location: admin.php');
        exit;
    }

    $error = 'Neplatné přihlašovací údaje. Zkontrolujte prosím jméno i heslo.';
}

require __DIR__ . '/partials/head.php';
?>
<main id="main-content" class="main auth-page">
  <div class="auth-wrapper">
    <section class="auth-card" aria-labelledby="admin-login-title">
      <header class="auth-card__header">
        <p class="eyebrow">Administrace</p>
        <h1 id="admin-login-title">Přihlaste se do BoardZone</h1>
        <p>Zadejte přístupové údaje pro správu rezervací, menu a zpráv od hostů.</p>
      </header>
      <?php if ($error !== null) : ?>
      <div class="auth-card__alert" role="alert">
        <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
      </div>
      <?php endif; ?>
      <form method="post" class="auth-card__form" novalidate>
        <label class="form__field">
          <span>Uživatelské jméno</span>
          <input
            type="text"
            name="username"
            required
            autocomplete="username"
            value="<?php echo htmlspecialchars($usernameValue, ENT_QUOTES, 'UTF-8'); ?>"
          >
        </label>
        <label class="form__field">
          <span>Heslo</span>
          <input type="password" name="password" required autocomplete="current-password">
        </label>
        <button class="btn btn--primary btn--full" type="submit">Přihlásit se</button>
      </form>
      <footer class="auth-card__footer">
        <p>Výchozí přístupové údaje: <strong>admin / admin</strong></p>
        <a class="btn btn--link" href="<?php echo htmlspecialchars($baseUrl . '/index.php', ENT_QUOTES, 'UTF-8'); ?>">← Zpět na hlavní web</a>
      </footer>
    </section>
  </div>
</main>
</body>
</html>
