<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class search {

  public $nav;
  public $navbar;

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavSearch( 'nav', false );
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavSearch( 'navbar', false );

  }

}
