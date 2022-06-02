<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class site_logo {

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavLogo( 'nav', false );
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavLogo( 'navbar', false );

  }

}
