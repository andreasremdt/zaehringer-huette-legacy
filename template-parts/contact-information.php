<div class="contact-information">
  <div class="container">
    <ul>
      <li>
        <a href="tel:<?= get_theme_mod('setting_contact_phone'); ?>">
          <svg width="18" height="18">
            <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbol-defs.svg#icon-phone"></use>
          </svg> <?= get_theme_mod('setting_contact_phone'); ?>
        </a>
      </li>
      <li>
        <a href="mailto:<?= get_theme_mod('setting_contact_email'); ?>">
          <svg width="18" height="18">
            <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbol-defs.svg#icon-email"></use>
          </svg> <?= get_theme_mod('setting_contact_email'); ?>
        </a>
      </li>
    </ul>
  </div>
</div>