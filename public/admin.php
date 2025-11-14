<?php
$brandName = 'BoardZone';
$pageTitle = 'Administrace';
$pageDescription = 'Dashboard pro správu rezervací a menu BoardZone.';
require __DIR__ . '/partials/head.php';
?>

<main id="main-content" class="main admin-main admin-main--locked" data-js="admin-content" aria-hidden="true">
  <section class="admin-top">
    <div class="shell admin-top__inner">
      <div class="admin-top__copy">
        <p class="eyebrow">Administrace</p>
        <h1>Vítejte zpět, herní mistře</h1>
        <p class="admin-top__lead">Spravujte rezervace, aktualizujte nabídku a mějte přehled o zprávách hostů na jednom místě.</p>
      </div>
      <div class="admin-top__actions">
        <a class="btn btn--ghost" href="<?php echo htmlspecialchars($baseUrl . '/index.php', ENT_QUOTES, 'UTF-8'); ?>">Zpět na web</a>
        <button class="btn btn--primary" type="button" data-js="open-login">Přepnout účet</button>
      </div>
    </div>
  </section>

  <section class="section admin-section">
    <div class="shell admin-section__inner">
      <header class="admin-section__header">
        <div>
          <h2>Přehled rezervací</h2>
          <p>Aktuální potvrzené rezervace na tento týden.</p>
        </div>
        <button class="btn btn--ghost" type="button">Exportovat</button>
      </header>
      <div class="admin-card">
        <div class="admin-table" role="region" aria-live="polite">
          <table>
            <thead>
              <tr>
                <th scope="col">Jméno</th>
                <th scope="col">Datum</th>
                <th scope="col">Čas</th>
                <th scope="col">Osob</th>
                <th scope="col">Poznámka</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Martin K.</td>
                <td>22. 4. 2024</td>
                <td>18:30</td>
                <td>4</td>
                <td>Preferuje stůl u knihovny.</td>
              </tr>
              <tr>
                <td>Petra S.</td>
                <td>22. 4. 2024</td>
                <td>20:00</td>
                <td>2</td>
                <td>Chce vyzkoušet Azul.</td>
              </tr>
              <tr>
                <td>Jan R.</td>
                <td>23. 4. 2024</td>
                <td>19:00</td>
                <td>6</td>
                <td>Firemní teambuilding.</td>
              </tr>
              <tr>
                <td>Lucie V.</td>
                <td>24. 4. 2024</td>
                <td>17:00</td>
                <td>3</td>
                <td>Bezlepkové občerstvení.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <section class="section admin-section">
    <div class="shell admin-section__inner admin-section__inner--split">
      <div class="admin-card">
        <header class="admin-section__header admin-section__header--compact">
          <div>
            <h2>Úprava menu restaurace</h2>
            <p>Rychlá úprava nabídky nápojů a jídel.</p>
          </div>
        </header>
        <form class="admin-form" action="#" method="post">
          <label>
            <span>Název položky</span>
            <input type="text" name="item-name" placeholder="Např. IPA BoardMaster">
          </label>
          <div class="admin-form__row">
            <label>
              <span>Cena</span>
              <input type="text" name="item-price" placeholder="135 Kč">
            </label>
            <label>
              <span>Kategorie</span>
              <select name="item-category">
                <option value="drink">Nápoje</option>
                <option value="food">Jídlo</option>
                <option value="dessert">Dezerty</option>
              </select>
            </label>
          </div>
          <label>
            <span>Popis</span>
            <textarea name="item-description" placeholder="Krátký popis položky"></textarea>
          </label>
          <div class="admin-form__actions">
            <button class="btn btn--primary" type="submit" disabled data-tooltip="Brzy dostupné">Uložit změny</button>
            <button class="btn btn--ghost" type="reset">Resetovat</button>
          </div>
        </form>
      </div>
      <div class="admin-card">
        <h3 class="admin-subheading">Aktuální nabídka</h3>
        <ul class="admin-menu-list">
          <li>
            <div>
              <strong>IPA BoardMaster</strong>
              <p>Šťavnatá IPA z lokálního pivovaru s citrusovým aroma.</p>
            </div>
            <span class="admin-price">135 Kč</span>
          </li>
          <li>
            <div>
              <strong>Prkénko pro 2</strong>
              <p>Výběr sýrů, uzenin a dipů pro sdílení.</p>
            </div>
            <span class="admin-price">289 Kč</span>
          </li>
          <li>
            <div>
              <strong>Espresso Tesseract</strong>
              <p>Double shot z pražírny Doubleshot, podávaný s vodou.</p>
            </div>
            <span class="admin-price">65 Kč</span>
          </li>
          <li>
            <div>
              <strong>Matcha cheesecake</strong>
              <p>Krémový cheesecake s jemnou matcha polevou.</p>
            </div>
            <span class="admin-price">92 Kč</span>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="section admin-section">
    <div class="shell admin-section__inner">
      <header class="admin-section__header">
        <div>
          <h2>Zprávy od uživatelů</h2>
          <p>Reakce na kontaktní formulář jsou seřazeny od nejnovějších.</p>
        </div>
      </header>
      <div class="admin-grid">
        <article class="admin-card admin-card--message">
          <header>
            <h3>Alena B.</h3>
            <p class="admin-meta">alena.b@seznam.cz</p>
          </header>
          <p>„Rádi bychom si rezervovali větší stůl na sobotní turnaj v Carcassonne. Je možné přidat další občerstvení?“</p>
        </article>
        <article class="admin-card admin-card--message">
          <header>
            <h3>Tomáš L.</h3>
            <p class="admin-meta">tomas.l@example.com</p>
          </header>
          <p>„Dá se u vás uspořádat firemní večer pro 15 lidí? Jaká je kapacita knihovny her?“</p>
        </article>
        <article class="admin-card admin-card--message">
          <header>
            <h3>Veronika P.</h3>
            <p class="admin-meta">veru.p@email.cz</p>
          </header>
          <p>„Můžete doporučit kooperativní hry pro začátečníky? Přijdeme v pátek čtyři.“</p>
        </article>
      </div>
    </div>
  </section>
