<?php
/*
 * Template Name: Full Width
 * Template Post Type: page
 */

 get_header() ?>

<?php
  while(have_posts()): the_post();

  $img_src = wp_get_attachment_image_url( get_post_meta( $post->ID, '_thumbnail_id', true), 'full' );
?>

<main class="wrapper" style="margin-top: 115px;">

  <?php if(get_post_meta( $post->ID, '_thumbnail_id', true)) : ?>
  <header class="header_image" style="background-image: url(<?php echo $img_src ?>); max-height: 300px;">
    <div class="position-relative">
      <div class="text-center">
        <h1 class="text-white"><?php the_title() ?></h1>
      </div>
    </div>
  </header>
  <?php endif; ?>

  <div class="container-fluid">
    <article class="blog-post">
      <div class="">
        <?php the_content() ?>
      </div>
    </article>
  </div>
</main>
<?php endwhile; ?>

<?php get_footer() ?>
