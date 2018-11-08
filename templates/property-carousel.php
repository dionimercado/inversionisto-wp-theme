<?php

$images = get_field('property_gallery', get_the_ID());

if( $images ): ?>
  <div class="property-carousel owl-carousel owl-theme">
    <?php 
    foreach( $images as $image ):

      $img_src = wp_get_attachment_image_url( $image['ID'], 'large' );
      $img_url = wp_get_attachment_image_url( $image['ID'], 'full' );
      $img_srcset = wp_get_attachment_image_srcset( $image['ID'], 'full' );
      ?>
      <div style="overflow: hidden; height: 58rem;">
        <a data-fancybox="gallery" href="<?php echo wp_get_attachment_image_url($image['ID'], 'full') ?>">
          <img src="<?php echo esc_url( $img_src ); ?>&resize=1280%2C950" class="img-fluid" alt="<?php the_title() ?>">
      	   <?php //echo wp_get_attachment_image( $image['ID'], $size ); ?>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
