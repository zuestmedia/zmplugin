<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_fontstyle extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Font style', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'text';
    $this->choices = array(
      'normal' =>  __( 'Default', 'zmplugin' ),
      'italic' =>  __( 'Italic', 'zmplugin' ),
    );

  }

}
