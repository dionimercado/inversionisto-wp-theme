<?php get_header() ?>

<?php
  while(have_posts()): the_post();
  $img_src = wp_get_attachment_image_url( get_post_meta( $post->ID, '_thumbnail_id', true), 'full' );

  // $property_category          =   get_the_term_list($post->ID, 'prop_category', '', ', ', '') ;
  $property_category              =   get_the_terms($post->ID, 'prop_category');
  $property_area              =   get_the_terms($post->ID, 'prop_area');
  $property_city              =   get_term_by('id',$property_area[0]->parent, 'prop_area');
  $property_country           =   get_the_term_list($post->ID, 'prop_country', '', ', ', '');
  $property_action            =   get_the_term_list($post->ID, 'prop_action', '', ', ', '');


  $agent_info = get_user_by( 'id', $post->post_author );

  if( $agent_info->profile_picture ) {
    $profile = wp_get_attachment_image_url( $agent_info->profile_picture, 'medium' );
  }else{
    $profile = wp_get_attachment_image_url( 124, 'medium' );
  }

  // $phone = "+44 845-643 9287";
  // ## removing anything but digits
  // $phone = preg_replace('/[^0-9]/', '', $phone);
  // ## converting into the desired format
  // $phone = preg_replace('/(\d\d)(\d\d\d)(\d\d\d)(\d\d\d\d)/', "<a href=\"tel:+$phone\">+$1 $2 $3 $4</a>", $phone);
  // echo "$phone\n";

?>

