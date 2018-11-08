<?php get_header(); ?>

<main class="wrapper" style="margin-top: 85px;">
  <section class="recent-properties">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-lg-3 bg-white border-right pb-5 d-none d-md-block">
          <div class="advanced-search pt-md-5 mt-md-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="form-tab" data-toggle="tab" data-type="venta" href="#form" role="tab" aria-controls="venta" aria-selected="true">Venta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" data-type="alquiler" role="tab" aria-controls="alquiler" aria-selected="false">Alquiler</a>
              </li>
            </ul>
            <div class="tab-content bg-light" id="myTabContent" style="box-shadow: none;">
              <div class="tab-pane show active" id="form" role="tabpanel" aria-labelledby="venta-tab">
                <form class="p-3" action="<?php echo home_url() ?>" method="get">
                  <?php get_template_part('templates/search', 'vertical') ?>
                  <input type="hidden" name="accion" id="action" value="venta">
                  <input type="hidden" name="s" value="">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <div class="row my-md-5">
            <div class="col-md-12">
              <div class="text-left">
                <h2 class="page-header"><?php echo get_the_archive_title() ?></h2>
              </div>
            </div>
            <?php while( have_posts() ) : the_post(); ?>
            <div class="col-md-6 col-lg-4 mb-5">
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
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>