</main>

<div class="admin-modal" data-js="admin-login-modal" role="dialog" aria-modal="true" aria-labelledby="admin-login-title">
  <div class="admin-modal__backdrop" data-js="modal-backdrop"></div>
  <div class="admin-modal__dialog" role="document">
    <button class="admin-modal__close" type="button" aria-label="Zavřít" data-js="close-modal">&times;</button>
    <div class="admin-modal__header">
      <p class="eyebrow">BoardZone admin</p>
      <h2 id="admin-login-title">Přihlaste se</h2>
      <p class="admin-meta">Přístup pouze pro zaměstnance. Zadejte své přihlašovací údaje.</p>
    </div>
    <form class="admin-modal__form" action="#" method="post" novalidate>
      <label>
        <span>E-mail</span>
        <input type="email" name="email" autocomplete="username" placeholder="admin@boardzone.cz" required>
      </label>
      <label>
        <span>Heslo</span>
        <input type="password" name="password" autocomplete="current-password" placeholder="••••••••" required>
      </label>
      <button class="btn btn--primary admin-modal__submit" type="submit">Přihlásit</button>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.querySelector('[data-js="admin-login-modal"]');
    const backdrop = modal?.querySelector('[data-js="modal-backdrop"]');
    const closeBtn = modal?.querySelector('[data-js="close-modal"]');
    const form = modal?.querySelector('form');
    const adminContent = document.querySelector('[data-js="admin-content"]');
    const reopenTriggers = document.querySelectorAll('[data-js="open-login"]');

    if (!modal || !form || !adminContent) {
      return;
    }

    const openModal = () => {
      modal.classList.remove('is-hidden');
      modal.removeAttribute('aria-hidden');
      adminContent.classList.add('admin-main--locked');
      adminContent.setAttribute('aria-hidden', 'true');
      const firstField = form.querySelector('input, select, textarea, button');
      if (firstField) {
        firstField.focus({ preventScroll: false });
      }
    };

    const closeModal = () => {
      modal.classList.add('is-hidden');
      modal.setAttribute('aria-hidden', 'true');
      adminContent.classList.remove('admin-main--locked');
      adminContent.removeAttribute('aria-hidden');
      adminContent.focus({ preventScroll: false });
    };

    form.addEventListener('submit', function (event) {
      event.preventDefault();
      closeModal();
    });

    closeBtn?.addEventListener('click', closeModal);
    backdrop?.addEventListener('click', closeModal);
    reopenTriggers.forEach((trigger) => {
      trigger.addEventListener('click', openModal);
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && !modal.classList.contains('is-hidden')) {
        closeModal();
      }
    });

    adminContent.setAttribute('tabindex', '-1');
    openModal();
  });
</script>

</body>
</html>
