<?php
$brandName = 'BoardZone';
$pageTitle = 'Administrace';
$currentPage = '';
require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';
// TODO: Symfony route/controller/view
?>
<main id="main-content" class="main admin-page">
  <section class="section">
    <div class="shell admin-overview">
      <header class="admin-overview__header">
        <p class="eyebrow">Interní rozhraní</p>
        <h1>Administrace BoardZone</h1>
        <p>Spravujte rezervace, aktualizujte nabídku a odpovídejte na dotazy hostů z jednoho místa.</p>
      </header>
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
