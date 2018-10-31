<?php get_header() ?>

<?php
  while(have_posts()): the_post();

  $img_src = wp_get_attachment_image_url( get_post_meta( $post->ID, '_thumbnail_id', true), 'full' );
?>

<main class="wrapper">
  <header class="header_image" style="background-image: url(<?php echo $img_src ?>);">

  </header>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <article class="blog-post">
          <h2 class="post-title mt-5"><?php the_title() ?></h2>
          <div class="">
            <?php the_content() ?>
          </div>
        </article>
      </div>
    </div>
  </div>
</main>
<?php endwhile; ?>

<?php get_footer() ?>
