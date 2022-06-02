<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_articlecontainer {

  function __construct(){

    //Values
    $this->label = __( 'Article Container', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'articlecontainer', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
