<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_custom_nav extends com_custom {

  function __construct(){

    parent::__construct();

    //Values
    $this->label = __( 'Custom Nav', 'zmplugin' );

    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'custom_nav', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    $this->custom_section_content = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\custom_section_content(5,3);
    $this->custom_section_content->choices = \ZMP\Plugin\ThemeHelper::getCustomSectionContentNavChoices( );

  }

}
