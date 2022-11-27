<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_section {

  function __construct(){

    //new
    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'section', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //module container needs to be hidden, if not, grid does not work because of surounding container of ***!!!widgets!!!***
    $this->module_element = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_element();
    $this->module_element->label = 'hide';
    $this->module_element->description = __( 'Module Container', 'zmplugin' );
    $this->module_element->section_group = 'developer';
    $this->module_element->type = 'hidden';
    $this->module_element->input_attrs = array('disabled' => 'disabled');

  }

}
