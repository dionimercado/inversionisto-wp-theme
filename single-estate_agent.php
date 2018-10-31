<?php get_header() ?>
<div class="agent-profile" style="padding-top: 180px">
  <?php while(have_posts()) : the_post();
  $agent_id = get_post_meta(get_the_ID(), 'property_agent', true);
  $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()))
?>
<div class="profile-info">
  <div class="row">
    <div class="col-md-7">
      <div class="row">
        <div class="col-sm-4">
          <img class="img-responsive img-circle" src="<?php echo $img[0] ?>" alt="">
        </div>
        <div class="col-sm-8">
          <h3 style="margin-bottom: 5px;"><?php the_title() ?></h3>
          <p style="color: rgba(0,0,0,.5)"><?php echo get_post_meta(get_the_ID(),'agent_position',true) ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div style="height: 100%; width: 2px; background-color: #eee; display: block; position: absolute; left: 0; top: 0;"></div>
      <div class="agent-contacts">
        <h3>Contactos</h3>
        <p>
          <a href="tel:<?php echo get_post_meta(get_the_ID(), 'agent_email', true) ?>">
            <span class="contact-icon" style="transform: rotate(10deg);"><i class="fa fa-phone"></i></span>
            <span><?php echo get_post_meta(get_the_ID(), 'agent_phone', true) ?></span>
          </a>
        </p>
        <p>
          <a href="mailto:<?php echo get_post_meta(get_the_ID(), 'agent_email', true) ?>">
            <span class="contact-icon"><i class="fa fa-envelope"></i></span>
            <span><?php echo get_post_meta(get_the_ID(), 'agent_email', true) ?></span>
          </a>
        </p>
        <p>
          <a href="https://instagram.com/<?php echo get_post_meta(get_the_ID(), 'agent_instagram', true) ?>">
            <span class="contact-icon"><i class="fa fa-instagram"></i></span>
            <span>@<?php echo get_post_meta(get_the_ID(), 'agent_instagram', true) ?></span>
          </a>
        </p>
      </div>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col-xs-12">
      <hr>
      <h2>Mis Propiedades</h2>
    </div>
  </div>
  <div class="row">
    <?php
      $props = new WP_Query(array(
        'post_type' => 'estate_property',
        'meta_query' => array(
          array(
            'field' => 'property_agent',
            'value' => $agent_id
          )
        )
      ));
      while($props->have_posts()) : $props->the_post();
      get_template_part('templates/property_unit');

      endwhile; wp_reset_postdata(); ?>
  </div>
  <?php endwhile; ?>
</div>
<?php get_footer() ?>
