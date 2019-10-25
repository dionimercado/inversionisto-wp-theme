<?php
$agent_info = get_user_by( 'id', $post->post_author );

if( $agent_info->profile_picture ) {
  $profile = wp_get_attachment_image_url( $agent_info->profile_picture, 'medium' );
}else{
  $profile = wp_get_attachment_image_url( 124, 'medium' );
}

?>
<aside class="sidebar mt-5">

  <div class="border rounded d-none d-lg-block">
    <img class="w-100 rounded-top" src="<?php echo $profile ?>" alt="<?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?>">
    <div class="p-4">
      <h2><?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?></h2>
      <p class="text-black-50"><?php echo $agent_info->position ?></p>
      <p class="text-black-50"><?php echo $agent_info->phone ?></p>
      <p class="text-black-50"><?php echo $agent_info->user_email ?></p>
      <p class="text-black-50">@<?php echo $agent_info->instagram ?></p>
    </div>
    <a data-fancybox data-src="#hidden-content" href="javascript:;" class="btn btn-primary h-auto m-4" style="background-color: #006900; border-color: #006900;">
    	Enviar mensaje
    </a>
    <div style="display: none;" id="hidden-content">
    	<h2>Enviar Mensaje a <span style="color: #bf9002"><?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?></span></h2>
      <div class="mt-5">
        <?php echo gravity_form( 2, false, false, false, array('agente' => $agent_info->user_email, 'propiedad' => get_the_permalink($post->ID)), true ); //do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" field_values="Email=me@dionimercado.com"]') ?>
      </div>
    </div>

  </div>
  <ul>
    <?php !dynamic_sidebar('sidebar') ?>
  </ul>
</aside>
