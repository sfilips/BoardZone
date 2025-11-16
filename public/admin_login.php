<?php
require_once __DIR__ . '/partials/admin-auth.php';

$brandName = 'BoardZone';
$pageTitle = 'Admin přihlášení';
$bodyClasses = ['layout-body', 'auth-body'];
$currentPage = null;

$errorMessage = '';
$statusMessage = '';
$emailValue = trim((string) ($_POST['email'] ?? ''));

if (boardzone_is_admin_logged_in()) {
    boardzone_admin_redirect('/admin_page.php');
}

if (!empty($_GET['logged_out'])) {
    $statusMessage = 'Byl(a) jste úspěšně odhlášen(a).';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = (string) ($_POST['password'] ?? '');
    $emailValue = trim($emailValue);

    if ($emailValue === BOARDZONE_ADMIN_EMAIL && hash_equals(BOARDZONE_ADMIN_PASSWORD, $password)) {
        boardzone_log_in_admin($emailValue);
        boardzone_admin_redirect('/admin_page.php');
    } else {
        $errorMessage = 'Neplatné přihlašovací údaje. Zkuste to prosím znovu.';
    }
}

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';
?>
<main id="main-content" class="main auth-main">
  <section class="section auth-section">
    <div class="shell">
      <div class="auth-card" aria-labelledby="admin-login-title">
        <header class="section__header">
          <p class="eyebrow">Administrace</p>
          <h1 id="admin-login-title">Přihlášení do admin rozhraní</h1>
          <p>Pro správu rezervací a obsazenosti se přihlaste svými administrátorskými údaji.</p>
        </header>
        <?php if ($statusMessage): ?>
          <p class="alert alert--success"><?php echo htmlspecialchars($statusMessage, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <?php if ($errorMessage): ?>
          <p class="alert alert--error"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <form class="form auth-form" method="post" novalidate>
          <label class="form__field" for="admin-email">
            <span>E-mail</span>
            <input id="admin-email" type="email" name="email" autocomplete="username" required value="<?php echo htmlspecialchars($emailValue, ENT_QUOTES, 'UTF-8'); ?>">
          </label>
          <label class="form__field" for="admin-password">
            <span>Heslo</span>
            <input id="admin-password" type="password" name="password" autocomplete="current-password" required>
          </label>
          <button class="btn btn--primary" type="submit">Přihlásit se</button>
        </form>
        <p class="auth-hint">Výchozí přihlašovací údaje: <strong><?php echo htmlspecialchars(BOARDZONE_ADMIN_EMAIL, ENT_QUOTES, 'UTF-8'); ?></strong> / <strong><?php echo htmlspecialchars(BOARDZONE_ADMIN_PASSWORD, ENT_QUOTES, 'UTF-8'); ?></strong></p>
      </div>
    </div>
  </section>
</main>
<?php
require __DIR__ . '/partials/footer.php';
?>
