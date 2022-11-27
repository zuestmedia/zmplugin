<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_site_logo {

  function __construct(){

    //Values
    $this->label = __( 'Site Logo', 'zmplugin' );
    $this->description = __( 'Edit Site Logo.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'site_logo', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //$this->logo_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\logo_wrap();

  }

}
