<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_section_offcanvas extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\com_section {

  function __construct(){

    parent::__construct();

    $this->custom_section_content = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\custom_section_content(5,3);
    $this->custom_section_content->choices = \ZMP\Plugin\ThemeHelper::getOffcanvasChoices( );

    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'section_offcanvas', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
