<!doctype html>
<html <?php language_attributes() ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head() ?>
  </head>
  <body <?php body_class() ?>>
    <nav class="headerNav navbar navbar-expand-lg fixed-top navbar-light">
      <div class="container">
        <a class="navbar-brand" href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo@2x.png" alt="<?php bloginfo('name') ?>" height="60" /></a>
        <button class="navbar-toggler border-0 p-0 mr-4" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_id' => '', 'menu_class' => 'navbar-nav ml-auto', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>
        </div>
      </div>
    </nav>
