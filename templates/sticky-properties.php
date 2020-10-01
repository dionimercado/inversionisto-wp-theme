<?php get_header(); ?>

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

    $meta_query[] = array(
      'key' => 'sticky',
      'value' => 1,
      'compare' => '==',
    );

    if(!empty($_GET['precio_desde']) || !empty($_GET['precio_hasta'])) {
      $precio_desde = (float)str_replace(",","",$_GET['precio_desde']);
      $precio_hasta = (float)str_replace(",","",$_GET['precio_hasta']);

      if($_GET['moneda'] == "dop") {
        if( $prop_action == "alquiler" && $precio_hasta == 250000 || $prop_action == "venta" && $precio_hasta == 25000000) {
          $meta_query[] = array(
            'key'     => 'property_price_dop',
            'value'   => $precio_desde,
            'compare' => '>=',
            'type'    => 'numeric'
          );
        }else{
          $meta_query[] = array(
            'key'     => 'property_price_dop',
            'value'   => array($precio_desde, $precio_hasta),
            'compare' => 'BETWEEN',
            'type'    => 'numeric'
          );
        }
      }else{
        if( $prop_action == "alquiler" && $precio_hasta == 10000 || $prop_action == "venta" && $precio_hasta == 100000000) {
          $meta_query[] = array(
            'key'     => 'property_price_usd',
            'value'   => $precio_desde,
            'compare' => '>=',
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
			'paged' => $paged,
      'meta_key' => 'sticky',
      'orderby' => 'sticky',
      'orderby' => 'meta_value',
      'order'   => 'DESC',
      // 'orderby' => array(
      //   // 'modified' => 'DESC',
      //   'sticky' => 'DESC',
      //   // 'date' => 'DESC'
      // )

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

    while( $query->have_posts() ) : $query->the_post();
    ?>
    <div class="col-md-6 col-lg-4 mb-5">
      <?php get_template_part('templates/property', 'listing') ?>
    </div>
    <?php endwhile; ?>
