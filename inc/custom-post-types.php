<?php

  /**
   * Project CPT
   */
  function project_create_post_type() {
    $labels = array(
      'name' => 'Project',
      'singular_name' => 'Project',
      'add_new' => 'Add project',
      'all_items' => 'All projects',
      'add_new_item' => 'Add project',
      'edit_item' => 'Edit project',
      'new_item' => 'New project',
      'view_item' => 'View project',
      'search_items' => 'Search projects',
      'not_found' => 'No projects found',
      'not_found_in_trash' => 'No projects found in trash',
      'parent_item_colon' => 'Parent project'
      //'menu_name' => default to 'name'
    );
    $args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
        //'author',
        //'trackbacks',
        //'custom-fields',
        //'comments',
        'revisions',
        //'page-attributes', // (menu order, hierarchical must be true to show Parent option)
        //'post-formats',
      ),
      // 'taxonomies' => array( 'category', 'post_tag' ), // add default post categories and tags
      'menu_position' => 5,
      'exclude_from_search' => false,
      'register_meta_box_cb' => 'project_add_post_type_metabox'
    );
    register_post_type( 'project', $args );
    //flush_rewrite_rules();

    register_taxonomy( 'project_category', // register custom taxonomy - category
      'project',
      array(
        'hierarchical' => true,
        'labels' => array(
          'name' => 'Project category',
          'singular_name' => 'Project category',
        )
      )
    );
    register_taxonomy( 'project_tag', // register custom taxonomy - tag
      'project',
      array(
        'hierarchical' => false,
        'labels' => array(
          'name' => 'Project tag',
          'singular_name' => 'Project tag',
        )
      )
    );
  }
  add_action( 'init', 'project_create_post_type' );