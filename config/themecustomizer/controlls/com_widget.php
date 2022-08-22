<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_widget {

  function __construct(){

    //Values
    $this->label = __( 'Widget', 'zmplugin' );
    $this->description = __( 'Edit Sidebar.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'widget', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
