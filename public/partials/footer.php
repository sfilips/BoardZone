<footer class="site-footer">
  <div class="shell site-footer__inner">
    <div>
      <h2 class="site-footer__title"><?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?></h2>
      <p>Rohanská 42, Praha 8</p>
      <p><strong>Telefon:</strong> <a href="tel:+420777123456">+420 777 123 456</a></p>
      <p><strong>E-mail:</strong> <a href="mailto:ahoj@boardzone.cz">ahoj@boardzone.cz</a></p>
    </div>
    <div>
      <h3>Otevírací doba</h3>
      <ul class="footer-hours">
        <li><span>Po–Čt</span><span>16:00–23:00</span></li>
        <li><span>Pá–So</span><span>14:00–01:00</span></li>
        <li><span>Ne</span><span>14:00–22:00</span></li>
      </ul>
    </div>
    <div>
      <h3>Sledujte nás</h3>
      <ul class="footer-social">
        <li><a href="#" aria-label="Instagram"><span aria-hidden="true">⌗</span> Instagram</a></li>
        <li><a href="#" aria-label="Facebook"><span aria-hidden="true">𝔣</span> Facebook</a></li>
        <li><a href="#" aria-label="Discord"><span aria-hidden="true">☏</span> Discord</a></li>
      </ul>
    </div>
  </div>
  <div class="site-footer__bottom">
    <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($brandName, ENT_QUOTES, 'UTF-8'); ?>. Všechna práva vyhrazena.</p>
    <a href="#">Zásady ochrany osobních údajů</a>
  </div>
</footer>
<div class="mobile-cta-bar" data-js="mobile-cta">
  <a class="mobile-cta-bar__link" href="<?php echo $baseUrl; ?>/reservation.php">Rezervovat stůl</a>
</div>
<?php // TODO: Symfony layout footer slot ?>
