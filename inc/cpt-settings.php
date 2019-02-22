<?php

/* Slug for CPT plugin	*/
define('MVPWP_SLUG', 'movies');


/* Labels for CPT plugin	*/
function stanleywp_mvpwp_product_labels( $labels ) {
	$labels = array(
	   'singular' => __('Movie', 'stanleywp'),
     'plural'   => __('Movies', 'stanleywp')
	);
	return $labels;
}
add_filter('mvpwp_default_projects_name', 'stanleywp_mvpwp_product_labels');