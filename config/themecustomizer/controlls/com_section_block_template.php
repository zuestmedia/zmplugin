<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_section_block_template extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\com_section {

  function __construct(){

    parent::__construct();

    //new
    //$this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'section_block_template', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}