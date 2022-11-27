<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_separator {

  function __construct(){

    //Values
    $this->label = __( 'Separator', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'separator', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );
    //$this->separator = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\separator();

  }

}
