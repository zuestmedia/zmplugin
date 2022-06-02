<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_custom_blocks extends com_custom {

  function __construct(){

    parent::__construct();

    //Values
    $this->label = __( 'Custom Blocks', 'zmplugin' );

    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'custom_blocks', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //module container needs to be hidden, if not, grid does not work because of surounding container of ***!!!widgets!!!***
    $this->module_element = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_element();
    $this->module_element->label = 'hide';
    $this->module_element->description = __( 'Module Container', 'zmplugin' );
    $this->module_element->section_group = 'developer';
    $this->module_element->type = 'hidden';
    $this->module_element->input_attrs = array('disabled' => 'disabled');

  }

}
