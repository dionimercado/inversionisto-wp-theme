<?php
$agent_info = get_user_by( 'id', $post->post_author );

if( $agent_info->profile_picture ) {
  $profile = wp_get_attachment_image_url( $agent_info->profile_picture, 'medium' );
}else{
  $profile = wp_get_attachment_image_url( 124, 'medium' );
}

?>
<aside class="sidebar mt-5">
  <div class="border rounded d-none d-md-block">
    <img class="img-fluid rounded-top" src="<?php echo $profile ?>" alt="<?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?>">
    <div class="p-4">
      <h2><?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?></h2>
      <p class="text-black-50"><?php echo $agent_info->position ?></p>
      <p class="text-black-50"><?php echo $agent_info->phone ?></p>
      <p class="text-black-50"><?php echo $agent_info->email ?></p>
      <p class="text-black-50">@<?php echo $agent_info->instagram ?></p>
    </div>
  </div>
  <ul>
    <?php !dynamic_sidebar('sidebar') ?>
  </ul>
</aside>
