<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class presets extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  public function default() {
    //Values
    $this->type = 'zm-select-presets';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->label = __( 'Select Preset', 'zmplugin' );
    //$this->description = __( 'Globally show or hide sections or choose out of the custom selection fields.', 'zmplugin' );
    $this->validation = 'class';
    $this->priority = 4;//should be here, not defined in controlls
    $this->access_level = 2;//should be here, not defined in controlls

    $this->choices = \ZMT\Theme\Helpers::getPresetChoices( NULL, __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin') );

  }

}
