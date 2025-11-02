<?php
$brandName = 'BoardZone';
$pageTitle = 'Kontakt';
$currentPage = 'contact';
require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';
// TODO: Symfony route/controller/view
?>
<main id="main-content" class="main">
  <section class="section">
    <div class="shell contact-grid">
      <div>
        <h1>Kontakt &amp; informace</h1>
        <p>Ozvěte se nám, pokud máte dotazy k rezervacím, firemním večírkům nebo speciálním přáním pro vaši herní partu.</p>
        <ul class="contact-list">
          <li><strong>Adresa:</strong> Rohanská 42, Praha 8</li>
          <li><strong>Telefon:</strong> <a href="tel:+420777123456">+420 777 123 456</a></li>
          <li><strong>E-mail:</strong> <a href="mailto:ahoj@boardzone.cz">ahoj@boardzone.cz</a></li>
        </ul>
        <div class="hours-table">
          <table>
            <caption>Otevírací doba</caption>
            <tbody>
              <tr><th scope="row">Po–Čt</th><td>16:00–23:00</td></tr>
              <tr><th scope="row">Pá–So</th><td>14:00–01:00</td></tr>
              <tr><th scope="row">Ne</th><td>14:00–22:00</td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <div>
        <form class="contact-form" novalidate>
          <h2>Napište nám</h2>
          <label class="form__field">
            <span>Jméno</span>
            <input type="text" name="name" autocomplete="name" required>
          </label>
          <label class="form__field">
            <span>E-mail</span>
            <input type="email" name="email" autocomplete="email" required>
          </label>
          <label class="form__field">
            <span>Zpráva</span>
            <textarea name="message" rows="4" required placeholder="Sdělte nám, s čím vám můžeme pomoct."></textarea>
          </label>
          <button class="btn btn--primary" type="submit" disabled data-tooltip="Odesílání bude dostupné brzy">Odeslat</button>
        </form>
      </div>
      <div class="map-placeholder map-placeholder--contact" aria-label="Mapa BoardZone">
        <p>Interaktivní mapa bude doplněna.</p>
        <a class="btn btn--ghost" href="#">Otevřít v Mapách</a>
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
