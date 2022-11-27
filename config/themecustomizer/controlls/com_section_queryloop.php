<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_section_queryloop extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\com_section {

  function __construct(){

    parent::__construct();

    //new
    //$this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'section_queryloop', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
