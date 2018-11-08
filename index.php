<?php
/* Template Name: Portada */

get_header();
?>

<section class="position-relative" style="margin-top: 85px;">
  <?php echo do_shortcode('[rev_slider alias="home-slider"]') ?>
  <div class="advanced-search d-none d-lg-block">
    <?php get_template_part('templates/advanced', 'search') ?>
  </div>
</section>

<main class="bg-light">
  <section class="featured">
    <div class="container">
      <div class="section-title">
        <h2><?php _e('Propiedades Destacadas') ?></h2>
        <p>These are the latest properties in the Sales category. You can create the list using the “latest listing shortcode” and show items by specific categories.</p>
      </div>
      <div class="owl-properties owl-carousel owl-theme">
        <?php
        $featured = new WP_Query(array(
          'post_type' => 'property',
          'showposts' => 6,
          'meta_query' => array(
            array(
              'key' => 'prop_featured',
              'value' => '1'
            )
          )
        ));

        while($featured->have_posts()) : $featured->the_post();
        ?>
        <div class="">
          <?php get_template_part('templates/property', 'listing') ?>
        </div>
        <?php endwhile; wp_reset_postdata() ?>
      </div>
    </div>
  </section>

  <section class="discover bg-white">
    <div class="container">
      <div class="section-title">
        <h2><?php _e('Encuentra el espacio de tus sueños') ?></h2>
        <p>These are the latest properties in the Sales category. You can create the list using the “latest listing shortcode” and show items by specific categories.</p>
      </div>
      <?php
      if( have_rows('featured_categories', 71) ):
        $count = 0;
        while ( have_rows('featured_categories', 71) ) : the_row();
          $count++;
          $category = get_term_by('id', get_sub_field('category'), 'prop_category');
      ?>
      <?php if($count === 1 || $count === 4) : ?>
      <div class="boxes-row">
        <?php endif; ?>
        <div class="box <?php if(get_sub_field('size') === "Big") : echo 'big-box'; endif; ?>" style="background-image: url(<?php the_sub_field('imagen'); ?>)">
          <a href="<?php echo get_term_link($category) ?>">
            <h4><?php echo $category->name; ?></h4>
            <p><?php echo $category->count; ?> propiedades</p>
          </a>
        </div>
        <?php if($count === 3 || $count === 6) : ?>
      </div>
      <?php
          endif;
        endwhile;
      endif;
      ?>
    </div>
  </section>

  <div style="clear: both;"></div>
  <section class="recent-properties bg-white">
    <div class="section-title">
      <h2><?php _e('Propiedades Recientes') ?></h2>
      <p>These are the latest properties in the Sales category. You can create the list using the “latest listing shortcode” and show items by specific categories.</p>
    </div>
    <div class="container">
      <div class="row">
        <?php
        $properties = new WP_Query(array(
          'post_type' => 'property',
          'showposts' => 6
        ));

        while($properties->have_posts()) : $properties->the_post();
        ?>
        <div class="col-md-4 mb-5">
          <?php get_template_part('templates/property', 'listing') ?>
        </div>
        <?php endwhile; wp_reset_postdata() ?>
      </div>
    </div>
    <div class="text-center">
      <a href="/propiedades/" class="btn btn-primary px-4 py-3 mb-5" style="height: auto;">Ver todas las propiedades</a>
    </div>
  </section>

  <div style="clear: both;"></div>
  <section class="testimonials">
    <div class="section-title pt-5">
      <h4><?php _e('Publicaciones Recientes') ?></h4>
      <h2><?php _e('Artículos de Interés') ?></h2>
    </div>
    <div class="container">
      <div class="row">
        <?php
        $posts = new WP_Query(array(
          'post_type' => 'post',
          'showposts' => 6
        ));

        while($posts->have_posts()) : $posts->the_post();
        ?>
        <div class="col-md-6 mb-5">
          <?php get_template_part('templates/blog', 'post') ?>
        </div>
        <?php endwhile; wp_reset_postdata() ?>
      </div>
    </div>
  </section>

  <div style="clear: both;"></div>
  <section class="newsletter">
    <div class="newsletter-form">
      <div class="section-title">
        <h4><?php _e('Recibe nuestras mejores ofertas') ?></h4>
        <h2><?php _e('Suscríbete a nuestra lista') ?></h2>
      </div>
      <!-- Replace the form action in the line below with your MailChimp embed action! For more informatin on how to do this please visit the Docs! -->
      <form role="form" action="//inversionisto.us19.list-manage.com/subscribe/post?u=047cdcf4a790976d16e3d76cb&amp;id=f8d5adaf3d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
        <div class="input-group input-group-lg">
          <input type="email" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="Introduce tu correo aquí">
          <span class="input-group-btn">
            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary wow fadeInRight" data-wow-delay="0ms" data-wow-duration="800ms">Suscribirme</button>
          </span>
        </div>
        <div id="mce-responses">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>
      </form>
    </div>
    <!-- End MailChimp Signup Form -->
  </section>
</main>

<?php get_footer() ?>
