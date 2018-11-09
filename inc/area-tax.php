<?php

// Register Custom Taxonomy
function property_area() {

	$labels = array(
		'name'                       => _x( 'Sectores', 'Taxonomy General Name', 'inversionisto' ),
		'singular_name'              => _x( 'Sector', 'Taxonomy Singular Name', 'inversionisto' ),
		'menu_name'                  => __( 'Sectores', 'inversionisto' ),
		'all_items'                  => __( 'Todos', 'inversionisto' ),
		'parent_item'                => __( 'Elegir ciudad', 'inversionisto' ),
		'parent_item_colon'          => __( 'Parent Item:', 'inversionisto' ),
		'new_item_name'              => __( 'New Item Name', 'inversionisto' ),
		'add_new_item'               => __( 'Agregar sector', 'inversionisto' ),
		'edit_item'                  => __( 'Edit Item', 'inversionisto' ),
		'update_item'                => __( 'Update Item', 'inversionisto' ),
		'view_item'                  => __( 'View Item', 'inversionisto' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'inversionisto' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'inversionisto' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'inversionisto' ),
		'popular_items'              => __( 'Popular Items', 'inversionisto' ),
		'search_items'               => __( 'Search Items', 'inversionisto' ),
		'not_found'                  => __( 'Not Found', 'inversionisto' ),
		'no_terms'                   => __( 'No items', 'inversionisto' ),
		'items_list'                 => __( 'Items list', 'inversionisto' ),
		'items_list_navigation'      => __( 'Items list navigation', 'inversionisto' ),
	);
	$rewrite = array(
		'slug'                       => 'sector',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'prop_area', array( 'property' ), $args );

}
add_action( 'init', 'property_area', 0 );
