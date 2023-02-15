<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class offcanvas_toggle {

  public $nav;
  public $navbar;

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavToggle('nav',false);
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavToggle('navbar',false);

  }

}
