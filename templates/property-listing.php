<?php
$img_src = wp_get_attachment_image_url( get_post_meta( $post->ID, '_thumbnail_id', true), 'large' );
$img_srcset = wp_get_attachment_image_srcset( get_post_meta($post->ID, '_thumbnail_id', true), 'full' );

?>
<div class="property_listing h-100">
  <a href="<?php the_permalink() ?>">
    <figure>
      <picture>
        <img src="<?php echo esc_url( $img_src ); ?>&resize=400%2C300" class="img-fluid" alt="<?php the_title() ?>" />
      </picture>
      <figcaption>
        <h4><?php the_title() ?></h4>
      </figcaption>
    </figure>
  </a>
  <div class="listing_unit_price">
    <strong>
      <?php if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo "RD$"; else : echo "US$"; endif; ?>
      <?php if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo number_format(get_post_meta($post->ID, 'property_price_dop', true), 0,'.',','); else : echo number_format(get_post_meta($post->ID, 'property_price_usd', true), 0,'.',','); endif; ?>
    </strong>
  </div>
  <div class="property_listing_details">
    <span class="inforoom"><?php echo get_post_meta($post->ID, 'property_bedrooms', true) ?></span>
    <span class="infobath"><?php echo get_post_meta($post->ID, 'property_bathrooms', true) ?></span>
    <span class="infosize"><?php echo get_post_meta($post->ID, 'property_size', true) ?> m<sup>2</sup></span>
  </div>
</div>
