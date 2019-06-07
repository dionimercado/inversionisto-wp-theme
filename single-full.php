<?php
/*
 * Template Name: Full Width
 * Template Post Type: post
 */

 get_header();  ?>

<?php
  while(have_posts()): the_post();

  $img_src = wp_get_attachment_image_url( get_post_meta( $post->ID, '_thumbnail_id', true), 'full' );
?>

<main class="wrapper">
  <?php if(get_post_meta( $post->ID, '_thumbnail_id', true)) : ?>
  <header class="header_image" style="background-image: url(<?php echo $img_src ?>);">

  </header>
  <?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <article class="blog-post">
          <h2 class="post-title mt-5"><?php the_title() ?></h2>
          <div class="meta-info text-black-50 d-flex justify-content-between">
            <div class="meta-element"> Publicado por <?php the_author() ?> el <?php the_time('j \d\e\ F, Y') ?></div>
            <div class="post-share">
              <a class="text-black-50" href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>/&amp;t=Como+preparar+mi+propiedad+para+venderla" target="_blank"Pedro Alcántara para lograr><i class="fab fa-facebook fa-2"></i></a>
              <a class="text-black-50" href="http://twitter.com/home?status=Como+preparar+mi+propiedad+para+venderla+https%3A%2F%2Finversionisto.com%2Fcomo-preparar-mi-propiedad-para-venderla%2F" target="_blank"><i class="fab fa-twitter fa-2"></i></a>
              <a class="text-black-50" href="https://plus.google.com/share?url=<?php the_permalink() ?>/" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"><i class="fab fa-google-plus fa-2"></i></a>
              <a class="text-black-50" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>/&amp;media=https://inversionisto.com/wp-content/uploads/2018/10/Optimized-architectural-design-architecture-blue-sky-462358-1200x790.jpg&amp;description=Como+preparar+mi+propiedad+para+venderla" target="_blank"> <i class="fab fa-pinterest fa-2"></i> </a>
            </div>
          </div>
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
