<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_queryterm {

  function __construct(){

    //Values
    $this->label = __( 'Query Terms', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'queryterm', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
