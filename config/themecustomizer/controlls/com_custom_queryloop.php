<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_custom_queryloop extends com_custom {

  function __construct(){

    parent::__construct();

    //Values
    $this->label = __( 'Custom QueryLoop', 'zmplugin' );

    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'custom_queryloop', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
