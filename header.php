<!doctype html>
<html <?php language_attributes() ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head() ?>
  </head>
  <body <?php body_class() ?>>
    <div class="offcanvas-search advanced-search" id="form" role="tabpanel" aria-labelledby="venta-tab">
      <h2 class="page-header text-center"><?php _e('Buscar Propiedad') ?></h2>
      <form class="p-4" action="<?php echo home_url() ?>" method="get">
        <?php get_template_part('templates/search', 'vertical') ?>
        <input type="hidden" name="accion" id="action" value="venta">
        <input type="hidden" name="s" value="">
      </form>
    </div>
    <nav class="headerNav navbar navbar-expand-lg fixed-top navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo@2x.png" alt="<?php bloginfo('name') ?>" height="60" /></a>
        <div class="">
          <button class="offcanvas-search-toggler bg-transparent border-0 p-0 mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
          </button>
          <button class="navbar-toggler border-0 p-0 mr-0" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="mainNav">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_id' => '', 'menu_class' => 'navbar-nav ml-auto', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>
        </div>
      </div>
    </nav>
