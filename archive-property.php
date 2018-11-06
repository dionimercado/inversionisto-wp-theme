<?php get_header(); ?>

<section class="position-relative">
  <?php echo do_shortcode('[rev_slider alias="home-slider"]') ?>
  <div class="advanced-search d-none d-md-block">
    <?php get_template_part('templates/advanced', 'search') ?>
  </div>
</section>

<main class="wrapper pt-5">
  <section class="recent-properties pt-5">
    <!-- <div class="section-title">
      <h2><?php _e('Propiedades Recientes') ?></h2>
      <p>These are the latest properties in the Sales category. You can create the list using the “latest listing shortcode” and show items by specific categories.</p>
    </div> -->
    <div class="container">
      <div class="row" id="content">
        <?php while( have_posts() ) : the_post(); ?>
        <div class="col-md-4 mb-5">
          <?php get_template_part('templates/property', 'listing') ?>
        </div>
        <?php endwhile; ?>
        <div class="col-12">
          <div class="pagination">
          <?php
          // echo paginate_links( array(
          //   'format'  => 'page/%#%',
          //   'current' => $paged,
          //   'total'   => $the_query->max_num_pages,
          //   'mid_size'        => 2,
          //   'prev_text'       => __('&laquo; Prev Page'),
          //   'next_text'       => __('Next Page &raquo;')
          // ) );
          ?>
        </div>
        </div>
        <?php wp_reset_postdata() ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>
