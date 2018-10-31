<span class="align-items-center d-flex price_area">
  <span class="price_label price_label_before">
    <?php if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo "RD$"; else : echo "US$"; endif; ?>
  </span>
  <?php if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo number_format(get_post_meta($post->ID, 'property_price_dop', true), 0,'.',','); else : echo number_format(get_post_meta($post->ID, 'property_price_usd', true), 0,'.',','); endif; ?>
</span>
