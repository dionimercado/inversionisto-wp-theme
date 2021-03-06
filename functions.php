<?php

show_admin_bar( false );

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 1110;

// Register Theme Features
function inversionisto_theme_features()  {

	add_theme_support( 'infinite-scroll', array(
	        'container' => 'content',
	        'render'    => 'twenty_ten_infinite_scroll_render',
	        'footer'    => 'wrapper',
	    ) );


	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'gallery', 'image', 'video' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails');

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

  // Add support for two custom navigation menus.
  register_nav_menus( array(
      'primary'   => __( 'Primary Menu', 'inversionisto' ),
      'footer-links' => __('Footer Links', 'inversionisto' )
  ) );

	// Register Sidebars
	function inversionisto_sidebars() {

		$sidebar = array(
			'id'            => 'sidebbar',
			'class'         => 'sidebar',
			'name'          => __( 'Sidebar', 'inversionisto' ),
		);
		register_sidebar( $sidebar );

		$footer1 = array(
			'id'            => 'footer1',
			'class'         => 'footer1',
			'name'          => __( 'Footer 1', 'inversionisto' ),
		);
		register_sidebar( $footer1 );

		$footer1 = array(
			'id'            => 'footer2',
			'class'         => 'footer2',
			'name'          => __( 'Footer 2', 'inversionisto' ),
		);
		register_sidebar( $footer1 );

		$footer1 = array(
			'id'            => 'footer3',
			'class'         => 'footer3',
			'name'          => __( 'Footer 3', 'inversionisto' ),
		);
		register_sidebar( $footer1 );

		$footer1 = array(
			'id'            => 'footer4',
			'class'         => 'footer4',
			'name'          => __( 'Footer 4', 'inversionisto' ),
		);
		register_sidebar( $footer1 );

	}
	add_action( 'widgets_init', 'inversionisto_sidebars' );
}
add_action( 'after_setup_theme', 'inversionisto_theme_features' );



// Register Custom Navigation Walker
require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Register Property CPT
require_once get_stylesheet_directory() . '/inc/tracking-cpt.php';

// Register Property CPT
require_once get_stylesheet_directory() . '/inc/property-cpt.php';


// Register Property Action Taxonomy
require_once get_stylesheet_directory() . '/inc/action-tax.php';

// Register Property Category Taxonomy
require_once get_stylesheet_directory() . '/inc/category-tax.php';

// Register Property Area Taxonomy
require_once get_stylesheet_directory() . '/inc/area-tax.php';

// Register Property City Taxonomy
// require_once get_stylesheet_directory() . '/inc/city-tax.php';

// Register Property Country Taxonomy
require_once get_stylesheet_directory() . '/inc/country-tax.php';

/**
 * Enqueue script for child theme
 */
function inversionisto_enqueue_scripts() {
  wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:400,600,700' );
  wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.4.1/css/all.css', array(), '5.4.1' );
  wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.12.1' );
  wp_enqueue_style( 'select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css', array(), '4.0.5' );
	wp_enqueue_style( 'inversionisto', get_template_directory_uri() . '/assets/css/inversionisto.css', array('bootstrap'), uniqid() );

  wp_enqueue_style( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css', array(), '3.3.7', 'all');
  wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.2.1', 'all');
  wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '2.2.1', 'all');

  wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array ( 'jquery' ), '1.14.3', true);
  wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array ( 'jquery' ), '4.1.3', true);
	wp_enqueue_script('jquery-ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.12.1');
	wp_enqueue_script('jqueryui-touch-punch', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js', array('jquery-ui'), '0.2.3');
	wp_enqueue_script('select2', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js', array('jquery'), '4.0.5');
	wp_enqueue_script('jquery-number', '//cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js', array('jquery'), '2.1.6');

	// wp_enqueue_script( 'jquery-ui' );
	// wp_enqueue_script( 'jquery-ui-slider' );

  wp_enqueue_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js', array ( 'jquery' ), '3.0.47', true);
  wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array ( 'jquery' ), '2.2.1', true);
  wp_enqueue_script( 'inversionisto', get_template_directory_uri() . '/assets/js/inversionisto.js', array ( 'jquery', 'jquery-ui' ), uniqid(), true);
}
add_action( 'wp_enqueue_scripts', 'inversionisto_enqueue_scripts', 1000000000 );


