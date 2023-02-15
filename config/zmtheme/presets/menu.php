<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class menu {

  public $nav;
  public $navbar;

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavMenu('nav',false);
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavMenu('navbar',false);

  }

}
