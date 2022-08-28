<?php get_template_part( 'template-parts/part-footer' ); ?>
  <?php wp_footer(); ?>
  <script type='text/javascript' src="<?php emw_the_js_url( 'utilities.js' ); ?>"></script>
  <script type='text/javascript' src="<?php emw_the_js_url( 'main.js' ); ?>"></script>
  <?php emw_the_custom_body_js(); ?>
</body>
</html>
<?php emw_render(); ?>