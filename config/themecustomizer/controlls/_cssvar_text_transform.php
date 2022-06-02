<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_text_transform extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Text Transform', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'text';
    $this->choices = array(
      'none' =>  __( 'Default', 'zmplugin' ),
      'lowercase' =>  __( 'Lowercase', 'zmplugin' ),
      'uppercase' =>  __( 'Uppercase', 'zmplugin' ),
      'capitalize' =>  __( 'Capitalize', 'zmplugin' ),
    );

  }

}
