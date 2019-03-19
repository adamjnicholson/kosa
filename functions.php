<?php
  $acfEnabled = function_exists('get_field');

  function kosa_setup() {
    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );
    add_theme_support('title-tag');

    register_nav_menus( [
      'main' => 'Main Menu',
      'mobile' => 'Mobile Menu',
      'footer' => 'Footer Menu',
    ]);

    add_image_size( 'banner', 1920, 448 );
  }
  add_action( 'after_setup_theme', 'kosa_setup' );


  function kosa_scripts(){
    wp_enqueue_style( 'kosa-css', get_stylesheet_directory_uri() . '/dist/css/style.css', [], null, false);
    // wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=your-key-here&v=3.exp&sensor=false', [], null, true);

    if (is_page(79)) {
      wp_enqueue_script( 'fabric.js', get_stylesheet_directory_uri() . '/dist/js/fabric.min.js', ['jquery'], null, true);
    }

    wp_enqueue_script( 'kosa-js-footer', get_stylesheet_directory_uri() . '/dist/js/scripts.min.js', ['jquery'], null, true);

    $localize = [
      'prevArrow' => genSvg('icon-arrow-left', ['absolute-center']),
      'nextArrow' => genSvg('icon-arrow-right', ['absolute-center']),
    ];
    wp_localize_script( 'kosa-js-footer', 'localize', $localize );
    

    if (is_admin_bar_showing()) {
      wp_enqueue_style('admin-css', get_stylesheet_directory_uri() . '/dist/css/admin.css', [], null, false);
    }

  }
  add_action( 'wp_enqueue_scripts', 'kosa_scripts' );

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
        'title' => 'Circle',
        'inline' => 'span',
        'classes' => 'circle'
      ],
      [
        'title' => 'Fancy Text',
        'inline' => 'span',
        'classes' => 'fancy'
      ],
      [
        'title' => 'Alternate Text',
        'inline' => 'span',
        'classes' => 'alternate'
      ],
      [
        'title' => 'Small Text',
        'inline' => 'span',
        'classes' => 'small'
      ],
      [
        'title' => 'Large Text',
        'inline' => 'span',
        'classes' => 'big'
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

