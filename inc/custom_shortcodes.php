<?php
  /*
    #########################################################
    #########################################################
    ###################                   ###################
    ###################    SHORTCODES     ###################
    ###################                   ###################
    #########################################################
    #########################################################
  */

  function exampleShortcode($atts){
    $html = '';
    return $html;
  }
  add_shortcode('example', 'exampleShortcode');

  function emailShortcode($atts) {
    $html = '';
    if (!empty($atts['address'])) {
      $html .= '<span><a href="mailto:' . $atts['address'] . '">' . $atts['address'] . '</a></span>';
    }
    return $html;
  }
  add_shortcode('email', 'emailShortcode');

  function phoneShortcode($atts) {
    $html = '';
    if (!empty($atts['number'])) {
      $phone = preg_replace('/[^0-9]/', '', $atts['number']);
      $html .= '<span><a href="tel:' . $phone . '">' . $atts['number'] . '</a></span>';
    }
    return $html;
  }
  add_shortcode('phone', 'phoneShortcode');

  function cirlcesShortcode($atts){
    $html = '';
    $words = explode(' ', $atts['content']);

    if (!empty($words)) {
      $html .= '<span class="circles">';
        foreach($words as $word) {
          $html .= '<span class="circle">' . $word . '</span>';
        }
      $html .= '</span>';
    }
    return $html;
  }
  add_shortcode('circles', 'cirlcesShortcode');

  function coloursShortcode($atts){
    $html = genColours('kosa-colours');
    return $html;
  }
  add_shortcode('colours', 'coloursShortcode');

  function sizeChartShortcode($atts){
    $html = genSizeChart('kosa-colours');
    return $html;
  }
  add_shortcode('size_chart', 'sizeChartShortcode');
