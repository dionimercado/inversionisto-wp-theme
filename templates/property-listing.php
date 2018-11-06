<?php
$img_src = wp_get_attachment_image_url( get_post_meta( $post->ID, '_thumbnail_id', true), 'large' );
$img_srcset = wp_get_attachment_image_srcset( get_post_meta($post->ID, '_thumbnail_id', true), 'full' );

$property_area              =   get_the_terms($post->ID, 'prop_area');
$opportunity                =   get_the_terms($post->ID, 'prop_category');
$is_opportunity             =   false;
foreach ($opportunity as $key => $value) {
  if($value->slug == "oportunidades") {
    $is_opportunity = true;
  }
}

?>

<div class="property_listing h-100">
  <a href="<?php the_permalink() ?>">
    <figure>
      <picture>
        <img src="<?php echo esc_url( $img_src ); ?>&resize=400%2C300" class="w-100 h-auto" alt="<?php the_title() ?>" />
      </picture>
      <figcaption>
        <h4><svg style="margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="#016600" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/><path d="M0 0h24v24H0z" fill="none"/></svg><?php echo $property_area[0]->name ?></h4>
      </figcaption>
    </figure>
    <div class="listing_unit_price d-flex justify-content-between">
          <?php
            if($is_opportunity) {

              echo '<strong><del class="text-black-50">';
              if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo "RD$"; else : echo "US$"; endif;
              if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo number_format(get_post_meta($post->ID, 'sale_price_dop', true), 0,'.',','); else : echo number_format(get_post_meta($post->ID, 'sale_price_usd', true), 0,'.',','); endif;
              echo '</del></strong>';

              echo '<strong style="color: #bf9002">';
              if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo "RD$"; else : echo "US$"; endif;
              if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo number_format(get_post_meta($post->ID, 'property_price_dop', true), 0,'.',','); else : echo number_format(get_post_meta($post->ID, 'property_price_usd', true), 0,'.',','); endif;
              echo '</strong>';
            }else{
              echo '<strong>';
              if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo "RD$"; else : echo "US$"; endif;
              if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo number_format(get_post_meta($post->ID, 'property_price_dop', true), 0,'.',','); else : echo number_format(get_post_meta($post->ID, 'property_price_usd', true), 0,'.',','); endif;
              echo '</strong>';            }
          ?>
        </del>
      </strong>
    </div>
    <div class="property_listing_details">
      <span class="inforoom"><?php echo get_post_meta($post->ID, 'property_bedrooms', true) ?></span>
      <span class="infobath"><?php echo get_post_meta($post->ID, 'property_bathrooms', true) ?></span>
      <span class="infosize"><?php echo get_post_meta($post->ID, 'property_size', true) ?> m<sup>2</sup></span>
    </div>
  </a>
</div>