<main class="wrapper" style="margin-top: 85px;">
  <header class="">
    <?php get_template_part('templates/property', 'carousel') ?>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <article class="single-property">
          <h2 class="post-title mt-5"><?php the_title() ?></h2>
          <hr>
          <div class="row py-3">
            <div class="property-meta col-7">
              <div class="property_categs">
                <a href="<?php echo get_term_link($property_category[0]) ?>"><?php echo $property_category[0]->name ?></a> en <?php echo $property_action ?>
              </div>
              <span class="adres_area">
                <a href="<?php echo get_term_link($property_area[0]) ?>"><?php echo $property_area[0]->name ?></a>,
                <a href="<?php echo get_term_link($property_city) ?>"><?php echo $property_city->name ?></a>
                <?php //echo $property_city ?>
              </span>
            </div>
            <div class="col-5">
              <?php get_template_part('templates/property', 'price') ?>
            </div>

          </div>
          <hr>

          <?php if(get_post_meta($post->ID, 'youtube_video', true)) : ?>
          <div class="mb-5">
            <?php
              list($video_url, $video_id) = explode("//youtu.be/", get_post_meta($post->ID, 'youtube_video', true));
            ?>

            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video_id ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
          </div>
        <?php endif; ?>

          <div class="">
            <?php the_content() ?>

            <div class="accordiosn">
              <div class="card mb-5">
                <div class="card-header p-0" id="headingLocation">
                  <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-left px-4 py-3" style="font-size: 1.6rem;" data-toggle="collapse" data-target="#collapseLocation" aria-expanded="false" aria-controls="collapseLocation">
                      <?php _e('Ubicación') ?>
                    </button>
                  </h5>
                </div>

                <div id="collapseLocation" class="collapse show" aria-labelledby="headingLocation">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Sector: </strong>
                        <a href="<?php echo get_term_link($property_area[0]) ?>"><?php echo $property_area[0]->name ?></a>
                      </div>
                      <div class="col-md-4">
                        <strong>Ciudad: </strong>
                        <a href="<?php echo get_term_link($property_city) ?>"><?php echo $property_city->name ?></a>
                      </div>
                      <div class="col-md-4">
                        <strong>País: </strong>
                        <?php echo $property_country ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-5">
                <div class="card-header p-0" id="headingDetails">
                  <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-left px-4 py-3" style="font-size: 1.6rem;"  data-toggle="collapse" data-target="#collapseDetails" aria-expanded="false" aria-controls="collapseDetails">
                      <?php _e('Detalles') ?>
                    </button>
                  </h5>
                </div>
                <div id="collapseDetails" class="collapse show" aria-labelledby="headingDetails">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>ID:</strong> <?php echo $post->ID ?>
                      </div>
                      <div class="col-md-4">
                        <strong>Precio:</strong>
                        <?php
                          if( get_post_meta($post->ID, 'property_currency', true) === "DOP") {
                            echo "RD$" . number_format(get_post_meta($post->ID, 'property_price_dop', true));
                          }else{
                            echo "US$" . number_format(get_post_meta($post->ID, 'property_price_usd', true));
                          }
                        ?>
                      </div>
                      <div class="col-md-4">
                        <strong>Mts Construidos:</strong>
                        <?php echo number_format(get_post_meta($post->ID, 'property_size', true)); ?> m<sup>2</sup>
                      </div>
                      <?php if(get_post_meta($post->ID, 'property_lot_size', true)) : ?>
                      <div class="col-md-4">
                        <strong>Mts Solar:</strong>
                        <?php echo number_format(get_post_meta($post->ID, 'property_lot_size', true)); ?> m<sup>2</sup>
                      </div>
                      <?php endif; ?>
                      <div class="col-md-4">
                        <strong>Habitaciones:</strong>
                        <?php echo get_post_meta($post->ID, 'property_bedrooms', true); ?>
                      </div>
                      <div class="col-md-4">
                        <strong>Ba&ntilde;os:</strong>
                        <?php echo get_post_meta($post->ID, 'property_bathrooms', true); ?>
                      </div>
                      <div class="col-md-4">
                        <strong>Parqueos:</strong>
                        <?php echo get_post_meta($post->ID, 'property_garage_size', true); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-5">
                <div class="card-header p-0" id="headingAmmenities">
                  <h5 class="mb-0">
                    <button class="btn btn-link w-100 text-left px-4 py-3" style="font-size: 1.6rem;"  data-toggle="collapse" data-target="#collapseAmmenities" aria-expanded="false" aria-controls="collapseAmmenities">
                      Comodidades
                    </button>
                  </h5>
                </div>
                <div id="collapseAmmenities" class="collapse show" aria-labelledby="headingAmmenities">
                  <div class="card-body">
                    <div class="row">
                      <?php
                      $ammenities = get_field('ammenities');

                      if($ammenities){
                        foreach ($ammenities as $ammenity){
                        	echo '<div class="col-md-4"><i class="fas fa-check mr-2 text-success"></i>' . $ammenity . '</div>';
                        }
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="property-agent">
            <div class="rounded text-center text-lg-left" style="background-color: #c78f00;">
              <div class="row">
                <div class="col-lg-3 col-md-12 my-auto">
                  <img style="max-width: 120px; border: 2px solid #fff;" class="img-fluid rounded-circle my-5 my-md-4 mx-md-5" src="<?php echo $profile ?>" alt="<?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?>" />
                </div>
                <div class="col-lg-4 col-md-6 my-auto text-center text-md-right text-lg-left">
                  <h2 class="text-white"><?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?></h2>
                  <p class="text-black-50 mb-0"><?php echo $agent_info->position ?></p>
                  <p class="text-white-50">@<?php echo $agent_info->instagram ?></p>
                </div>
                <div class="col-lg-5 col-md-6 my-auto text-center text-md-left text-lg-left">
                  <!-- <h2 class="text-white">Contactar Agente</h2> -->
                  <p class="text-white mb-0 mt-4"><i class="fas fa-envelope"></i><?php echo $agent_info->user_email ?></p>
                  <a class="btn btn-primary h-auto my-2" href="tel:<?php echo $agent_info->phone ?>" style="background-color: #006900; border-color: #006900;"><i class="fas fa-phone" style="transform: rotate(100deg);"></i><?php echo $agent_info->phone ?></a><br>
                  <!-- <p class="text-dark bg-white py-2 px-3 rounded d-inline-block" style="font-size: 16px; font-weight: 700;"><i class="fas fa-phone mr-3" style="transform: rotate(100deg); font-size: 16px;"></i><?php echo $agent_info->phone ?></p> -->
                  <a class="btn btn-primary h-auto mb-5 d-md-none" style="background-color: #006900; border-color: #006900;" target="_blank" href="https://wa.me/1<?php echo preg_replace('/[^0-9]/', '', $agent_info->phone) ?>?text=Hola <?php echo $agent_info->first_name ?>, estoy interesado en saber m&aacute;s informaci&oacute;n sobre esta propiedad <?php the_permalink() ?>"><i class="fab fa-whatsapp"></i> Enviar Mensaje</a>
                  <a data-fancybox data-src="#hidden-content" href="javascript:;" class="btn btn-primary h-auto mb-5 d-none d-md-inline-block" style="background-color: #006900; border-color: #006900;">
                  	Enviar mensaje
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-5">
            <h2 class="page-header">Inmuebles similares</h2>
          </div>
          <div class="owl-properties owl-carousel owl-theme">
            <?php
            $similar = new WP_Query(array(
              'post_type' => 'property',
              'showposts' => 6,
              // 'post__not_in' => get_the_ID(),
              'tax_query' => array(
                  'relation' => 'AND',
                  array(
                      'taxonomy' => 'prop_category',
                      'field'    => 'slug',
                      'terms'    => array($property_category[0]->slug),
                  ),
                  array(
                      'taxonomy' => 'prop_area',
                      'field'    => 'slug',
                      'terms'    => array($property_city->slug),
                  )
              ),
            ));

            while($similar->have_posts()) : $similar->the_post();
            ?>
            <div class="">
              <?php get_template_part('templates/property', 'listing') ?>
            </div>
            <?php endwhile; wp_reset_postdata() ?>
          </div>
        </article>
      </div>
      <div class="col-lg-3">
        <?php get_sidebar() ?>
      </div>
    </div>
  </div>
</main>
<?php endwhile; ?>

<?php get_footer() ?>
