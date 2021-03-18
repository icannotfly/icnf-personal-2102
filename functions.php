<?php

/*-------------------
    functions.php
-------------------*/



/*-------------
    general
-------------*/

if (function_exists('add_theme_support'))
{
    // you'd think this would be built in
    add_theme_support('menus');

    // headline images
    add_theme_support('post-thumbnails');

    // blog logo
    add_theme_support('custom-logo');
}





/*-----------------
    image sizes
-----------------*/

update_option( 'thumbnail_size_w', 250 );
update_option( 'thumbnail_size_h', 141 );

update_option( 'medium_size_w', 850 );
update_option( 'medium_size_h', 478 );

update_option( 'large_size_w', 1600 );
update_option( 'large_size_h', 1600 );





/*------------
    header
------------*/

// get styles ready
function load_stylesheets() {
    wp_enqueue_style(
        "bootstrap-5-min",
        "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    );

    // make sure that our previously enqueued stylesheet has a checksum to prevent some xss attacks
    function add_style_attributes($html, $handle) {

        if ("bootstrap-5-min" === $handle ) {
            return str_replace("media='all'", "media=\"all\" integrity=\"sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl\" crossorigin=\"anonymous\"", $html );
        }

        /*if ( 'another-style' === $handle ) {
            return str_replace( "media='all'", "media='all' integrity='blajbsf' example", $html );
        }*/

        return $html;
    }
    add_filter("style_loader_tag", "add_style_attributes", 10, 2 );



    // theme's stylesheet

    wp_enqueue_style(
        "style",
        get_stylesheet_uri()
    );



    // google fonts

    wp_enqueue_style(
        "google-fonts-domine",
        "https://fonts.googleapis.com/css2?family=Domine&display=swap"
    );

    wp_enqueue_style(
        "google-fonts-merriweather",
        "https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&display=swap"
    );

    wp_enqueue_style(
        "google-fonts-roboto-mono",
        "https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap"
    );



    // bootstrap icons

    wp_enqueue_style(
        "bootstrap-icons-webfont",
        "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css"
    );
}
add_action( 'wp_enqueue_scripts', 'load_stylesheets' );

// removes 32px html margin-top when logged in to wp
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');





/*-----------
    menus
-----------*/

// add bootstrap classes to menu elements
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );





/*----------------
    pagination
----------------*/

// from https://gist.github.com/mtx-z/f95af6cc6fb562eb1a1540ca715ed928
function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true ) {

	if ( null === $wp_query ) {
		global $wp_query;
	}

	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( 'Newer' ),
			'next_text'    => __( 'Older' ),
			'add_args'     => false,
			'add_fragment' => ''
		]
	);

	if ( is_array( $pages ) ) {
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

		$pagination = '<nav class="pagination justify-content-center">
    <ul class="pagination m-0">
        ';

        foreach ($pages as $page) {
        $pagination .= '
        <li class="page-item '.(strpos($page, 'current') !== false ? 'active' : '').'"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
        }

        $pagination .= '
    </ul>
</nav>';

		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}

	return null;
}



?>
