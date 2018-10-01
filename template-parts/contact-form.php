<section class="contact-section">
  <div class="container">
    <h2 class="fancy-title" id="kontakt">Kontakt</h2>
    <p class="text">Haben Sie Fragen oder Unklarheiten? Gerne können Sie mit uns Kontakt aufnehmen. Füllen Sie dazu einfach das Formular aus. Alternativ senden Sie uns eine E-Mail an <a href="mailto:kontakt@zaehringer-huette.de">kontakt@zaehringer-huette.de</a>.</p>

    <form action="<?php echo bloginfo('url'); ?>/send" method="post" data-contact-form>
      <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Vor- und Nachname *" aria-label="Ihr Vorname" required minlength="2">
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-Mail-Adresse *" aria-label="Ihre E-Mail-Adresse" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <input type="number" name="phone" class="form-control" placeholder="Telefonnummer" aria-label="Ihre Telefonnummer">
          </div>
        </div>
      </div>
      <div class="form-group">
        <textarea name="message" class="form-control" placeholder="Nachricht *" aria-label="Ihre Nachricht" cols="30" rows="10" required></textarea>
      </div>
      <input type="checkbox" name="contact-by-fax-only" value="0" class="tricky js-tricky" tabindex="-1" aria-hidden="true">
      <button type="submit" class="button">Nachricht senden</button>
    </form>
  </div>
</section>