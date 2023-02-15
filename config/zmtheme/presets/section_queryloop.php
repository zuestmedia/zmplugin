<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class section_queryloop {

  public $grid;
  public $hero;

  function __construct(){

    $this->grid  = new \ZMT\Theme\DefaultConfig\configSectionNewQueryloop('sections_grid',false);
    $this->hero  = new \ZMT\Theme\DefaultConfig\configSectionNewQueryloop('sections_hero',false);


  }

}
