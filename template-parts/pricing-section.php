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