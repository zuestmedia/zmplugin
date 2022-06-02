<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_offcanvascontainer {

  function __construct(){

    $this->label = __( 'Offcanvas Container', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'offcanvascontainer', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
