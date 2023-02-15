<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class navcontainer {

  public $nav;
  public $navbar;

  function __construct(){

    $this->nav = new \ZMT\Theme\DefaultConfig\configContainerSortableNav('nav',false);
    $this->navbar = new \ZMT\Theme\DefaultConfig\configContainerSortableNav('navbar',false);

  }

}
