<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_search {

  function __construct(){

    //Values
    $this->label = __( 'Search Form', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'search', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //$this->form_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\form_class();
    //$this->input_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\input_class();
    //$this->search_icon = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\search_icon();
    //$this->placeholder = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\placeholder();

  }

}
