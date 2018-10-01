    <footer class="main-footer">
      <div class="container">
        <p>&copy; <?php echo date('Y'); ?> bei Familie Effinger. Alle Rechte vorbehalten.</p>
        <?php wp_nav_menu(array(
          'theme_location' => 'footer_menu',
          'container' => 'nav',
          'items_wrap' => '<ul>%3$s</ul>'
        )); ?>
      </div>
    </footer>
    
    <?php wp_footer(); ?>
  </body>
</html>