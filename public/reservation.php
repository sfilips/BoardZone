<?php
$brandName = 'BoardZone';
$pageTitle = 'Rezervace';
$currentPage = 'reservation';
$tables = [
  ['id' => 'S-01', 'capacity' => 2], ['id' => 'S-02', 'capacity' => 2], ['id' => 'S-03', 'capacity' => 2],
  ['id' => 'M-01', 'capacity' => 4], ['id' => 'M-02', 'capacity' => 4], ['id' => 'M-03', 'capacity' => 4],
  ['id' => 'L-01', 'capacity' => 6], ['id' => 'L-02', 'capacity' => 6],
];
require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';
// TODO: Symfony route/controller/view
?>
<main id="main-content" class="main">
  <section class="section">
    <div class="shell">
      <header class="section__header">
        <h1>Rezervace stolu</h1>
        <p>Vyberte datum, čas a stůl, který bude vaší partě nejvíc sedět. Přihlášení uživatelé mohou rezervovat jedním klikem.</p>
      </header>
      <div class="reservation-banner" role="status">
        <strong>Pro rezervaci se prosím přihlas nebo zaregistruj.</strong>
      </div>
      <form class="reservation-form" aria-label="Filtr rezervací" novalidate>
        <div class="reservation-form__grid">
          <label class="form__field">
            <span>Datum</span>
            <input type="date" name="date">
          </label>
          <label class="form__field">
            <span>Čas</span>
            <input type="time" name="time">
          </label>
          <label class="form__field">
            <span>Délka</span>
            <select name="duration">
            <?php for ($minutes = 60; $minutes <= 300; $minutes += 30): ?>
              <option value="<?php echo (int) $minutes; ?>"><?php echo (int) $minutes; ?> min</option>
            <?php endfor; ?>
            </select>
          </label>
        </div>
      </form>
      <div class="table-grid" data-js="table-grid">
<?php foreach ($tables as $table): ?>
        <article class="table-card" data-capacity="<?php echo (int) $table['capacity']; ?>">
          <header>
            <p class="table-card__id">Stůl <?php echo htmlspecialchars($table['id'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="table-card__capacity">Kapacita: <?php echo (int) $table['capacity']; ?> osob</p>
          </header>
          <div class="table-card__seats" aria-hidden="true">
<?php for ($i = 0; $i < $table['capacity']; $i++): ?>
            <span class="seat"></span>
<?php endfor; ?>
          </div>
          <p>Ideální pro skupiny, které chtějí pohodlně hrát bez rušení.</p>
          <button class="btn btn--primary" type="button" disabled data-tooltip="Přihlas se a rezervuj" data-auth-action="select-table">Vybrat</button>
        </article>
<?php endforeach; ?>
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
