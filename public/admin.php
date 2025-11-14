<?php
$brandName = 'BoardZone';
$pageTitle = 'Administrace';
$pageDescription = 'Interní administrační rozhraní BoardZone pro správu rezervací, menu a zpráv.';
require __DIR__ . '/partials/head.php';
?>
<main id="main-content" class="main">
  <section class="section admin-hero" aria-labelledby="admin-title">
    <div class="shell admin-hero__inner">
      <div>
        <p class="eyebrow">Interní správa</p>
        <h1 id="admin-title">Administrace BoardZone</h1>
        <p class="admin-hero__lead">Spravujte rezervace, menu a zprávy od hostů na jednom místě. Data jsou zatím pouze demonstrativní.</p>
      </div>
      <div class="admin-hero__actions">
        <a class="btn btn--ghost" href="<?php echo htmlspecialchars($baseUrl . '/index.php', ENT_QUOTES, 'UTF-8'); ?>">⬅ Zpět na web</a>
        <button class="btn btn--primary" type="button" data-js="admin-open-login">Přihlásit jiného uživatele</button>
      </div>
    </div>
  </section>

  <section class="section admin-section" aria-labelledby="reservation-heading">
    <div class="shell">
      <header class="section__header admin-section__header">
        <div>
          <h2 id="reservation-heading">Přehled rezervací</h2>
          <p class="section__subtext">Aktuálně plánované rezervace s poznámkami hostů.</p>
        </div>
        <button class="btn btn--ghost" type="button">Exportovat</button>
      </header>
      <div class="admin-table" role="region" aria-live="polite">
        <table>
          <caption class="sr-only">Seznam nadcházejících rezervací</caption>
          <thead>
            <tr>
              <th scope="col">Jméno</th>
              <th scope="col">Datum</th>
              <th scope="col">Čas</th>
              <th scope="col">Počet osob</th>
              <th scope="col">Poznámka</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Lucie H.</td>
              <td>18. 4. 2024</td>
              <td>19:00</td>
              <td>4</td>
              <td>Preferuje kooperativní hry.</td>
            </tr>
            <tr>
              <td>Martin K.</td>
              <td>19. 4. 2024</td>
              <td>20:30</td>
              <td>2</td>
              <td>Oslava výročí, prosí klidný stůl.</td>
            </tr>
            <tr>
              <td>Jana P.</td>
              <td>20. 4. 2024</td>
              <td>17:00</td>
              <td>6</td>
              <td>Chce vyzkoušet nové strategické tituly.</td>
            </tr>
            <tr>
              <td>Team Dev.cz</td>
              <td>21. 4. 2024</td>
              <td>18:30</td>
              <td>8</td>
              <td>Firemní meetup, potřeba projektor.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section class="section admin-section" aria-labelledby="menu-heading">
    <div class="shell admin-menu">
      <header class="section__header admin-section__header">
        <div>
          <h2 id="menu-heading">Úprava menu restaurace</h2>
          <p class="section__subtext">Přidejte nové položky a upravte ty stávající. Údaje se zatím pouze zobrazují.</p>
        </div>
        <button class="btn btn--ghost" type="button">Přidat kategorii</button>
      </header>
      <div class="admin-menu__grid">
        <form class="card admin-form" novalidate>
          <h3>Nová položka menu</h3>
          <label class="form__field">
            <span>Název položky</span>
            <input type="text" name="item-name" placeholder="Např. Imperial Stout" required>
          </label>
          <label class="form__field">
            <span>Cena</span>
            <input type="number" name="price" min="0" step="1" placeholder="135" required>
          </label>
          <label class="form__field">
            <span>Popis</span>
            <textarea name="description" rows="3" placeholder="Krátký popis a doporučení ke hře." required></textarea>
          </label>
          <label class="form__field">
            <span>Kategorie</span>
            <select name="category" required>
              <option value="" disabled selected>Vyberte kategorii</option>
              <option>Speciální piva</option>
              <option>Koktejly</option>
              <option>Teplé nápoje</option>
              <option>Jídlo</option>
            </select>
          </label>
          <button class="btn btn--primary" type="submit" disabled data-tooltip="Ukládání bude brzy dostupné">Uložit návrh</button>
        </form>
        <div class="card admin-menu__list">
          <h3>Existující položky</h3>
          <ul>
            <li>
              <div>
                <h4>Imperial Stout „Dark Portal”</h4>
                <p>Silný stout s nádechem čokolády a pražené kávy.</p>
              </div>
              <span>139 Kč · Speciální piva</span>
            </li>
            <li>
              <div>
                <h4>Sharing Platter „Meeple Feast”</h4>
                <p>Výběr sýrů, uzenin a snacků pro celou partu.</p>
              </div>
              <span>289 Kč · Jídlo</span>
            </li>
            <li>
              <div>
                <h4>Mocktail „Critical Hit”</h4>
                <p>Ovocná limonáda s yuzu, zázvorem a třtinovým cukrem.</p>
              </div>
              <span>115 Kč · Koktejly</span>
            </li>
            <li>
              <div>
                <h4>Káva „Mana Potion”</h4>
                <p>Dvojité espresso s domácí šlehačkou a skořicí.</p>
              </div>
              <span>75 Kč · Teplé nápoje</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="section admin-section" aria-labelledby="messages-heading">
    <div class="shell">
      <header class="section__header admin-section__header">
        <div>
          <h2 id="messages-heading">Zprávy od uživatelů</h2>
          <p class="section__subtext">Rychlý přehled dotazů a zpětné vazby z kontaktního formuláře.</p>
        </div>
        <button class="btn btn--ghost" type="button">Archivovat vše</button>
      </header>
      <div class="admin-messages">
        <article class="card admin-message">
          <header>
            <h3>Klára S.</h3>
            <span><a href="mailto:klara@example.com">klara@example.com</a></span>
          </header>
          <p>Rádi bychom uspořádali narozeninový večer pro 12 lidí. Je možné rezervovat celý salonek?</p>
          <footer>
            <time datetime="2024-04-16">16. 4. 2024</time>
            <div class="admin-message__actions">
              <button class="btn btn--ghost" type="button">Odpovědět</button>
              <button class="btn btn--ghost" type="button">Archivovat</button>
            </div>
          </footer>
        </article>
        <article class="card admin-message">
          <header>
            <h3>Roman T.</h3>
            <span><a href="mailto:roman@example.com">roman@example.com</a></span>
          </header>
          <p>Máte v nabídce nějaké retro hry z 80. let? Hledáme něco tematického pro firemní akci.</p>
          <footer>
            <time datetime="2024-04-15">15. 4. 2024</time>
            <div class="admin-message__actions">
              <button class="btn btn--ghost" type="button">Odpovědět</button>
              <button class="btn btn--ghost" type="button">Archivovat</button>
            </div>
          </footer>
        </article>
        <article class="card admin-message">
          <header>
            <h3>Eva B.</h3>
            <span><a href="mailto:eva@example.com">eva@example.com</a></span>
          </header>
          <p>Dáte mi prosím vědět, až bude dostupná nová edice Gloomhaven? Ráda bych si ji u vás zahrála.</p>
          <footer>
            <time datetime="2024-04-14">14. 4. 2024</time>
            <div class="admin-message__actions">
              <button class="btn btn--ghost" type="button">Odpovědět</button>
              <button class="btn btn--ghost" type="button">Archivovat</button>
            </div>
          </footer>
        </article>
      </div>
    </div>
  </section>
