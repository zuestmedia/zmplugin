<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class menu {

  public $nav;
  public $navbar;
  public $navbar_dropdown_nav;

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavMenu('nav',false);
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavMenu('navbar',false);
    $this->navbar_dropdown_nav = new \ZMT\Theme\DefaultConfig\configNavMenu('navbar_dropdown_nav',false);

  }

}
