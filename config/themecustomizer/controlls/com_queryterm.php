<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_queryterm {

  function __construct(){

    //Values
    $this->label = __( 'Query Terms', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'queryterm', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
