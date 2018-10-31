<?php
/* Template Name: Agentes */
get_header();

$banner = wp_get_attachment_image_url( 126, 'full' );
?>
<main class="wrapper">
  <header class="header_image" style="background-image: url(<?php echo $banner ?>); max-height: 300px;">
    <div class="position-relative">
      <h1><?php the_title() ?></h1>
    </div>
  </header>
  <div class="container">
<?php

      // WP_User_Query arguments
    $args = array(
    	// 'roles'          => array('administrator','agent'),
    	// 'number'         => '9',
    	// 'offset'         => '9',
      // 'exclude'        => array( 1 ),
    	'fields'         => 'all_with_meta',
    );

    // Create the WP_User_Query object
    $wp_user_query = new WP_User_Query($args);

    // Get the results
    $agents = $wp_user_query->get_results();

    // Check for results
    if (!empty($agents)) {
        echo '<div class="row" style="margin: 50px 0;">';
        // loop through each author
        foreach ($agents as $agent) {
            // get all the user's data
            $agent_info = get_userdata($agent->ID);

            if( $agent_info->profile_picture ) {
              $img_src = wp_get_attachment_image_url( $agent_info->profile_picture, 'medium' );
            }else{
              $img_src = wp_get_attachment_image_url( 124, 'medium' );
            }

            ?>

            <div class="col-md-6">
              <a class="agent-card" href="/agente/<?php echo $agent_info->user_nicename ?>">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="pl-5">
                      <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?>">
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <h3 style="margin-bottom: 5px;"><?php echo $agent_info->first_name ?> <?php echo $agent_info->last_name ?></h3>
                    <p style="color: rgba(0,0,0,.5)"><?php echo $agent_info->position ?></p>
                    <button style="background-color: #c59b2f; color: #fff; border: 0; padding: 7px 10px; margin-top: 20px; border-radius: 4px; text-transform: uppercase; font-size: 13px; font-weight: 700;">Ver mis propiedades</button>
                  </div>
                </div>
                <hr>
                <div class="agent-card-contacts">
                  <div class="">
                    <div class="agent-contact">
                      <svg style="opacity: 0.6;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                      <span><?php echo $agent_info->phone ?></span>
                    </div>
                  </div>
                  <div class="">
                    <div class="agent-contact">
                      <svg style="opacity: 0.6;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                      <span><?php echo $agent_info->user_email ?></span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
<?php
        }
        echo '</div>';
    } else {
        echo 'No agents found';
    }
  ?>
</div>
</main>
<?php get_footer() ?>
