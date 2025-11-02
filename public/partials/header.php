<?php
  $navItems = [
    [
      'id' => 'home',
      'label' => 'Domů',
      'path' => '/index.php',
    ],
    [
      'id' => 'reservation',
      'label' => 'Rezervace',
      'path' => '/reservation.php',
    ],
    [
      'id' => 'menu',
      'label' => 'Menu',
      'path' => '/menu.php',
    ],
    [
      'id' => 'contact',
      'label' => 'Kontakt',
      'path' => '/contact.php',
    ],
  ];

  $renderNavItems = function (array $items) use ($baseUrl, $currentPage) {
    $current = $currentPage ?? '';
    foreach ($items as $item) {
      $href = htmlspecialchars($baseUrl . $item['path'], ENT_QUOTES, 'UTF-8');
      $label = htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8');
      $isActive = $current === $item['id'];
      $attrs = $isActive ? ' aria-current="page" class="is-active"' : '';
      echo "        <li><a href=\"{$href}\"{$attrs}>{$label}</a></li>\n";
    }
  };

  $renderAuthButtons = function () {
?>
      <button class="btn btn--ghost" type="button" data-js="open-login">Přihlásit</button>
      <button class="btn btn--primary" type="button" data-js="open-register">Registrovat</button>
<?php
  };
?>

<header class="site-header" data-component="site-header">
  <div class="shell site-header__inner">
    <a
      class="site-header__brand"
      href="<?php echo htmlspecialchars($baseUrl . '/index.php', ENT_QUOTES, 'UTF-8'); ?>"
      aria-label="<?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?> domů"
    >
      <span class="site-header__logo" aria-hidden="true">🎲</span>
      <span class="site-header__wordmark"><?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?></span>
    </a>
    <button class="site-header__toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" data-js="nav-toggle">
      <span class="sr-only">Otevřít menu</span>
      <span class="burger" aria-hidden="true"></span>
    </button>
    <nav class="site-header__nav" aria-label="Hlavní navigace">
      <ul>
<?php $renderNavItems($navItems); ?>
      </ul>
    </nav>
    <div class="site-header__cta" data-js="auth-slot">
<?php $renderAuthButtons(); ?>
    </div>
  </div>
  <div class="mobile-drawer" id="mobile-nav" hidden>
    <button class="mobile-drawer__close" type="button" data-js="nav-close">
      <span class="sr-only">Zavřít menu</span>
      <span aria-hidden="true" class="mobile-drawer__close-icon"></span>
    </button>
    <nav class="mobile-drawer__nav" aria-label="Mobilní navigace">
      <ul>
<?php $renderNavItems($navItems); ?>
      </ul>
    </nav>
    <div class="mobile-drawer__cta" data-js="auth-slot-mobile">
<?php $renderAuthButtons(); ?>
    </div>
  </div>
</header>
<?php // TODO: Symfony component slot for header ?>
