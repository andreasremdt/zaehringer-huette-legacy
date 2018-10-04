<nav class="main-navigation">
  <div class="container">
    <button type="button" data-menu-button>
      <svg width="25" height="25">
        <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbol-defs.svg#icon-menu"></use>
      </svg>
      <span>Menu anzeigen</span>
    </button>
    <?php if (is_front_page()) : ?>
      <?php wp_nav_menu(array(
        'theme_location' => 'main_menu',
        'container' => 'ul',
        'menu_class' => 'links',
        'items_wrap' => '<ul data-menu class="links">%3$s</ul>'
      )); ?>
    <?php else : ?>
      <ul class="links">
        <li>
          <a href="<?php bloginfo('url'); ?>">Zurück zur Homepage</a>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>