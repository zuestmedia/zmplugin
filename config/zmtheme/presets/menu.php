<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class menu {

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavMenu('nav',false);
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavMenu('navbar',false);

  }

}
