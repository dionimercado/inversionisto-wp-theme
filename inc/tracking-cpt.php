<?php

// Register Custom Post Type
function tracking_cpt() {

	$labels = array(
		'name'                  => _x( 'Tracking', 'Post Type General Name', 'inversionisto' ),
		'singular_name'         => _x( 'Tracking', 'Post Type Singular Name', 'inversionisto' ),
		'menu_name'             => __( 'Tracking', 'inversionisto' ),
		'name_admin_bar'        => __( 'Tracking', 'inversionisto' ),
		'archives'              => __( 'Item Archives', 'inversionisto' ),
		'attributes'            => __( 'Item Attributes', 'inversionisto' ),
		'parent_item_colon'     => __( 'Parent Item:', 'inversionisto' ),
		'all_items'             => __( 'Tracking', 'inversionisto' ),
		'add_new_item'          => __( 'Add New Item', 'inversionisto' ),
		// 'add_new'               => __( 'Nueva Propiedad', 'inversionisto' ),
		'new_item'              => __( 'New Item', 'inversionisto' ),
		'edit_item'             => __( 'Edit Item', 'inversionisto' ),
		'update_item'           => __( 'Update Item', 'inversionisto' ),
		'view_item'             => __( 'View Item', 'inversionisto' ),
		'view_items'            => __( 'View Items', 'inversionisto' ),
		'search_items'          => __( 'Search Item', 'inversionisto' ),
		'not_found'             => __( 'Not found', 'inversionisto' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'inversionisto' ),
		// 'featured_image'        => __( 'Imagen destacada', 'inversionisto' ),
		'set_featured_image'    => __( 'Usar como imagen destacada', 'inversionisto' ),
		'remove_featured_image' => __( 'Remover imagen destacada', 'inversionisto' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'inversionisto' ),
		'insert_into_item'      => __( 'Insert into item', 'inversionisto' ),
		'uploaded_to_this_item' => __( 'Subido a esta propiedad', 'inversionisto' ),
		'items_list'            => __( 'Items list', 'inversionisto' ),
		'items_list_navigation' => __( 'Items list navigation', 'inversionisto' ),
		'filter_items_list'     => __( 'Filter items list', 'inversionisto' ),
	);
	$args = array(
		'label'                 => __( 'Tracking', 'inversionisto' ),
		'description'           => __( 'Post Type Description', 'inversionisto' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 9,
		'menu_icon'             => 'dashicons-chart-area',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'post',
		// 'capabilities' 					=> array(
		//   // 'edit_post'          => 'edit_tracking',
		//   'read_post'          => 'read_tracking',
		//   'delete_post'        => 'delete_tracking',
		//   'edit_posts'         => 'edit_trackings',
		//   'edit_others_posts'  => 'edit_others_trackings',
		//   'publish_posts'      => 'publish_trackings',
		//   'read_private_posts' => 'read_private_trackings',
		//   'create_posts'       => 'edit_trackings',
		// ),
		'show_in_rest'          => false,
	);
	register_post_type( 'tracking', $args );

}
add_action( 'init', 'tracking_cpt', 0 );



add_filter( 'manage_tracking_posts_columns', 'tracking_filter_posts_columns' );
function tracking_filter_posts_columns( $columns ) {


  $columns['source'] = __( 'Fuente' );
  $columns['agent'] = __( 'Agente', 'inversionisto' );
  $columns['origin'] = __( 'Origen', 'inversionisto' );
  $columns['ip_address'] = __( 'IP Address', 'inversionisto' );

  return $columns;
}


add_filter( 'manage_tracking_posts_columns', 'tracking_columns' );
function tracking_columns( $columns ) {

  unset($columns['cb']);
  unset($columns['title']);
  unset($columns['date']);

  $columns['date'] = __( 'Fecha', 'inversionisto' );

  return $columns;
}



add_action( 'manage_tracking_posts_custom_column', 'tracking_realestate_column', 10, 2);
function tracking_realestate_column( $column, $post_id ) {
  if ( 'origin' === $column ) {
    if(get_post_meta( $post_id, 'origin_id', true ) === '-1') {
      $agent_info = get_user_by( 'id', get_post_meta( $post_id, 'agent_id', true ) );
      echo '<a target="_blank" href="/agente/'.$agent_info->user_nicename.'">Perfil del agente</a>';
    }else if(get_post_meta( $post_id, 'origin_id', true ) === '0') {
      echo '<a target="_blank" href="/">Homepage</a>';
    } else {
      echo '<a target="_blank" href="'.get_the_permalink( get_post_meta( $post_id, 'origin_id', true ) ).'">'.get_the_title( get_post_meta( $post_id, 'origin_id', true ) ).'</a>';
    }
  }

  if ( 'source' === $column ) {
    echo get_post_meta( $post_id, 'source', true );
  }

  if ( 'ip_address' === $column ) {
    echo '<a target="_blank" href="https://whatismyipaddress.com/ip/'.get_post_meta( $post_id, 'ip_address', true ).'">'.get_post_meta( $post_id, 'ip_address', true ).'</a>';
  }

  if ( 'agent' === $column ) {
    if(get_post_meta( $post_id, 'origin_id', true ) === '0') {
      echo 'N/A';
    } else {

    $agent_info = get_user_by( 'id', get_post_meta( $post_id, 'agent_id', true ) );
      echo '<a target="_blank" href="/agente/'.$agent_info->user_nicename.'">'.$agent_info->first_name . " " . $agent_info->last_name.'</a>';
    }
  }
}



function tracking_filter_by_the_author() {

	$params = array(
		'name' => 'author', // this is the "name" attribute for filter <select>
		'show_option_all' => 'Todos los agentes' // label for all authors (display posts without filter)
	);

	if ( isset($_GET['user']) )
		$params['selected'] = $_GET['user']; // choose selected user by $_GET variable

	wp_dropdown_users( $params ); // print the ready author list
}

add_action('restrict_manage_posts', 'tracking_filter_by_the_author');
