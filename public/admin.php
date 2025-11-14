<?php
$brandName = 'BoardZone';
$pageTitle = 'Admin';
$currentPage = 'admin';
$bodyClasses = ['layout-body', 'admin-body'];
$bodyAttributes = ['data-requires-auth' => 'true'];

$stats = [
  ['label' => 'Aktivní rezervace', 'value' => '18', 'change' => '+6 dne'],
  ['label' => 'Nové registrace', 'value' => '12', 'change' => '+4 dnes'],
  ['label' => 'Obsazenost', 'value' => '76 %', 'change' => 'večer 94 %'],
];

$tasks = [
  ['title' => 'Potvrdit skupinovou rezervaci', 'time' => '18:00 dnes', 'status' => 'Čeká'],
  ['title' => 'Doplnit zásoby nápojů', 'time' => 'Do 16:00', 'status' => 'Probíhá'],
  ['title' => 'Zkontrolovat nové hry', 'time' => 'Zítra dopoledne', 'status' => 'Plán'],
];

$upcoming = [
  ['name' => 'Tým Meeple Masters', 'time' => '15:30', 'size' => 4, 'table' => 'M-02'],
  ['name' => 'Rodina Novákova', 'time' => '17:00', 'size' => 5, 'table' => 'L-01'],
  ['name' => 'Speed Chess Liga', 'time' => '19:00', 'size' => 6, 'table' => 'L-02'],
];

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';
?>
<main id="main-content" class="main admin-main" data-component="admin-dashboard">
  <section class="section admin-hero">
    <div class="shell">
      <header class="section__header">
        <p class="eyebrow">Admin dashboard</p>
        <h1>Vítej zpět v administraci BoardZone</h1>
        <p>Spravuj rezervace, sleduj obsazenost a připrav se na dnešní hosty. Přihlášení je zatím pouze demonstrační.</p>
      </header>
      <div class="admin-kpi-grid" role="list">
<?php foreach ($stats as $item): ?>
        <article class="admin-kpi" role="listitem">
          <p class="admin-kpi__label"><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></p>
          <p class="admin-kpi__value"><?php echo htmlspecialchars($item['value'], ENT_QUOTES, 'UTF-8'); ?></p>
          <p class="admin-kpi__meta"><?php echo htmlspecialchars($item['change'], ENT_QUOTES, 'UTF-8'); ?></p>
        </article>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section admin-section">
    <div class="shell admin-layout">
      <section class="admin-card admin-card--reservations" aria-labelledby="reservations-title">
        <header class="admin-card__header">
          <h2 id="reservations-title">Nadcházející rezervace</h2>
          <button class="btn btn--ghost" type="button">Exportovat</button>
        </header>
        <ul class="admin-list">
<?php foreach ($upcoming as $reservation): ?>
          <li class="admin-list__item">
            <div>
              <p class="admin-list__primary"><?php echo htmlspecialchars($reservation['name'], ENT_QUOTES, 'UTF-8'); ?></p>
              <p class="admin-list__secondary">Stůl <?php echo htmlspecialchars($reservation['table'], ENT_QUOTES, 'UTF-8'); ?> · <?php echo (int) $reservation['size']; ?> hráči</p>
            </div>
            <span class="admin-list__time"><?php echo htmlspecialchars($reservation['time'], ENT_QUOTES, 'UTF-8'); ?></span>
          </li>
<?php endforeach; ?>
        </ul>
      </section>

      <section class="admin-card admin-card--tasks" aria-labelledby="tasks-title">
        <header class="admin-card__header">
          <h2 id="tasks-title">Dnešní úkoly</h2>
          <button class="btn btn--ghost" type="button">Přidat úkol</button>
        </header>
        <ul class="admin-task-list">
<?php foreach ($tasks as $task): ?>
          <li class="admin-task">
            <div>
              <p class="admin-task__title"><?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?></p>
              <p class="admin-task__meta"><?php echo htmlspecialchars($task['time'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <span class="admin-task__status"><?php echo htmlspecialchars($task['status'], ENT_QUOTES, 'UTF-8'); ?></span>
          </li>
<?php endforeach; ?>
        </ul>
      </section>
    </div>
  </section>

  <section class="section admin-section">
    <div class="shell">
      <section class="admin-card admin-card--notes" aria-labelledby="notes-title">
        <header class="admin-card__header">
          <h2 id="notes-title">Poznámky pro personál</h2>
        </header>
        <div class="admin-note">
          <p><strong>Tip týdne:</strong> Doporučujte hostům novinku <em>Frosthaven: Mini Campaign</em>. Máme jen 3 kusy.</p>
          <p class="admin-note__footer">Naposledy aktualizoval(a) Radka · před 2 hodinami</p>
        </div>
      </section>
    </div>
  </section>
</main>
<?php
require __DIR__ . '/partials/footer.php';
require __DIR__ . '/partials/auth-modals.php';
?>
</body>
</html>
