<?php

// Register Custom Post Type
function property_cpt() {

	$labels = array(
		'name'                  => _x( 'Propiedades', 'Post Type General Name', 'inversionisto' ),
		'singular_name'         => _x( 'Propiedad', 'Post Type Singular Name', 'inversionisto' ),
		'menu_name'             => __( 'Propiedades', 'inversionisto' ),
		'name_admin_bar'        => __( 'Propiedad', 'inversionisto' ),
		'archives'              => __( 'Item Archives', 'inversionisto' ),
		'attributes'            => __( 'Item Attributes', 'inversionisto' ),
		'parent_item_colon'     => __( 'Parent Item:', 'inversionisto' ),
		'all_items'             => __( 'Todas', 'inversionisto' ),
		'add_new_item'          => __( 'Add New Item', 'inversionisto' ),
		'add_new'               => __( 'Nueva Propiedad', 'inversionisto' ),
		'new_item'              => __( 'New Item', 'inversionisto' ),
		'edit_item'             => __( 'Edit Item', 'inversionisto' ),
		'update_item'           => __( 'Update Item', 'inversionisto' ),
		'view_item'             => __( 'View Item', 'inversionisto' ),
		'view_items'            => __( 'View Items', 'inversionisto' ),
		'search_items'          => __( 'Search Item', 'inversionisto' ),
		'not_found'             => __( 'Not found', 'inversionisto' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'inversionisto' ),
		'featured_image'        => __( 'Imagen destacada', 'inversionisto' ),
		'set_featured_image'    => __( 'Usar como imagen destacada', 'inversionisto' ),
		'remove_featured_image' => __( 'Remover imagen destacada', 'inversionisto' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'inversionisto' ),
		'insert_into_item'      => __( 'Insert into item', 'inversionisto' ),
		'uploaded_to_this_item' => __( 'Subido a esta propiedad', 'inversionisto' ),
		'items_list'            => __( 'Items list', 'inversionisto' ),
		'items_list_navigation' => __( 'Items list navigation', 'inversionisto' ),
		'filter_items_list'     => __( 'Filter items list', 'inversionisto' ),
	);
	$rewrite = array(
		'slug'                  => 'propiedad',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Propiedad', 'inversionisto' ),
		'description'           => __( 'Post Type Description', 'inversionisto' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'propiedades',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'property', $args );

}
add_action( 'init', 'property_cpt', 0 );
