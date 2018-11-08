<?php get_header(); ?>

<main class="wrapper pt-5">
  <section class="recent-properties">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-lg-3 bg-white border-right pb-5">
          <div class="advanced-search pt-5 mt-5">
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
          <div class="row my-5">
            <?php

              $tax_query = array();
              $meta_query = array();

    					if(!empty($_GET['accion']) ) {
    						$prop_action = $_GET['accion'];
    						if( $prop_action != 'any' ) {
    							$tax_query[] = array(
    								'taxonomy' => 'prop_action',
    								'field' => 'slug',
    								'terms' => $prop_action
    							);
    						}
    					}

    					if(!empty($_GET['categoria']) ) {
    						$prop_category = $_GET['categoria'];
    						if( $prop_category != 'any' ) {
    							$tax_query[] = array(
    								'taxonomy' => 'prop_category',
    								'field' => 'slug',
    								'terms' => $prop_category
    							);
    						}
    					}

    					if(!empty($_GET['ciudad']) ) {
    						$prop_city = $_GET['ciudad'];
    						if( $prop_city != 'any' ) {
    							$tax_query[] = array(
    								'taxonomy' => 'prop_city',
    								'field' => 'slug',
    								'terms' => $prop_city
    							);
    						}
    					}

    					if(!empty($_GET['sectores']) ) {
    						$prop_area = $_GET['sectores'];
    						if( $prop_area != 'any' ) {
    							$tax_query[] = array(
    								'taxonomy' => 'prop_area',
    								'field' => 'slug',
    								'terms' => $prop_area
    							);
    						}
    					}



          	// base query arguments for home page properties

              $paged = get_query_var('paged') ? get_query_var('paged') : 1;


              if( !empty($_GET['habitaciones']) && $_GET['habitaciones'] != 'any' ){
                $meta_query[] = array(
                  'key' => 'property_bedrooms',
                  'value' => $_GET['habitaciones'],
                  'compare' => '>=',
                );
              }

              if( !empty($_GET['parqueos']) && $_GET['parqueos'] != 'any' ){
                $meta_query[] = array(
                  'key' => 'property_garage_size',
                  'value' => $_GET['parqueos'],
                  'compare' => '>=',
                );
              }

              if( !empty($_GET['banos']) && $_GET['banos'] != 'any' ){
                $meta_query[] = array(
                  'key' => 'property_bathrooms',
                  'value' => $_GET['banos'],
                  'compare' => '>=',
                );
              }

              if(!empty($_GET['precio_desde']) || !empty($_GET['precio_hasta'])) {
                $precio_desde = (float)str_replace(",","",$_GET['precio_desde']);
                $precio_hasta = (float)str_replace(",","",$_GET['precio_hasta']);

                if( $_GET['moneda'] == "dop" ) {
                  $meta_query[] = array(
                    'key'     => 'property_price_dop',
                    'value'   => array($precio_desde, $precio_hasta),
                    'compare' => 'BETWEEN',
                    'type'    => 'numeric'
                  );
                }else{
                  $meta_query[] = array(
                    'key'     => 'property_price_usd',
                    'value'   => array($precio_desde, $precio_hasta),
                    'compare' => 'BETWEEN',
                    'type'    => 'numeric'
                  );
                }
              }



              $tax_count = count($tax_query);
    					if($tax_count > 1) {
    						$tax_query['relation'] = 'AND';
    					}

              $meta_count = count($meta_query);
    					if($meta_count > 1) {
    						$meta_query['relation'] = 'AND';
    					}

            	$search_args = array(
        				'post_type' => 'property',
        				'posts_per_page' => 12,
        				'paged' => $paged
            	);


              if($tax_count > 0) {
                $search_args['tax_query'] = $tax_query;
              }

              $meta_count = count($meta_query);
              if($meta_count > 0) {
                $search_args['meta_query'] = $meta_query;
              }

              $query = new WP_Query( $search_args );

              // echo "<pre>";
              //   print_r($search_args);
              // echo "</pre>";
              ?>
              <div class="col-md-12">
                <div class="text-left text-black-50">
                  <p>Resultados Busqueda: <strong><?php echo $query->found_posts ?> inmuebles</strong></p>
                </div>
              </div>
            <?php while( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-md-6 col-lg-4 mb-5">
              <?php get_template_part('templates/property', 'listing') ?>
            </div>
          <?php endwhile; ?>
          <div class="col-12">
            <div class="pagination">
              <?php
              echo paginate_links( array(
                'format'  => 'page/%#%',
                'current' => $paged,
                'total'   => $query->max_num_pages,
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
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>
