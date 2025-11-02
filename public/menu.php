<?php
$brandName = 'BoardZone';
$pageTitle = 'Menu';
$currentPage = 'menu';
$menu = [
  'Napoje' => [
    ['name' => 'IPA 12°', 'desc' => 'Lokální řemeslné pivo', 'price' => 69],
    ['name' => 'Cola', 'desc' => '0,33 l', 'price' => 39],
    ['name' => 'Tmavý stout', 'desc' => 'Pražené tóny a jemná pěna', 'price' => 75],
    ['name' => 'Zázvorová limonáda', 'desc' => 'Domácí, jemně perlivá', 'price' => 55],
  ],
  'Jidlo' => [
    ['name' => 'Burger BoardZone', 'desc' => 'Hovězí, cheddar, okurky', 'price' => 189],
    ['name' => 'Quesadilla', 'desc' => 'Salsa, sýr, kuře', 'price' => 159],
    ['name' => 'Veggie bowl', 'desc' => 'Quinoa, pečená zelenina, hummus', 'price' => 149],
    ['name' => 'Tacos duo', 'desc' => 'Trhané vepřové, pikantní mayo', 'price' => 139],
  ],
  'Snacky' => [
    ['name' => 'Nachos & dip', 'desc' => 'Pikantní salsa', 'price' => 89],
    ['name' => 'Pražené mandle', 'desc' => 'Voňavé koření', 'price' => 59],
    ['name' => 'Sýrové tyčinky', 'desc' => 'Cheddar & jalapeño', 'price' => 79],
    ['name' => 'Olivy marinované', 'desc' => 'Citrón, rozmarýn', 'price' => 69],
  ],
];
require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';
// TODO: Symfony route/controller/view
?>
<main id="main-content" class="main">
  <section class="section">
    <div class="shell">
      <header class="section__header">
        <h1>Menu &amp; bar</h1>
        <p>Načerpejte energii k náročným partiím. Od výběrového piva přes drinky bez alkoholu až po teplé speciality.</p>
      </header>
      <div class="menu-controls" data-js="menu-controls">
        <div class="tabs" role="tablist" aria-label="Kategorie menu">
<?php $index = 0; foreach ($menu as $category => $items): $tabId = 'tab-' . strtolower($category); ?>
          <button role="tab" id="<?php echo $tabId; ?>" class="tab<?php echo $index === 0 ? ' is-active' : ''; ?>" aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="panel-<?php echo $tabId; ?>" data-category="<?php echo strtolower($category); ?>" tabindex="<?php echo $index === 0 ? '0' : '-1'; ?>"><?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?></button>
<?php $index++; endforeach; ?>
        </div>
        <label class="form__field menu-search">
          <span class="sr-only">Vyhledat položku</span>
          <input type="search" placeholder="Hledat v menu" data-js="menu-search" autocomplete="off">
        </label>
      </div>
      <div class="menu-panels" data-js="menu-panels">
<?php $index = 0; foreach ($menu as $category => $items): $panelId = 'panel-tab-' . strtolower($category); ?>
        <section role="tabpanel" id="<?php echo $panelId; ?>" class="menu-panel<?php echo $index === 0 ? ' is-active' : ''; ?>" aria-labelledby="tab-<?php echo strtolower($category); ?>" data-category="<?php echo strtolower($category); ?>"<?php echo $index === 0 ? '' : ' hidden'; ?>>
          <ul class="menu-list">
<?php foreach ($items as $item): ?>
            <li class="menu-item" data-name="<?php echo htmlspecialchars(strtolower($item['name']), ENT_QUOTES, 'UTF-8'); ?>">
              <div>
                <h3><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
<?php if (!empty($item['desc'])): ?>
                <p><?php echo htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>
              </div>
              <strong><?php echo (int) $item['price']; ?> Kč</strong>
            </li>
<?php endforeach; ?>
          </ul>
        </section>
<?php $index++; endforeach; ?>
      </div>
    </div>
  </section>
</main>
<?php
require __DIR__ . '/partials/footer.php';
require __DIR__ . '/partials/auth-modals.php';
?>
</body>
</html>