// custom css and js
add_action('admin_enqueue_scripts', 'cstm_css_and_js');
function cstm_css_and_js($hook) {
		wp_enqueue_style( 'inversionisto-admin', get_template_directory_uri() . '/assets/css/inversionisto-admin.css', array(), uniqid() );
}

add_role(
    'agent',
    __( 'Agente' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
    )
);


// Register User Contact Methods
function agent_contacts( $user_contact_method ) {
	$user_contact_method['position'] = __( 'Posición', 'inversionisto' );
	$user_contact_method['phone'] = __( 'Teléfono', 'inversionisto' );
	$user_contact_method['instagram'] = __( 'Instagram', 'inversionisto' );
	// unset($user_contact_method[])
	return $user_contact_method;
}
add_filter( 'user_contactmethods', 'agent_contacts' );

function author_cpt_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
      if ($query->is_author()) {
        $query->set('post_type', array('property'));
        $query->set('post_per_page', 3);

      }
    }
}
add_action('pre_get_posts','author_cpt_filter');




/**
 * Disable responsive image support (test!)
 */

// Clean the up the image from wp_get_attachment_image()
add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    if( isset( $attr['sizes'] ) )
        unset( $attr['sizes'] );

    if( isset( $attr['srcset'] ) )
        unset( $attr['srcset'] );

    return $attr;

 }, PHP_INT_MAX );

// Override the calculated image sizes
add_filter( 'wp_calculate_image_sizes', '__return_empty_array',  PHP_INT_MAX );

// Override the calculated image sources
add_filter( 'wp_calculate_image_srcset', '__return_empty_array', PHP_INT_MAX );

// Remove the reponsive stuff from the content
remove_filter( 'the_content', 'wp_make_content_images_responsive' );

add_filter( 'wp_calculate_image_srcset_meta', '__return_empty_array' );



function twenty_ten_infinite_scroll_render() {
	while( have_posts() ) : the_post(); ?>
	<div class="col-md-4 mb-5">
		<?php get_template_part('templates/property', 'listing') ?>
	</div>
	<?php endwhile;
}









function add_ajax_scripts() {
    wp_enqueue_script( 'ajaxcalls', get_template_directory_uri() . '/assets/js/ajax-calls.js', array(), uniqid(), true );

    wp_localize_script( 'ajaxcalls', 'ajax_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'ajaxnonce' => wp_create_nonce( 'ajax_post_validation' )
    ) );
}

add_action( 'wp_enqueue_scripts', 'add_ajax_scripts' );



function inversionito_track_click() {

	$origin_id = $_POST['origin_id'];
	$agent_id = $_POST['agent_id'];
	$source = $_POST['source'];
	$ip_address = $_POST['ip_address'];

	$new = array(
	    'post_title' => 'Tracking',
	    'post_content' => '',
			'post_type' => 'tracking',
	    'post_status' => 'publish',
			'post_author' => $agent_id
	);

	$post_id = wp_insert_post( $new );

	if( $post_id ){
		update_post_meta( $post_id, 'source', $source );
		update_post_meta( $post_id, 'agent_id', $agent_id );
		update_post_meta( $post_id, 'origin_id', $origin_id );
		update_post_meta( $post_id, 'ip_address', $ip_address );
	} else {
    echo "Something went wrong, try again.";
	}


    wp_die();
}

add_action( 'wp_ajax_nopriv_inversionito_track_click', 'inversionito_track_click' );

function property_add_default_meta($post_id) {
	update_field('sticky', '0', $post_id);
}
add_action( 'publish_property', 'property_add_default_meta', 10, 2 );
