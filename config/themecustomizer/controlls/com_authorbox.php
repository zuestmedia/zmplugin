<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_authorbox {

  function __construct(){

    //Values
    $this->label = __( 'Author Box', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'authorbox', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //$this->author_box_json = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\author_box_json(10,4,'module');//authorbox

  }

}
