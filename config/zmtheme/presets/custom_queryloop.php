<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class custom_queryloop {

  public $grid;

  function __construct(){

    $this->grid  = new \ZMT\Theme\DefaultConfig\configContainer('moduleinner_grid_default',false);

  }

}
