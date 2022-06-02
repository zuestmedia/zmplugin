<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_blocks {

  function __construct(){

    //Values
    $this->label = __( 'Sidebar', 'zmplugin' );
    $this->description = __( 'Edit Sidebar.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'blocks', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
