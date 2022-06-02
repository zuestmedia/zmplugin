<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_articlelistcontainer {

  function __construct(){

    $this->label = __( 'Article List Container', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'articlelistcontainer', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
