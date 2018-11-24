<!doctype html>
<html <?php language_attributes() ?> style="margin-top: 0 !important;">
  <head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head() ?>
  </head>
  <body <?php body_class() ?>>

    <?php if(wp_is_mobile()) : ?>
    <div class="offcanvas-search advanced-search" id="form" role="tabpanel" aria-labelledby="venta-tab">
      <h2 class="page-header text-center"><?php _e('Buscar Propiedad') ?></h2>

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="form-tab" data-toggle="tab" data-type="venta" href="#form" role="tab" aria-controls="venta" aria-selected="true">Venta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" data-type="alquiler" role="tab" aria-controls="alquiler" aria-selected="false">Alquiler</a>
        </li>
      </ul>
      <div class="tab-content bg-light pb-5" id="myTabContent" style="box-shadow: none;">
        <div class="tab-pane show active" id="form" role="tabpanel" aria-labelledby="venta-tab">
          <form class="p-3" action="<?php echo home_url() ?>" method="get">
            <?php get_template_part('templates/search', 'vertical') ?>
            <input type="hidden" name="accion" id="action" value="venta">
            <input type="hidden" name="s" value="">
          </form>
        </div>
      </div>

      <!-- <form class="p-4" action="<?php echo home_url() ?>" method="get">
        <?php //get_template_part('templates/search', 'vertical') ?>
        <input type="hidden" name="accion" id="action" value="venta">
        <input type="hidden" name="s" value="">
      </form> -->
    </div>
    <?php endif; ?>

    <div class="topbar fixed-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-8">
            <div class="d-flex justify-content-between justify-content-md-start">
              <a href="tel:18098041718" class="mr-3 d-none d-md-inline-block">
                <i class="fas fa-phone" style="transform: rotate(100deg);"></i>
                <span class="d-none d-md-inline-block">1-809-804-1718</span>
              </a>
              <a href="mailto:inversionisto@gmail.com" class="d-none d-md-inline-block">
                <i class="fas fa-envelope"></i>
                <span class="d-none d-md-inline-block">inversionisto@gmail.com</span>
              </a>
              <div class="social-icons d-inline-block d-md-none">
                <a href="https://facebook.com/inversionisto" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com/inversionisto" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="/contacto/"><i class="fa fa-envelope"></i></a>
                <a href="tel:+18098041718"><i class="fa fa-phone"></i></a>
              </div>
              <div class="d-inline-block ml-auto ml-md-4 pr-5">
                <div id="google_translate_element"></div><script type="text/javascript">
                function googleTranslateElementInit() {
                  new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                }
                </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
              </div>
            </div>
          </div>
          <div class="col-md-4 text-md-right d-none d-md-block">
            <div class="social-icons">
              <a href="/wp-admin/" class="mr-5"><i class="fas fa-unlock"></i> Agentes</a>
              <a href="https://facebook.com/inversionisto" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="https://instagram.com/inversionisto" target="_blank"><i class="fab fa-instagram"></i></a>
              <a href="mailto:inversionisto@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
              <a href="tel:+18098041718" target="_blank"><i class="fa fa-phone"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="headerNav navbar navbar-expand-lg fixed-top navbar-light">

      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url() ?>"><img class="w-auto" src="<?php echo get_template_directory_uri() ?>/assets/images/logo@2x.png" alt="<?php bloginfo('name') ?>" height="60" /></a>
        <div class="">
          <?php if(wp_is_mobile()) : ?>
          <button class="offcanvas-search-toggler bg-transparent border-0 p-0 mr-2 d-lg-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
          </button>
          <?php endif; ?>
          <button class="navbar-toggler border-0 p-0 mr-0" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="mainNav">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_id' => '', 'menu_class' => 'navbar-nav ml-auto', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>
        </div>
      </div>
    </nav>
