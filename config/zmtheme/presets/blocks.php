<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class blocks {

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavSidebar( 'nav', false );
    
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavSidebar( 'navbar', false );

  }

}
