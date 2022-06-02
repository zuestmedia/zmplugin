<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_section_extensions extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\com_section {

  function __construct(){

    parent::__construct();

    $this->custom_section_content = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\custom_section_content(5,3);
    $this->custom_section_content->choices = \ZMT\Theme\Helpers::getCustomSectionContentExtensionsChoices( );

    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'section_extensions', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

  }

}
