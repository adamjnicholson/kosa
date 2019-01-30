<?php

   /*
    #########################################################
    #########################################################
    ###################                   ###################
    ###################      CONTENT      ###################
    ###################                   ###################
    #########################################################
    #########################################################
  */
  function genSiteLogo($position = 'header', $return = false) {

    $html = '';
    $logo = get_field('logo', 'options');
    $logo = empty($logo) ? get_bloginfo('name') : genImageTag($logo, 'full', true);

    $logo = '<a class="no-hover" href="' . get_site_url() . '">' . $logo  . '</a>';
    if (is_front_page() && $position === 'header') {
      $html = '<h1 id="site-logo" class="site-logo">' . $logo . '</h1>';
    } else{
      $html = '<div class="site-logo">' . $logo . '</div>';
    }

    if ($return) {
      return $html;
    }

    echo $html;
  }

  function genCopyright() {
    echo '<div class="copyright">';
      echo '<p>&copy; ' . get_bloginfo('name') . ' ' . date('Y') . '</p>';
    echo '</div>';
  }


  function genSocialMenu($position = 'header') {
    $accounts = get_field('accounts', 'options');
    if (!empty($accounts)) {
      echo '<ul class="social-menu horizontal no-list">';
        foreach ($accounts as $account) {
          echo '<li><a href="' . $account['url'] . '" target="_blank">' . genSvg($account['icon']) . '</a></li>';
        }
      echo '</ul>';
    }
  }

  function genExcerpt($content, $words = 55) {
    if (has_excerpt()) {
      return the_excerpt();
    } else {
      return '<p>' . wp_trim_words($content, $words, '') . '</p>';
    }
  }



  function genImageTag($data, $size = 'full', $retina = false, $class = '' ){
    if(!is_array($data)){
      return false;
    }

    $retinaDivisor = $retina ? 2 : 1;
    if ($size !== 'full') {
      $data['url'] =  $data['sizes'][$size];
      $data['width'] = $data['sizes'][$size . '-width'];

      $data['height'] = $data['sizes'][$size . '-height'];
    }

    if($data['url'] != ''){
      return '<img class="' . $class . '" src="'. $data['url'] . '" alt="' . $data['alt'] . '" width="' . $data['width'] / $retinaDivisor . '" height="' . $data['height'] / $retinaDivisor . '"/>';
    }

    return 'ERROR';
  }

  function genSvg($iconName, $classes = array()) {
    $classes = !empty($classes) ? implode(', ', $classes) : '';
    $html = '<span class="icon ' .  $iconName . ' ' . $classes . '">';
      $html .= file_get_contents(get_stylesheet_directory_uri() . "/dist/images/$iconName.svg");
    $html .= '</span>';
    return $html;
  }

  function genBackgroundImage($image) {
    $html = '';
    if (!empty($image)) {
      $html .= 'background: url(\'' . $image['url'] . '\') no-repeat center center / cover';
    }
    return $html;
  }


