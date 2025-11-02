<?php
$brandName = 'BoardZone';
$pageTitle = 'Domů';
$currentPage = 'home';
require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/header.php';
// TODO: Symfony route/controller/view
?>
<main id="main-content" class="main">
  <section class="hero">
    <div class="shell hero__inner">
      <div class="hero__copy">
        <p class="eyebrow">Deskové hry &amp; řemeslné pivo</p>
        <h1>Deskové hry &amp; pivo. Rezervuj stůl online.</h1>
        <p>Vyrazte s partou na večer plný strategií, příběhů a speciálních piv. Rezervace zvládnete během pár kliknutí.</p>
        <div class="hero__actions">
          <a class="btn btn--primary" href="<?php echo $baseUrl; ?>/reservation.php">Rezervovat stůl</a>
        </div>
      </div>
      <div class="hero__media">
        <picture>
          <source srcset="<?php echo $baseUrl; ?>/assets/img/hero-board.svg" media="(min-width: 768px)">
          <img src="<?php echo $baseUrl; ?>/assets/img/hero-board.svg" alt="Deskové hry a pivo" loading="lazy">
        </picture>
      </div>
    </div>
  </section>

  <section class="section how-it-works">
    <div class="shell">
      <h2>Jak to funguje</h2>
      <div class="grid grid--cols-3">
        <article class="card">
          <h3>1. Vyberte termín</h3>
          <p>Zvolte datum, čas a délku sezení podle nálady vaší skupiny.</p>
        </article>
        <article class="card">
          <h3>2. Zarezervujte stůl</h3>
          <p>Mrkněte na kapacity stolů a rezervujte si ideální místo.</p>
        </article>
        <article class="card">
          <h3>3. Užijte si večer</h3>
          <p>Přijďte, vyberte hru z knihovny a objednejte si k tomu skvělé pití i něco na zub.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section menu-preview">
    <div class="shell">
      <div class="section__header">
        <h2>Ochutnejte naše menu</h2>
        <a class="btn btn--link" href="<?php echo $baseUrl; ?>/menu.php">Celé menu</a>
      </div>
      <div class="menu-preview__lists">
        <div>
          <h3>Nápoje</h3>
          <ul>
            <li><span>IPA 12°</span><span>69 Kč</span></li>
            <li><span>Stout s kakaem</span><span>75 Kč</span></li>
            <li><span>Domácí limonáda</span><span>55 Kč</span></li>
          </ul>
        </div>
        <div>
          <h3>Jídlo</h3>
          <ul>
            <li><span>BoardZone burger</span><span>189 Kč</span></li>
            <li><span>Vegetariánský wrap</span><span>149 Kč</span></li>
            <li><span>Cheese &amp; dip set</span><span>129 Kč</span></li>
          </ul>
        </div>
        <div>
          <h3>Snacky</h3>
          <ul>
            <li><span>Nachos &amp; dip</span><span>89 Kč</span></li>
            <li><span>Trhané maso sliders</span><span>139 Kč</span></li>
            <li><span>Karamelizované ořechy</span><span>69 Kč</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="section venue-info">
    <div class="shell venue-info__grid">
      <div>
        <h2>Kde nás najdete</h2>
        <p>Najdete nás kousek od metra, atmosféru tvoří dřevo, světýlka a regály her připravené k vyzkoušení.</p>
        <p class="venue-info__hours">Otevíráme každý den, detailní časy najdete v sekci <a href="<?php echo $baseUrl; ?>/contact.php">Kontakt</a>.</p>
        <address>
          Rohanská 42, Praha 8<br>
          <a href="tel:+420777123456">+420 777 123 456</a><br>
          <a href="mailto:ahoj@boardzone.cz">ahoj@boardzone.cz</a>
        </address>
      </div>
      <div class="map-placeholder" aria-label="Mapa BoardZone">
        <p>Mapa se připravuje.</p>
        <a class="btn btn--ghost" href="#">Otevřít v Mapách</a>
      </div>
    </div>
  </section>

  <section class="section gallery">
    <div class="shell">
      <h2>Večer v BoardZone</h2>
      <div class="gallery__track" aria-label="Fotogalerie">
        <figure>
          <img src="<?php echo $baseUrl; ?>/assets/img/gallery-1.svg" alt="Pohled na stoly s deskovými hrami" loading="lazy">
        </figure>
        <figure>
          <img src="<?php echo $baseUrl; ?>/assets/img/gallery-2.svg" alt="Detail karetní hry" loading="lazy">
        </figure>
        <figure>
          <img src="<?php echo $baseUrl; ?>/assets/img/gallery-3.svg" alt="Skupina přátel hrající hru" loading="lazy">
        </figure>
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
