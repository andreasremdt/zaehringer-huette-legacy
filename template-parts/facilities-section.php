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