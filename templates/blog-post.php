<?php
$img_src = wp_get_attachment_image_url( get_post_meta( $post->ID, '_thumbnail_id', true), 'large' );
$img_srcset = wp_get_attachment_image_srcset( get_post_meta($post->ID, '_thumbnail_id', true), 'full' );

?>
<div class="blog-post border rounded bg-white mb-5 h-100">
  <a href="<?php the_permalink() ?>">
    <figure>
      <picture>
        <img src="<?php echo esc_url( $img_src ); ?>&resize=600%2C300" class="w-100 h-auto" alt="<?php the_title() ?>" />
      </picture>
      <figcaption class="px-5 py-4">
        <h2 class="text-dark"><?php the_title() ?></h2>
      </figcaption>
    </figure>
  </a>
  <div class="px-5 mb-5 text-black-50">
    <?php the_excerpt() ?>
  </div>
</div>
