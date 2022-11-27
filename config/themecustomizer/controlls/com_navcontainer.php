<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_navcontainer {

  function __construct(){

    $this->label = __( 'Navigation Container', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'navcontainer', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
