<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_offcanvas_toggle {

  function __construct(){

    //Values
    $this->label = __( 'Toggle Button', 'zmplugin' );
    $this->description = __( 'Define and edit the Toggle Button of the Mobile Menu view.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'offcanvas_toggle', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //$this->toggle_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\toggle_wrap();
    //$this->offcanvas_module = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\offcanvas_module();
    //$this->icon_type = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\icon_type();
    //$this->icon_ratio = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\icon_ratio();

  }

}
