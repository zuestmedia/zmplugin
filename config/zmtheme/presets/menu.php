<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class menu {

  public $nav;
  public $navbar;
  public $dropdown_navbar_nav;

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavMenu('nav',false);
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavMenu('navbar',false);
    $this->dropdown_navbar_nav = new \ZMT\Theme\DefaultConfig\configNavMenu('navbar_dropdown_nav',false);

  }

}
