<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_archivetitle {

  function __construct(){

    //Values
    $this->label = __( 'Archive Title', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'archivetitle', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //$this->title_element = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title_element();
    //$this->title_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title_class();
    //$this->title_sprintf = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title_sprintf();

  }

}
