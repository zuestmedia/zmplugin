<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_custom_block_template extends com_custom {

  function __construct(){

    parent::__construct();

    //Values
    $this->label = __( 'Custom Block Template', 'zmplugin' );

    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'custom_block_template', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
