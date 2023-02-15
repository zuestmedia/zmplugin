<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class section_widget {

  public $grid;
  public $hero;

  function __construct(){

    $this->grid  = new \ZMT\Theme\DefaultConfig\configSectionNewWidget('sections_grid',false);
    $this->hero  = new \ZMT\Theme\DefaultConfig\configSectionNewWidget('sections_hero',false);

  }

}
