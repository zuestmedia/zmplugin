<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class custom_widget {

  public $grid;
  
  function __construct(){

    $this->grid  = new \ZMT\Theme\DefaultConfig\configContainer('moduleinner_grid_default',false);

  }

}
