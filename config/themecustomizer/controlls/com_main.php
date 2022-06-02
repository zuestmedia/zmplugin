<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_main {

  function __construct(){

    //Values
    $this->label = __( 'Center Main Container', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

    //new
    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'main', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
