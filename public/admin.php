<?php
session_start();

if (empty($_SESSION['is_authenticated'])) {
    header('Location: login.php');
    exit;
}

$brandName = 'BoardZone';
$pageTitle = 'Administrace';
$currentPage = '';

$adminUsername = $_SESSION['admin_username'] ?? 'admin';
$now = new DateTime('now', new DateTimeZone('Europe/Prague'));
$hour = (int) $now->format('H');

if ($hour < 11) {
    $greeting = 'Dobré ráno';
} elseif ($hour < 18) {
    $greeting = 'Dobré odpoledne';
} else {
    $greeting = 'Dobrý večer';
}

$dayNames = [
    'Monday' => 'Pondělí',
    'Tuesday' => 'Úterý',
    'Wednesday' => 'Středa',
    'Thursday' => 'Čtvrtek',
    'Friday' => 'Pátek',
    'Saturday' => 'Sobota',
    'Sunday' => 'Neděle',
];

$dayLabel = $dayNames[$now->format('l')] ?? $now->format('l');
$authSlotContent = '<span class="site-header__status-badge">🔐 Administrátor</span>';

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';
// TODO: Symfony route/controller/view
?>
<main id="main-content" class="main admin-page">
  <div class="admin-toolbar" role="region" aria-label="Rychlý přehled">
    <div class="admin-toolbar__status">
      <span class="admin-status-dot" aria-hidden="true"></span>
      <div>
        <p>Všechny systémy běží hladce</p>
        <span>Aktualizováno <?php echo htmlspecialchars($now->format('H:i'), ENT_QUOTES, 'UTF-8'); ?></span>
      </div>
    </div>
    <div class="admin-toolbar__actions">
      <span class="admin-toolbar__greeting"><?php echo htmlspecialchars($greeting . ', ' . ucfirst($adminUsername), ENT_QUOTES, 'UTF-8'); ?></span>
      <a class="btn btn--ghost" href="<?php echo htmlspecialchars($baseUrl . '/index.php', ENT_QUOTES, 'UTF-8'); ?>">Zpět na web</a>
      <form action="<?php echo htmlspecialchars($baseUrl . '/logout.php', ENT_QUOTES, 'UTF-8'); ?>" method="post">
        <button class="btn btn--primary" type="submit">Odhlásit</button>
      </form>
    </div>
  </div>
  <section class="section">
    <div class="shell admin-overview">
      <header class="admin-overview__header">
        <p class="eyebrow">Interní rozhraní</p>
        <h1>Administrace BoardZone</h1>
        <p>Spravujte rezervace, aktualizujte nabídku a odpovídejte na dotazy hostů z jednoho místa.</p>
      </header>
      <div class="admin-overview__meta">
        <article class="admin-meta-card">
          <h2 class="admin-meta-card__title">Dnešní provoz</h2>
          <dl>
            <div>
              <dt>Datum</dt>
              <dd><?php echo htmlspecialchars($dayLabel . ' ' . $now->format('j. n. Y'), ENT_QUOTES, 'UTF-8'); ?></dd>
            </div>
            <div>
              <dt>Největší skupina</dt>
              <dd>8 hostů v 19:30</dd>
            </div>
            <div>
              <dt>Speciál večera</dt>
              <dd>Temný Porter Orion</dd>
            </div>
          </dl>
        </article>
        <article class="admin-meta-card">
          <h2 class="admin-meta-card__title">Týdenní přehled</h2>
          <dl>
            <div>
              <dt>Nové rezervace</dt>
              <dd>37</dd>
            </div>
            <div>
              <dt>Top deskovka</dt>
              <dd>Ticket to Ride</dd>
            </div>
            <div>
              <dt>Spokojenost hostů</dt>
              <dd>4,8 ★</dd>
            </div>
          </dl>
        </article>
      </div>
      <div class="admin-stats">
        <article class="admin-stat-card">
          <div class="admin-stat-card__label">Aktivní rezervace</div>
          <div class="admin-stat-card__value">12</div>
          <p class="admin-stat-card__hint">3 čekají na potvrzení</p>
        </article>
        <article class="admin-stat-card">
          <div class="admin-stat-card__label">Volná kapacita dnes</div>
          <div class="admin-stat-card__value">28 míst</div>
          <p class="admin-stat-card__hint">Nejvíce poptávaný čas: 19:00</p>
        </article>
        <article class="admin-stat-card">
          <div class="admin-stat-card__label">Nové zprávy</div>
          <div class="admin-stat-card__value">5</div>
          <p class="admin-stat-card__hint">Poslední příchozí před 12 minutami</p>
        </article>
      </div>
      <div class="admin-quick-actions" role="group" aria-label="Rychlé akce">
        <button class="admin-quick-action" type="button" disabled data-tooltip="Funkce bude doplněna">
          📅 Plánovat turnaj
        </button>
        <button class="admin-quick-action" type="button" disabled data-tooltip="Funkce bude doplněna">
          ✉️ Odeslat newsletter
        </button>
        <button class="admin-quick-action" type="button" disabled data-tooltip="Funkce bude doplněna">
          📊 Exportovat statistiky
        </button>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="shell admin-section">
      <div class="admin-section__header">
        <div>
          <h2>Rezervace</h2>
          <p>Přehled nadcházejících rezervací a jejich aktuálních stavů.</p>
        </div>
        <div class="admin-actions">
          <button class="btn btn--primary" type="button" disabled data-tooltip="Funkce bude doplněna">Nová rezervace</button>
          <button class="btn btn--ghost" type="button" disabled>Exportovat</button>
        </div>
      </div>
      <div class="admin-section__grid">
        <div class="admin-section__main">
          <div class="admin-table" role="region" aria-live="polite">
            <table>
              <thead>
                <tr>
                  <th scope="col">Datum</th>
                  <th scope="col">Čas</th>
                  <th scope="col">Host</th>
                  <th scope="col">Počet osob</th>
                  <th scope="col">Stůl</th>
                  <th scope="col">Stav</th>
                  <th scope="col" class="is-actions">Akce</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-title="Datum">24. 5. 2024</td>
                  <td data-title="Čas">18:30</td>
                  <td data-title="Host">Lucie Vávrová</td>
                  <td data-title="Počet osob">4</td>
                  <td data-title="Stůl">A3</td>
                  <td data-title="Stav"><span class="admin-badge admin-badge--confirmed">Potvrzeno</span></td>
                  <td data-title="Akce" class="is-actions">
                    <button class="btn btn--ghost" type="button" disabled>Detail</button>
                  </td>
                </tr>
                <tr>
                  <td data-title="Datum">24. 5. 2024</td>
                  <td data-title="Čas">20:00</td>
                  <td data-title="Host">Marek Štěpán</td>
                  <td data-title="Počet osob">2</td>
                  <td data-title="Stůl">B1</td>
                  <td data-title="Stav"><span class="admin-badge admin-badge--pending">Čeká na potvrzení</span></td>
                  <td data-title="Akce" class="is-actions">
                    <button class="btn btn--ghost" type="button" disabled>Schválit</button>
                  </td>
                </tr>
                <tr>
                  <td data-title="Datum">25. 5. 2024</td>
                  <td data-title="Čas">17:00</td>
                  <td data-title="Host">Tereza Pokorná</td>
                  <td data-title="Počet osob">6</td>
                  <td data-title="Stůl">VIP</td>
                  <td data-title="Stav"><span class="admin-badge admin-badge--flagged">Požadavek na změnu</span></td>
                  <td data-title="Akce" class="is-actions">
                    <button class="btn btn--ghost" type="button" disabled>Upravit</button>
                  </td>
                </tr>
                <tr>
                  <td data-title="Datum">25. 5. 2024</td>
                  <td data-title="Čas">21:30</td>
                  <td data-title="Host">Ondřej Jelínek</td>
                  <td data-title="Počet osob">3</td>
                  <td data-title="Stůl">C2</td>
                  <td data-title="Stav"><span class="admin-badge admin-badge--cancelled">Zrušeno hostem</span></td>
                  <td data-title="Akce" class="is-actions">
                    <button class="btn btn--ghost" type="button" disabled>Zobrazit</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <p class="admin-note">Detailní správa rezervací bude dostupná po napojení na backend. Zatím slouží rozhraní jako vizuální náhled.</p>
        </div>
        <aside class="admin-timeline" aria-label="Nadcházející události">
          <h3>Nadcházející události</h3>
          <ul>
            <li>
              <div>
                <span class="admin-timeline__time">Čt 19:00</span>
                <p>Turnaj v Carcassonne – 21 registrovaných hráčů</p>
              </div>
            </li>
            <li>
              <div>
                <span class="admin-timeline__time">Pá 17:30</span>
                <p>Firemní večírek Creative Labs – rezervace celého salonku</p>
              </div>
            </li>
            <li>
              <div>
                <span class="admin-timeline__time">So 14:00</span>
                <p>Workshop pro začátečníky: Catan a přátelé</p>
              </div>
            </li>
          </ul>
        </aside>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="shell admin-section">
      <div class="admin-section__header">
        <div>
          <h2>Nabídka &amp; menu</h2>
          <p>Udržujte aktuální nabídku nápojů a jídel, která se zobrazuje hostům na webu.</p>
        </div>
        <div class="admin-actions">
          <button class="btn btn--primary" type="button" disabled data-tooltip="Přidání položek bude doplněno">Nová položka</button>
        </div>
      </div>
      <div class="admin-controls">
        <label class="form__field admin-search">
          <span>Hledat v menu</span>
          <input type="search" name="menu-search" placeholder="Začněte psát název položky" disabled>
        </label>
        <div class="admin-pills" role="list">
          <button class="admin-pill is-active" type="button" disabled>Přehled</button>
          <button class="admin-pill" type="button" disabled>Jídla</button>
          <button class="admin-pill" type="button" disabled>Nápoje</button>
          <button class="admin-pill" type="button" disabled>Speciály</button>
        </div>
      </div>
      <ul class="admin-entries" aria-label="Položky menu">
        <li class="admin-entry">
          <div class="admin-entry__main">
            <h3>IPA Nebula</h3>
            <p>Aromatická IPA z lokálního pivovaru. 14°, 6,5 % alkoholu.</p>
          </div>
          <div class="admin-entry__meta">
            <span class="admin-pill">Nápoj</span>
            <span class="admin-price">89 Kč</span>
            <button class="btn btn--ghost" type="button" disabled>Upravit</button>
          </div>
        </li>
        <li class="admin-entry">
          <div class="admin-entry__main">
            <h3>Cheeseboard Deluxe</h3>
            <p>Výběr čtyř sýrů, domácí džem a čerstvé pečivo. Ideální ke sdílení.</p>
          </div>
          <div class="admin-entry__meta">
            <span class="admin-pill">Jídlo</span>
            <span class="admin-price">219 Kč</span>
            <button class="btn btn--ghost" type="button" disabled>Upravit</button>
          </div>
        </li>
        <li class="admin-entry">
          <div class="admin-entry__main">
            <h3>Temný Porter Orion</h3>
            <p>Plné tělo, tóny hořké čokolády a karamelu. Limitovaná edice.</p>
          </div>
          <div class="admin-entry__meta">
            <span class="admin-pill">Speciál</span>
            <span class="admin-price">95 Kč</span>
            <button class="btn btn--ghost" type="button" disabled>Upravit</button>
          </div>
        </li>
      </ul>
      <div class="admin-insights" aria-label="Rychlé poznámky k nabídce">
        <article class="admin-insight-card">
          <h3>Tip šéfkuchaře</h3>
          <p>Připravujeme letní menu s důrazem na lehké sdílené talíře. Návrhy položek prosím pošlete do pátku.</p>
        </article>
        <article class="admin-insight-card">
          <h3>Dostupnost skladu</h3>
          <p>Sýr Manchego je skladem pouze pro 5 dalších porcí. Doplnění očekáváme v úterý ráno.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="shell admin-section">
      <div class="admin-section__header">
        <div>
          <h2>Zprávy z kontaktního formuláře</h2>
          <p>Nejnovější reakce od návštěvníků a plánovaných událostí.</p>
        </div>
        <div class="admin-actions">
          <button class="btn btn--ghost" type="button" disabled>Označit vše jako přečtené</button>
        </div>
      </div>
      <div class="admin-messages">
        <article class="admin-message">
          <header class="admin-message__header">
            <h3>Monika Horská</h3>
            <span class="admin-message__meta">monika.horska@email.cz • 23. 5. 2024 20:14</span>
          </header>
          <p>"Dobrý den, máte prosím k dispozici větší stůl pro 8 lidí v sobotu 1. 6.? Rádi bychom oslavili narozeniny."</p>
          <footer class="admin-message__footer">
            <span class="admin-badge admin-badge--new">Nové</span>
            <button class="btn btn--ghost" type="button" disabled>Odpovědět</button>
          </footer>
        </article>
        <article class="admin-message">
          <header class="admin-message__header">
            <h3>Petr Král</h3>
            <span class="admin-message__meta">petr.kral@email.cz • 23. 5. 2024 18:02</span>
          </header>
          <p>"Zajímá nás, zda je možné rezervovat si turnaj v Carcassonne pro naši firmu. Jaké jsou prosím podmínky?"</p>
          <footer class="admin-message__footer">
            <span class="admin-badge admin-badge--pending">Čeká na odpověď</span>
            <button class="btn btn--ghost" type="button" disabled>Odpovědět</button>
          </footer>
        </article>
        <article class="admin-message">
          <header class="admin-message__header">
            <h3>Iveta Burešová</h3>
            <span class="admin-message__meta">iveta.buresova@email.cz • 22. 5. 2024 09:27</span>
          </header>
          <p>"Děkujeme za včerejší večer! Máte možnost zakoupit dárkový poukaz?"</p>
          <footer class="admin-message__footer">
            <span class="admin-badge admin-badge--ack">Zaznamenáno</span>
            <button class="btn btn--ghost" type="button" disabled>Odpovědět</button>
          </footer>
        </article>
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
