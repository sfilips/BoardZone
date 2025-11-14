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
<main id="main-content" class="main admin-dashboard">
  <section class="admin-hero">
    <div class="shell">
      <div class="admin-hero__layout">
        <div class="admin-hero__content">
          <p class="admin-hero__eyebrow">Administrace BoardZone</p>
          <h1><?php echo htmlspecialchars($greeting . ', ' . ucfirst($adminUsername), ENT_QUOTES, 'UTF-8'); ?></h1>
          <p>Přehled klíčových informací k dnešní směně a rychlý přístup k důležitým úkolům.</p>
          <div class="admin-hero__actions">
            <a class="btn btn--ghost" href="<?php echo htmlspecialchars($baseUrl . '/index.php', ENT_QUOTES, 'UTF-8'); ?>">Zpět na web</a>
            <form action="<?php echo htmlspecialchars($baseUrl . '/logout.php', ENT_QUOTES, 'UTF-8'); ?>" method="post">
              <button class="btn btn--primary" type="submit">Odhlásit se</button>
            </form>
          </div>
        </div>
        <aside class="admin-hero__summary" aria-label="Denní souhrn">
          <dl class="admin-summary-list">
            <div class="admin-summary-list__item">
              <dt>Dnešní datum</dt>
              <dd><?php echo htmlspecialchars($dayLabel . ' ' . $now->format('j. n. Y'), ENT_QUOTES, 'UTF-8'); ?></dd>
            </div>
            <div class="admin-summary-list__item">
              <dt>Aktualizace</dt>
              <dd><?php echo htmlspecialchars($now->format('H:i'), ENT_QUOTES, 'UTF-8'); ?></dd>
            </div>
            <div class="admin-summary-list__item">
              <dt>Otevřená místa</dt>
              <dd>28 míst během večerní špičky</dd>
            </div>
            <div class="admin-summary-list__item">
              <dt>Dnešní speciál</dt>
              <dd>Temný Porter Orion</dd>
            </div>
          </dl>
        </aside>
      </div>
    </div>
  </section>

  <section class="admin-section">
    <div class="shell">
      <div class="admin-section__header">
        <div>
          <h2>Přehled dne</h2>
          <p>Nejdůležitější čísla z dnešní směny.</p>
        </div>
        <span class="admin-chip">Interní přístup</span>
      </div>
      <div class="admin-metrics">
        <article class="admin-metric" aria-label="Aktivní rezervace">
          <h3>Aktivní rezervace</h3>
          <p class="admin-metric__value">12</p>
          <p class="admin-metric__note">3 čekají na potvrzení</p>
        </article>
        <article class="admin-metric" aria-label="Denní kapacita">
          <h3>Volná kapacita</h3>
          <p class="admin-metric__value">28 míst</p>
          <p class="admin-metric__note">Největší poptávka kolem 19:00</p>
        </article>
        <article class="admin-metric" aria-label="Zprávy od hostů">
          <h3>Nové zprávy</h3>
          <p class="admin-metric__value">5</p>
          <p class="admin-metric__note">Poslední příchozí před 12 minutami</p>
        </article>
        <article class="admin-metric" aria-label="Plánované akce">
          <h3>Plánované akce</h3>
          <p class="admin-metric__value">3</p>
          <p class="admin-metric__note">Turnaj, firemní večer, workshop</p>
        </article>
      </div>
    </div>
  </section>

  <section class="admin-section">
    <div class="shell admin-two-column">
      <div class="admin-panel" aria-labelledby="upcoming-reservations">
        <div class="admin-panel__header">
          <div>
            <h2 id="upcoming-reservations">Nadcházející rezervace</h2>
            <p>Synchronizace s rezervačním systémem proběhne po připojení backendu.</p>
          </div>
          <div class="admin-panel__actions">
            <button class="btn btn--ghost" type="button" disabled>Nová rezervace</button>
          </div>
        </div>
        <div class="admin-table" role="region" aria-live="polite">
          <table>
            <thead>
              <tr>
                <th scope="col">Datum</th>
                <th scope="col">Čas</th>
                <th scope="col">Host</th>
                <th scope="col">Osob</th>
                <th scope="col">Stůl</th>
                <th scope="col">Stav</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>24. 5. 2024</td>
                <td>18:30</td>
                <td>Lucie Vávrová</td>
                <td>4</td>
                <td>A3</td>
                <td><span class="admin-status admin-status--ok">Potvrzeno</span></td>
              </tr>
              <tr>
                <td>24. 5. 2024</td>
                <td>20:00</td>
                <td>Marek Štěpán</td>
                <td>2</td>
                <td>B1</td>
                <td><span class="admin-status admin-status--pending">Čeká na potvrzení</span></td>
              </tr>
              <tr>
                <td>25. 5. 2024</td>
                <td>17:00</td>
                <td>Tereza Pokorná</td>
                <td>6</td>
                <td>VIP</td>
                <td><span class="admin-status admin-status--change">Požadavek na změnu</span></td>
              </tr>
              <tr>
                <td>25. 5. 2024</td>
                <td>21:30</td>
                <td>Ondřej Jelínek</td>
                <td>3</td>
                <td>C2</td>
                <td><span class="admin-status admin-status--cancelled">Zrušeno hostem</span></td>
              </tr>
              <tr>
                <td>26. 5. 2024</td>
                <td>16:00</td>
                <td>Eva Říhová</td>
                <td>5</td>
                <td>B4</td>
                <td><span class="admin-status admin-status--ok">Potvrzeno</span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="admin-panel__note">Detailní správa rezervací bude dostupná po napojení na backend. Zatím slouží panel jako vizuální náhled.</p>
      </div>

      <aside class="admin-sideboard" aria-label="Týdenní organizace">
        <article class="admin-sidecard">
          <h3>Události týdne</h3>
          <ul>
            <li>
              <span class="admin-sidecard__time">Čt 19:00</span>
              <p>Turnaj v Carcassonne • 21 registrovaných hráčů</p>
            </li>
            <li>
              <span class="admin-sidecard__time">Pá 17:30</span>
              <p>Firemní večer Creative Labs • rezervace salonku</p>
            </li>
            <li>
              <span class="admin-sidecard__time">So 14:00</span>
              <p>Workshop "Catan a přátelé" • kapacita 16 míst</p>
            </li>
          </ul>
        </article>
        <article class="admin-sidecard">
          <h3>Dnešní úkoly</h3>
          <ul>
            <li>Potvrdit firemní rezervaci pro 12 osob (26. 5.)</li>
            <li>Aktualizovat nabídku speciálních piv po 18:00</li>
            <li>Zkontrolovat zásoby her "Ticket to Ride" a "Dixit"</li>
          </ul>
        </article>
      </aside>
    </div>
  </section>

  <section class="admin-section">
    <div class="shell admin-two-column">
      <div class="admin-panel" aria-labelledby="menu-overview">
        <div class="admin-panel__header">
          <div>
            <h2 id="menu-overview">Nabídka &amp; menu</h2>
            <p>Aktualizujte položky, které se zobrazují hostům na webu.</p>
          </div>
          <div class="admin-panel__actions">
            <button class="btn btn--ghost" type="button" disabled>Nová položka</button>
          </div>
        </div>
        <ul class="admin-menu-list" aria-label="Položky menu">
          <li>
            <div>
              <h3>IPA Nebula</h3>
              <p>Aromatická IPA z lokálního pivovaru. 14°, 6,5 % alkoholu.</p>
            </div>
            <div class="admin-menu-list__meta">
              <span class="admin-chip">Nápoj</span>
              <span class="admin-menu-list__price">89 Kč</span>
            </div>
          </li>
          <li>
            <div>
              <h3>Cheeseboard Deluxe</h3>
              <p>Výběr čtyř sýrů, domácí džem a čerstvé pečivo. Ideální ke sdílení.</p>
            </div>
            <div class="admin-menu-list__meta">
              <span class="admin-chip">Jídlo</span>
              <span class="admin-menu-list__price">219 Kč</span>
            </div>
          </li>
          <li>
            <div>
              <h3>Temný Porter Orion</h3>
              <p>Plné tělo, tóny hořké čokolády a karamelu. Limitovaná edice.</p>
            </div>
            <div class="admin-menu-list__meta">
              <span class="admin-chip">Speciál</span>
              <span class="admin-menu-list__price">95 Kč</span>
            </div>
          </li>
        </ul>
        <div class="admin-panel__note">Filtrování a úpravy položek se zpřístupní po dokončení napojení na databázi.</div>
      </div>

      <div class="admin-panel" aria-labelledby="contact-messages">
        <div class="admin-panel__header">
          <div>
            <h2 id="contact-messages">Zprávy návštěvníků</h2>
            <p>Nejnovější reakce z kontaktního formuláře.</p>
          </div>
          <div class="admin-panel__actions">
            <button class="btn btn--ghost" type="button" disabled>Označit vše jako přečtené</button>
          </div>
        </div>
        <div class="admin-messages">
          <article class="admin-message">
            <header>
              <h3>Monika Horská</h3>
              <span>monika.horska@email.cz • 23. 5. 2024 20:14</span>
            </header>
            <p>Dobrý den, máte prosím k dispozici větší stůl pro 8 lidí v sobotu 1. 6.? Rádi bychom oslavili narozeniny.</p>
            <footer>
              <span class="admin-status admin-status--new">Nová zpráva</span>
              <button class="btn btn--ghost" type="button" disabled>Odpovědět</button>
            </footer>
          </article>
          <article class="admin-message">
            <header>
              <h3>Petr Král</h3>
              <span>petr.kral@email.cz • 23. 5. 2024 18:02</span>
            </header>
            <p>Zajímá nás, zda je možné rezervovat si turnaj v Carcassonne pro naši firmu. Jaké jsou prosím podmínky?</p>
            <footer>
              <span class="admin-status admin-status--pending">Čeká na odpověď</span>
              <button class="btn btn--ghost" type="button" disabled>Odpovědět</button>
            </footer>
          </article>
          <article class="admin-message">
            <header>
              <h3>Iveta Burešová</h3>
              <span>iveta.buresova@email.cz • 22. 5. 2024 09:27</span>
            </header>
            <p>Děkujeme za včerejší večer! Máte možnost zakoupit dárkový poukaz?</p>
            <footer>
              <span class="admin-status admin-status--info">Zaznamenáno</span>
              <button class="btn btn--ghost" type="button" disabled>Odpovědět</button>
            </footer>
          </article>
        </div>
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
