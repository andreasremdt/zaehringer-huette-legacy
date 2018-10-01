<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
  <section class="about-section">
    <div class="container">
      <h2 class="fancy-title" id="beschreibung"><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
  </section>
<?php endif; ?>

<section class="feature-section">
  <div class="container">
    <div class="row">
      <article class="col-6">
        <h3>Idyllische Natur</h3>
        <p><?= get_theme_mod('setting_feature-1'); ?></p>
        <svg width="50" height="50">
          <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbol-defs.svg#icon-mountain"></use>
        </svg>
      </article>
      <article class="col-6">
        <h3>Wintersport</h3>
        <p><?= get_theme_mod('setting_feature-2'); ?></p>
        <svg width="50" height="50">
          <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbol-defs.svg#icon-ski"></use>
        </svg>
      </article>
      <article class="col-6">
        <h3>Wanderwege</h3>
        <p><?= get_theme_mod('setting_feature-3'); ?></p>
        <svg width="50" height="50">
          <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbol-defs.svg#icon-trekking"></use>
        </svg>
      </article>
      <article class="col-6">
        <h3>Modern & Komfortabel</h3>
        <p><?= get_theme_mod('setting_feature-4'); ?></p>
        <svg width="50" height="50">
          <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbol-defs.svg#icon-wifi"></use>
        </svg>
      </article>
    </div>
  </div>
</section>

<section class="facilities-section">
  <div class="container">
    <h2 class="fancy-title" id="ausstattung">Ausstattung</h2>

    <div class="row">
      <article class="col-4">
        <?php if (is_active_sidebar('facilities-1')) {
          dynamic_sidebar('facilities-1');
        } ?>
      </article>
      
      <article class="col-4">
        <?php if (is_active_sidebar('facilities-2')) {
          dynamic_sidebar('facilities-2');
        } ?>
      </article>

      <article class="col-4">
        <?php if(is_active_sidebar('facilities-3')) {
          dynamic_sidebar('facilities-3');
        } ?>
      </article>
    </div>
  </div>
</section>


<?php if (is_active_sidebar('gallery')) {
  dynamic_sidebar('gallery');
} ?>

<section class="pricing-section">
  <div class="container">
    <h2 class="fancy-title" id="preise">Preise</h2>
    
    <div class="row">
      <div class="col" data-card="summer">
        <?php if (is_active_sidebar('prices-summer')) {
          dynamic_sidebar('prices-summer');
        } ?>
      </div>
      <div class="col" data-card="winter">
        <?php if (is_active_sidebar('prices-winter')) {
          dynamic_sidebar('prices-winter');
        } ?>
      </div>
    </div>
    <?php if (is_active_sidebar('prices-infos')) : ?>
      <div class="bottom">
        <?php dynamic_sidebar('prices-infos'); ?>
      </div>
    <?php endif; ?>

    <a href="#reservieren" class="button" data-link>Jetzt Reservieren</a>
  </div>
</section>

<?php get_template_part('template-parts/contact-form'); ?>
<?php get_template_part('template-parts/google-maps'); ?>

<?php get_footer(); ?>