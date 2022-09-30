<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class site_logo {

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavLogo( 'nav', false );
    $this->nav_logo_and_subtitle = new \ZMT\Theme\DefaultConfig\configNavLogo( 'nav_logo_and_subtitle', false );
    
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavLogo( 'navbar', false );
    $this->navbar_logo_and_subtitle = new \ZMT\Theme\DefaultConfig\configNavLogo( 'navbar_logo_and_subtitle', false );

  }

}
