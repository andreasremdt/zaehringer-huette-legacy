<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
  <section class="about-section">
    <div class="container">
      <h2 class="fancy-title" id="beschreibung"><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
  </section>
<?php endif; ?>

<?php get_template_part('template-parts/feature-section'); ?>
<?php get_template_part('template-parts/facilities-section'); ?>

<?php if (is_active_sidebar('gallery')) {
  dynamic_sidebar('gallery');
} ?>

<?php get_template_part('template-parts/pricing-section'); ?>
<?php get_template_part('template-parts/booking-section'); ?>
<?php get_template_part('template-parts/contact-form'); ?>
<?php get_template_part('template-parts/google-maps'); ?>

<?php get_footer(); ?>