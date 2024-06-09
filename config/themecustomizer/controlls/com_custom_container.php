<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_custom_container extends com_custom {

  function __construct(){

    parent::__construct();

    //Values
    $this->label = __( 'Custom Container', 'zmplugin' );

    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'custom_container', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