</main>

<div class="admin-login" role="dialog" aria-modal="true" aria-labelledby="admin-login-title" hidden data-js="admin-login">
  <div class="admin-login__dialog" role="document">
    <header>
      <h2 id="admin-login-title">Přihlášení do administrace</h2>
      <p>Pro přístup k administračním funkcím zadejte své údaje.</p>
    </header>
    <form class="admin-login__form" novalidate>
      <label class="form__field">
        <span>E-mail</span>
        <input type="email" name="email" autocomplete="username" required placeholder="admin@boardzone.cz">
      </label>
      <label class="form__field">
        <span>Heslo</span>
        <input type="password" name="password" autocomplete="current-password" required placeholder="••••••••">
      </label>
      <div class="admin-login__actions">
        <button class="btn btn--ghost" type="button" data-js="admin-cancel-login">Zrušit</button>
        <button class="btn btn--primary" type="submit" data-js="admin-confirm-login">Přihlásit</button>
      </div>
    </form>
  </div>
</div>

<script>
  (function () {
    const loginDialog = document.querySelector('[data-js="admin-login"]');
    const openButtons = document.querySelectorAll('[data-js="admin-open-login"]');
    const confirmButton = document.querySelector('[data-js="admin-confirm-login"]');
    const cancelButton = document.querySelector('[data-js="admin-cancel-login"]');
    const focusableSelectors = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
    let lastFocusedElement = null;

    const openLogin = () => {
      if (!loginDialog) return;
      lastFocusedElement = document.activeElement;
      loginDialog.hidden = false;
      const focusable = loginDialog.querySelectorAll(focusableSelectors);
      if (focusable.length) {
        focusable[0].focus();
      }
      document.body.classList.add('admin-login-open');
    };

    const closeLogin = () => {
      if (!loginDialog) return;
      loginDialog.hidden = true;
      document.body.classList.remove('admin-login-open');
      if (lastFocusedElement instanceof HTMLElement) {
        lastFocusedElement.focus();
      }
    };

    const trapFocus = (event) => {
      if (!loginDialog || loginDialog.hidden) return;
      const focusable = Array.from(loginDialog.querySelectorAll(focusableSelectors)).filter(el => !el.hasAttribute('disabled'));
      if (!focusable.length) return;
      const first = focusable[0];
      const last = focusable[focusable.length - 1];
      if (event.key === 'Tab') {
        if (event.shiftKey && document.activeElement === first) {
          event.preventDefault();
          last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
          event.preventDefault();
          first.focus();
        }
      }
      if (event.key === 'Escape') {
        closeLogin();
      }
    };

    openButtons.forEach((button) => button.addEventListener('click', openLogin));
    confirmButton?.addEventListener('click', (event) => {
      event.preventDefault();
      closeLogin();
    });
    cancelButton?.addEventListener('click', (event) => {
      event.preventDefault();
      closeLogin();
    });
    document.addEventListener('keydown', trapFocus);

    window.addEventListener('load', openLogin, { once: true });
  })();
</script>
</body>
</html>
