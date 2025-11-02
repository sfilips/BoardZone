<header class="site-header" data-component="site-header">
  <div class="shell site-header__inner">
    <a class="site-header__brand" href="<?php echo $baseUrl; ?>/index.php" aria-label="<?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?> domů">
      <span class="site-header__logo" aria-hidden="true">🎲</span>
      <span class="site-header__wordmark"><?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?></span>
    </a>
    <button class="site-header__toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" data-js="nav-toggle">
      <span class="sr-only">Otevřít menu</span>
      <span class="burger" aria-hidden="true"></span>
    </button>
    <nav class="site-header__nav" aria-label="Hlavní navigace">
      <ul>
        <li><a href="<?php echo $baseUrl; ?>/index.php"<?php if (($currentPage ?? '') === 'home') echo ' aria-current="page" class="is-active"'; ?>>Domů</a></li>
        <li><a href="<?php echo $baseUrl; ?>/reservation.php"<?php if (($currentPage ?? '') === 'reservation') echo ' aria-current="page" class="is-active"'; ?>>Rezervace</a></li>
        <li><a href="<?php echo $baseUrl; ?>/menu.php"<?php if (($currentPage ?? '') === 'menu') echo ' aria-current="page" class="is-active"'; ?>>Menu</a></li>
        <li><a href="<?php echo $baseUrl; ?>/contact.php"<?php if (($currentPage ?? '') === 'contact') echo ' aria-current="page" class="is-active"'; ?>>Kontakt</a></li>
      </ul>
    </nav>
    <div class="site-header__cta" data-js="auth-slot">
      <button class="btn btn--ghost" type="button" data-js="open-login">Přihlásit</button>
      <button class="btn btn--primary" type="button" data-js="open-register">Registrovat</button>
    </div>
  </div>
  <div class="mobile-drawer" id="mobile-nav" hidden>
    <div class="mobile-drawer__panel" role="dialog" aria-modal="true" aria-label="Mobilní navigace">
      <div class="mobile-drawer__header">
        <button class="mobile-drawer__close" type="button" data-js="nav-close" aria-label="Zavřít menu">
          <span aria-hidden="true">←</span>
          <span>Zpět</span>
        </button>
      </div>
      <nav class="mobile-drawer__nav" aria-label="Mobilní navigace">
        <ul>
          <li><a href="<?php echo $baseUrl; ?>/index.php"<?php if (($currentPage ?? '') === 'home') echo ' aria-current="page" class="is-active"'; ?>>Domů</a></li>
          <li><a href="<?php echo $baseUrl; ?>/reservation.php"<?php if (($currentPage ?? '') === 'reservation') echo ' aria-current="page" class="is-active"'; ?>>Rezervace</a></li>
          <li><a href="<?php echo $baseUrl; ?>/menu.php"<?php if (($currentPage ?? '') === 'menu') echo ' aria-current="page" class="is-active"'; ?>>Menu</a></li>
          <li><a href="<?php echo $baseUrl; ?>/contact.php"<?php if (($currentPage ?? '') === 'contact') echo ' aria-current="page" class="is-active"'; ?>>Kontakt</a></li>
        </ul>
      </nav>
      <div class="mobile-drawer__cta" data-js="auth-slot-mobile">
        <button class="btn btn--ghost" type="button" data-js="open-login">Přihlásit</button>
        <button class="btn btn--primary" type="button" data-js="open-register">Registrovat</button>
      </div>
    </div>
  </div>
</header>
<?php // TODO: Symfony component slot for header ?>
