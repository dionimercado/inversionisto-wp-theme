<?php get_header() ?>

<?php
  while(have_posts()): the_post();
  $img_src = wp_get_attachment_image_url( get_post_meta( $post->ID, '_thumbnail_id', true), 'full' );

  $property_area              =   get_the_terms($post->ID, 'prop_area');
  $property_city              =   get_term_by('id',$property_area[0]->parent, 'prop_area');
  $property_country           =   get_the_term_list($post->ID, 'prop_country', '', ', ', '');
  $property_category          =   get_the_term_list($post->ID, 'prop_category', '', ', ', '') ;
  $property_action            =   get_the_term_list($post->ID, 'prop_action', '', ', ', '');
?>

<main class="wrapper">
  <header class="">
    <?php get_template_part('templates/property', 'carousel') ?>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <article class="single-property">
          <h2 class="post-title mt-5"><?php the_title() ?></h2>
          <hr>
          <div class="row py-3">
            <div class="property-meta col-6">
              <div class="property_categs">
                <?php echo $property_category ?> en <?php echo $property_action ?>
              </div>
              <span class="adres_area">
                <a href="<?php echo get_term_link($property_area[0]) ?>"><?php echo $property_area[0]->name ?></a>,
                <a href="<?php echo get_term_link($property_city) ?>"><?php echo $property_city->name ?></a>
                <?php //echo $property_city ?>
              </span>
            </div>
            <div class="col-6">
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
        </article>
      </div>
      <div class="col-md-3">
        <?php get_sidebar() ?>
      </div>
    </div>
  </div>
</main>
<?php endwhile; ?>

<?php get_footer() ?>
