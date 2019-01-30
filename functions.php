<?php
  $acfEnabled = function_exists('get_field');

  function starter_setup() {
    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );
    add_theme_support('title-tag');

    register_nav_menus( [
      'main' => 'Main Menu',
      'mobile' => 'Mobile Menu',
      'footer' => 'Footer Menu',
    ]);

  }
  add_action( 'after_setup_theme', 'starter_setup' );


  function starter_scripts(){
    wp_enqueue_style( 'starter-css', get_stylesheet_directory_uri() . '/dist/css/style.css', [], null, false);
    // wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=your-key-here&v=3.exp&sensor=false', [], null, true);
    wp_enqueue_script( 'starter-js-footer', get_stylesheet_directory_uri() . '/dist/js/scripts.min.js', [], null, true);

    if ($acfEnabled) {
      $localize = [
        'prevArrow' => genSvg('icon-arrow-left'),
        'nextArrow' => genSvg('icon-arrow-right'),
      ];
      wp_localize_script( 'starter-js-footer', 'localize', $localize );
    }

    if (is_admin_bar_showing()) {
      wp_enqueue_style('admin-css', get_stylesheet_directory_uri() . '/dist/css/admin.css', [], null, false);
    }

  }
  add_action( 'wp_enqueue_scripts', 'starter_scripts' );

  // Adding stylesheet for formats in tinyMCE
  function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
  }
  // Register our callback to the appropriate filter
  add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

  //Adds items to formats in TinyMCE
  function my_mce_before_init_insert_formats( $init_array ) {
    $style_formats = [
      [
        'title' => 'Section Heading',
        'selector' => 'h2',
        'classes' => 'section-heading'
      ],
      [
        'title' => 'Title',
        'selector' => 'h2',
        'classes' => 'title'
      ]
    ];
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );
    return $init_array;
  }
  // Attach callback to 'tiny_mce_before_init'
  add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

  if ($acfEnabled) {

    acf_add_options_page();

    require_once('inc/custom_functions.php');
    require_once('inc/custom_filters.php');
    require_once('inc/custom_shortcodes.php');
    require_once('inc/generate_content.php');
  }

