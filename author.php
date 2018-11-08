<?php
get_header();

$agent_info = get_user_by( 'slug', get_query_var( 'author_name' ) );

if( $agent_info->profile_banner ) {
  $banner = wp_get_attachment_image_url( $agent_info->profile_banner, 'full' );
}else{
  $banner = wp_get_attachment_image_url( 126, 'full' );
}

if( $agent_info->profile_picture ) {
  $profile = wp_get_attachment_image_url( $agent_info->profile_picture, 'medium' );
}else{
  $profile = wp_get_attachment_image_url( 124, 'medium' );
}

?>
<main class="wrapper" style="margin-top: 85px;">
  <header class="header_image d-flex align-items-center justify-content-center" style="background-image: url(<?php echo $banner ?>);">
    <div class="position-relative">
      <img class="img-fluid rounded-circle" style="max-width: 150px; border: 3px solid #fff;" src="<?php echo $profile ?>" alt="">
      <div class="text-center mt-5">
        <h2 class="text-white"><?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?></h2>
        <h3 class="text-white-50"><?php echo $agent_info->position ?></h3>
        <div class="d-flex justify-content-center mt-4">
          <a href="tel:<?php echo $agent_info->phone ?>">
            <span class="contact-icon" style="transform: rotate(100deg);"><i class="fa fa-phone"></i></span>
            <!-- <span><?php echo $agent_info->phone ?></span> -->
          </a>
          <a href="mailto:<?php echo $agent_info->user_email ?>">
            <span class="contact-icon"><i class="fa fa-envelope"></i></span>
            <!-- <span><?php echo $agent_info->user_email ?>/span> -->
          </a>
          <a href="https://instagram.com/<?php echo $agent_info->instagram ?>">
            <span class="contact-icon"><i class="fab fa-instagram"></i></span>
            <!-- <span>@<?php echo $agent_info->instagram ?></span> -->
          </a>
        </div>
      </div>
    </div>
  </header>
  <div class="agent-profile mt-md-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="page-header">Mis Propiedades</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="row">
          <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            $query = new WP_Query(array(
              'post_type' => 'property',
              'author' => $agent_info->ID,
              'posts_per_page' => 9,
              'paged' => $paged
            ));
            while($query->have_posts()) : $query->the_post();
            ?>
            <div class="col-md-4 mb-5">
              <?php get_template_part('templates/property', 'listing') ?>
            </div>
          <?php endwhile; ?>
          <div class="col-12">
            <div class="pagination">
              <?php //wp_pagenavi() ?>
              <?php
              echo paginate_links( array(
                'format'  => 'page/%#%',
                'current' => $paged,
                'total'   => $query->max_num_pages,
                'mid_size'        => 5,
                'prev_text'       => __('<i class="fas fa-chevron-left"></i>'),
                'next_text'       => __('<i class="fas fa-chevron-right"></i>')
              ) );
              ?>
            </div>
          </div>
          <?php wp_reset_postdata() ?>
          </div>
        </div>
        <!-- <div class="col-md-3">

        </div> -->
      </div>
    </div>
  </div>
</main>
<?php get_footer() ?>
