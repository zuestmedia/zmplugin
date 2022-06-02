<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class offcanvas_toggle {

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configNavToggle('nav',false);
    $this->navbar = new \ZMT\Theme\DefaultConfig\configNavToggle('navbar',false);

  }

}
