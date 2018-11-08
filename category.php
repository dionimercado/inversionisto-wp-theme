<?php get_header(); ?>

<main class="wrapper pt-5">
  <section class="recent-properties pt-5">
    <div class="section-title">
      <h4><?php _e('Publicaciones Recientes') ?></h4>
      <h2><?php _e('Artículos de Interés') ?></h2>
    </div>
    <div class="container">
      <div class="row">
        <?php while(have_posts()) : the_post(); ?>
          <div class="col-md-4 mb-5">
            <?php get_template_part('templates/blog', 'post') ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>
