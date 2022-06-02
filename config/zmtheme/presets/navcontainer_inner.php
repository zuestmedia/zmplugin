<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class navcontainer_inner {

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavContainer( 'nav', false );

    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavContainer( 'navbar', false );

  }

}
