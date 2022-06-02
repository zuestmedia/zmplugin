<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_authorbox {

  function __construct(){

    //Values
    $this->label = __( 'Author Box', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets(4,3);
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'authorbox', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //$this->author_box_json = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\author_box_json(10,4,'module');//authorbox

  }

}
