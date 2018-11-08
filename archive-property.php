<?php get_header(); ?>

<section class="position-relative" style="margin-top: 85px;">
  <?php echo do_shortcode('[rev_slider alias="home-slider"]') ?>
  <div class="advanced-search d-none d-md-block">
    <?php get_template_part('templates/advanced', 'search') ?>
  </div>
</section>

<main class="wrapper pt-md-5">
  <section class="recent-properties pt-md-5">
    <div class="container">
      <div class="text-left">
        <h2 class="page-header"><?php _e('Listado de inmuebles') ?></h2>
      </div>
      <div class="row" id="content">
        <?php while( have_posts() ) : the_post(); ?>
        <div class="col-md-4 mb-5">
          <?php get_template_part('templates/property', 'listing') ?>
        </div>
        <?php endwhile; ?>
        <div class="col-12">
          <div class="pagination">
            <?php
            echo paginate_links( array(
              'format'  => 'page/%#%',
              // 'current' => $paged,
              // 'total'   => $query->max_num_pages,
              'mid_size'        => 5,
              'prev_text'       => __('<i class="fas fa-chevron-left"></i>'),
              'next_text'       => __('<i class="fas fa-chevron-right"></i>')
            ) );
            ?>
          </div>
        </div>
        <?php wp_reset_postdata() ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>
