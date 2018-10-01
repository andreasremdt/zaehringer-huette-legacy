<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
  <main class="section-white">
    <div class="container">
      <h1 class="fancy-title"><?php the_title(); ?></h1>

      <?php the_content(); ?>
    </div>
  </main>    
<?php endif; ?>

<?php get_footer(); ?>