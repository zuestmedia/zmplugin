<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

class section_blocks {

  function __construct(){

    $this->grid  = new \ZMT\Theme\DefaultConfig\configSectionNewBlocks('sections_grid',false);
    $this->hero  = new \ZMT\Theme\DefaultConfig\configSectionNewBlocks('sections_hero',false);

  }

}
