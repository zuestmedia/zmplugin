<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_navcontainer_inner {

  function __construct(){

    $this->label = __( 'Navigation Inner Container', 'zmplugin' );
    //$this->view_status_access_level = 99;//view settings 99=off!!!

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'navcontainer_inner', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
