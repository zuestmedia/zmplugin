<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class section_queryloop {

  function __construct(){

    $this->grid  = new \ZMT\Theme\DefaultConfig\configSectionNewQueryloop('sections_grid',false);
    $this->hero  = new \ZMT\Theme\DefaultConfig\configSectionNewQueryloop('sections_hero',false);


  }

}
