<?php /** Template Name: Page Builder */ ?>

<?php get_header(); ?>
  <main class="main__wrapper">
    <?php Emw_Theme::page_builder( 'custom_builder' ); ?>
  </main>
<?php get_footer(); ?>