<span class="align-items-center text-right d-md-flex price_area">
  <?php if(get_post_meta($post->ID, 'sale_price_dop', true) || get_post_meta($post->ID, 'sale_price_usd', true)) : ?>
  <div class="mr-md-4 text-black-50" style="font-size: 16px; text-decoration: line-through;">
    <?php if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo "RD$"; else : echo "US$"; endif; ?>
    <?php if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo number_format(get_post_meta($post->ID, 'sale_price_dop', true), 0,'.',','); else : echo number_format(get_post_meta($post->ID, 'sale_price_usd', true), 0,'.',','); endif; ?>
  </div>
  <?php endif; ?>
  <span class="price_label price_label_before">
    <?php if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo "RD$"; else : echo "US$"; endif; ?>
  </span>
  <?php if(get_post_meta($post->ID, 'property_currency', true) === "DOP") : echo number_format(get_post_meta($post->ID, 'property_price_dop', true), 0,'.',','); else : echo number_format(get_post_meta($post->ID, 'property_price_usd', true), 0,'.',','); endif; ?>
</span>
