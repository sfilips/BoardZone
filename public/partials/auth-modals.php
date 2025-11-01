<div class="modal" id="login-modal" role="dialog" aria-modal="true" aria-labelledby="login-title" hidden>
  <div class="modal__overlay" data-js="modal-overlay"></div>
  <div class="modal__dialog" role="document">
    <button class="modal__close" type="button" aria-label="Zavřít" data-js="close-modal">&times;</button>
    <h2 id="login-title">Přihlášení</h2>
    <form class="form" novalidate>
      <label class="form__field">
        <span>E-mail</span>
        <input type="email" name="email" autocomplete="email" required>
      </label>
      <label class="form__field">
        <span>Heslo</span>
        <input type="password" name="password" autocomplete="current-password" required>
      </label>
      <label class="form__check">
        <input type="checkbox" name="remember">
        <span>Zapamatovat</span>
      </label>
      <button class="btn btn--primary" type="submit" data-js="simulate-login">Přihlásit se</button>
      <p class="form__hint"><a href="#">Zapomenuté heslo</a></p>
    </form>
  </div>
</div>

<div class="modal" id="register-modal" role="dialog" aria-modal="true" aria-labelledby="register-title" hidden>
  <div class="modal__overlay" data-js="modal-overlay"></div>
  <div class="modal__dialog" role="document">
    <button class="modal__close" type="button" aria-label="Zavřít" data-js="close-modal">&times;</button>
    <h2 id="register-title">Registrace</h2>
    <form class="form" novalidate>
      <label class="form__field">
        <span>Jméno</span>
        <input type="text" name="name" autocomplete="name" required>
      </label>
      <label class="form__field">
        <span>E-mail</span>
        <input type="email" name="email" autocomplete="email" required>
      </label>
      <label class="form__field">
        <span>Heslo</span>
        <input type="password" name="password" autocomplete="new-password" required>
      </label>
      <label class="form__field">
        <span>Potvrzení hesla</span>
        <input type="password" name="password_confirm" autocomplete="new-password" required>
      </label>
      <label class="form__check">
        <input type="checkbox" name="gdpr" required>
        <span>Souhlasím se zpracováním osobních údajů.</span>
      </label>
      <button class="btn btn--primary" type="submit" data-js="simulate-register">Registrovat</button>
    </form>
  </div>
</div>
<?php // TODO: Symfony security modals ?>
